<?php

namespace App\Http\Controllers;

class FeedController extends Controller
{
    /**
     * Google Merchant Center namespace for the g: prefixed elements.
     */
    private const G_NS = 'http://base.google.com/ns/1.0';

    /**
     * Google Merchant Center product feed (RSS 2.0 + g: namespace).
     * https://support.google.com/merchants/answer/7052112
     */
    public function googleMerchant()
    {
        $products = collect(config('loja_products', []));

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = false;

        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        // Declare the g: prefix once, on the root element, as a real namespace
        // declaration. SimpleXMLElement::addAttribute('xmlns:g', ...) produced a
        // bogus `g="..."` attribute instead and forced a redeclaration on every child.
        $rss->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:g', self::G_NS);
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        $channel->appendChild($this->text($dom, 'title', config('app.name', 'Casacuberta Trias S.L.')));
        $channel->appendChild($this->text($dom, 'link', route('home')));
        $channel->appendChild($this->text($dom, 'description', 'Catálogo de productos Casacuberta Trias S.L. — pellets de madera, leña y equipos de calefacción.'));
        $channel->appendChild($this->text($dom, 'language', 'es'));

        foreach ($products as $product) {
            if (is_array($product)) {
                $this->addItem($dom, $channel, $product);
            }
        }

        return response($dom->saveXML(), 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    private function addItem(\DOMDocument $dom, \DOMElement $channel, array $product): void
    {
        $price = $this->cleanPrice($product['price'] ?? 0);
        $oldPrice = isset($product['old_price']) ? $this->cleanPrice($product['old_price']) : null;
        $images = array_values(array_filter($product['images'] ?? [], fn ($i) => ! empty($i)));
        $mainImage = $images[0] ?? ($product['hover_image'] ?? null);
        $title = $this->plainText($product['title'] ?? '');
        $description = $this->plainText($product['description'] ?? ($product['short_description'] ?? ''));

        if (empty($product['slug']) || empty($product['id']) || empty($mainImage)
            || $price <= 0 || $title === '' || $description === '') {
            // Google rejects items missing an id, a landing page, an image, a title,
            // a description or a positive price — skip incomplete catalog entries
            // rather than submitting a broken item.
            return;
        }

        $item = $dom->createElement('item');
        $channel->appendChild($item);

        $item->appendChild($this->gText($dom, 'id', 'lv-'.$product['id']));
        $item->appendChild($this->cdata($dom, 'title', $this->truncate($title, 150)));
        $item->appendChild($this->cdata($dom, 'description', $this->truncate($description, 5000)));
        $item->appendChild($this->text($dom, 'link', route('product.show', ['slug' => $product['slug']])));
        $item->appendChild($this->gText($dom, 'image_link', asset($this->largestVariant($mainImage))));

        foreach (array_slice(array_diff($images, [$mainImage]), 0, 10) as $extraImage) {
            $item->appendChild($this->gText($dom, 'additional_image_link', asset($this->largestVariant($extraImage))));
        }

        $item->appendChild($this->gText($dom, 'availability', ! empty($product['in_stock']) ? 'in_stock' : 'out_of_stock'));
        $item->appendChild($this->gText($dom, 'condition', 'new'));

        if ($oldPrice && $oldPrice > $price) {
            $item->appendChild($this->gText($dom, 'price', number_format($oldPrice, 2, '.', '').' EUR'));
            $item->appendChild($this->gText($dom, 'sale_price', number_format($price, 2, '.', '').' EUR'));
        } else {
            $item->appendChild($this->gText($dom, 'price', number_format($price, 2, '.', '').' EUR'));
        }

        // No brand/GTIN/MPN is stored for these products — tell Google explicitly
        // rather than submitting an item with a missing unique identifier.
        $item->appendChild($this->gText($dom, 'identifier_exists', 'no'));

        if (! empty($product['category'])) {
            $item->appendChild($this->gText($dom, 'product_type', \App\Support\CategoryLabels::label($product['category'])));
        }

        $shipping = $dom->createElementNS(self::G_NS, 'g:shipping');
        $item->appendChild($shipping);
        $shipping->appendChild($this->gText($dom, 'country', 'ES'));
        $shipping->appendChild($this->gText($dom, 'service', 'Estándar'));
        $shipping->appendChild($this->gText($dom, 'price', '0.00 EUR'));
    }

    /**
     * Plain RSS element carrying a text value (safely escaped).
     */
    private function text(\DOMDocument $dom, string $name, string $value): \DOMElement
    {
        $node = $dom->createElement($name);
        $node->appendChild($dom->createTextNode($value));

        return $node;
    }

    /**
     * Google-namespaced (g:) element carrying a text value (safely escaped).
     */
    private function gText(\DOMDocument $dom, string $name, string $value): \DOMElement
    {
        $node = $dom->createElementNS(self::G_NS, 'g:'.$name);
        $node->appendChild($dom->createTextNode($value));

        return $node;
    }

    /**
     * Plain RSS element wrapping its value in a CDATA section.
     */
    private function cdata(\DOMDocument $dom, string $name, string $value): \DOMElement
    {
        $node = $dom->createElement($name);
        // A CDATA section cannot contain the literal "]]>" — split it if present.
        $node->appendChild($dom->createCDATASection(str_replace(']]>', ']]]]><![CDATA[>', $value)));

        return $node;
    }

    /**
     * WordPress-style thumbnails (foo-480x480.webp) are exported alongside their
     * full-size original (foo.webp). Google recommends images of at least
     * 800x800, so prefer the un-suffixed original when it exists on disk and is
     * genuinely larger than the thumbnail referenced in the catalog.
     */
    private function largestVariant(string $path): string
    {
        if (! preg_match('/^(.*)-(\d+)x(\d+)(\.[a-zA-Z]+)$/', $path, $m)) {
            return $path;
        }

        $original = $m[1].$m[4];
        $originalFile = public_path($original);

        if (! is_file($originalFile)) {
            return $path;
        }

        $size = @getimagesize($originalFile);

        if ($size && $size[0] >= (int) $m[2] && $size[1] >= (int) $m[3]) {
            return $original;
        }

        return $path;
    }

    private function plainText(string $text): string
    {
        return trim(preg_replace('/\s+/', ' ', strip_tags($text)));
    }

    private function truncate(string $text, int $length): string
    {
        return mb_strlen($text) > $length ? mb_substr($text, 0, $length - 1).'…' : $text;
    }

    private function cleanPrice($price): float
    {
        if (is_numeric($price)) {
            return (float) $price;
        }

        if (empty($price)) {
            return 0.0;
        }

        // Price strings use ',' as a thousands separator and '.' as the decimal separator.
        $price = str_replace(',', '', (string) $price);
        $price = preg_replace('/[^\d.]/', '', $price);

        return (float) $price;
    }
}
