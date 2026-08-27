<?php

namespace App\Http\Controllers;

class FeedController extends Controller
{
    /**
     * Google Merchant Center product feed (RSS 2.0 + g: namespace).
     * https://support.google.com/merchants/answer/7052112
     */
    public function googleMerchant()
    {
        $products = collect(config('loja_products', []));

        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss/>');
        $xml->addAttribute('version', '2.0');
        $xml->addAttribute('xmlns:g', 'http://base.google.com/ns/1.0');

        $channel = $xml->addChild('channel');
        $channel->addChild('title', htmlspecialchars(config('app.name', 'Lenha Viva')));
        $channel->addChild('link', route('home'));
        $channel->addChild('description', 'Catálogo de productos Lenha Viva — pellets de madera, leña y equipos de calefacción.');
        $channel->addChild('language', 'es');

        foreach ($products as $product) {
            $this->addItem($channel, $product);
        }

        return response($xml->asXML(), 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    private function addItem(\SimpleXMLElement $channel, array $product): void
    {
        $price = $this->cleanPrice($product['price'] ?? 0);
        $oldPrice = isset($product['old_price']) ? $this->cleanPrice($product['old_price']) : null;
        $images = $product['images'] ?? [];
        $mainImage = $images[0] ?? ($product['hover_image'] ?? null);

        if (empty($product['slug']) || empty($mainImage) || $price <= 0) {
            // Google rejects items missing a landing page, image, or a positive price —
            // skip incomplete catalog entries rather than submitting a broken item.
            return;
        }

        $item = $channel->addChild('item');
        $item->addChild('g:id', 'lv-'.$product['id'], 'http://base.google.com/ns/1.0');
        $this->addCdataChild($item, 'title', $this->truncate($product['title'] ?? '', 150));
        $this->addCdataChild($item, 'description', $this->truncate($this->plainText($product['description'] ?? ($product['short_description'] ?? '')), 5000));
        $item->addChild('link', route('product.show', ['slug' => $product['slug']]));
        $item->addChild('g:image_link', htmlspecialchars(asset($mainImage)), 'http://base.google.com/ns/1.0');

        foreach (array_slice(array_diff($images, [$mainImage]), 0, 10) as $extraImage) {
            $item->addChild('g:additional_image_link', htmlspecialchars(asset($extraImage)), 'http://base.google.com/ns/1.0');
        }

        $item->addChild('g:availability', ! empty($product['in_stock']) ? 'in_stock' : 'out_of_stock', 'http://base.google.com/ns/1.0');
        $item->addChild('g:condition', 'new', 'http://base.google.com/ns/1.0');

        if ($oldPrice && $oldPrice > $price) {
            $item->addChild('g:price', number_format($oldPrice, 2, '.', '').' EUR', 'http://base.google.com/ns/1.0');
            $item->addChild('g:sale_price', number_format($price, 2, '.', '').' EUR', 'http://base.google.com/ns/1.0');
        } else {
            $item->addChild('g:price', number_format($price, 2, '.', '').' EUR', 'http://base.google.com/ns/1.0');
        }

        // No brand/GTIN/MPN is stored for these products — tell Google explicitly
        // rather than submitting an item with a missing unique identifier.
        $item->addChild('g:identifier_exists', 'no', 'http://base.google.com/ns/1.0');

        if (! empty($product['category'])) {
            $item->addChild('g:product_type', htmlspecialchars(\App\Support\CategoryLabels::label($product['category'])), 'http://base.google.com/ns/1.0');
        }

        $shipping = $item->addChild('g:shipping', null, 'http://base.google.com/ns/1.0');
        $shipping->addChild('g:country', 'ES', 'http://base.google.com/ns/1.0');
        $shipping->addChild('g:service', 'Estándar', 'http://base.google.com/ns/1.0');
        $shipping->addChild('g:price', '0.00 EUR', 'http://base.google.com/ns/1.0');
    }

    private function addCdataChild(\SimpleXMLElement $parent, string $name, string $value): void
    {
        $node = dom_import_simplexml($parent);
        $document = $node->ownerDocument;
        $child = $document->createElement($name);
        $child->appendChild($document->createCDATASection($value));
        $node->appendChild($child);
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
