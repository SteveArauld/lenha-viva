<?php

namespace Tests\Feature\Merchant;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoogleFeedTest extends TestCase
{
    use RefreshDatabase;

    public function test_feed_xml_contains_required_google_attributes_matching_pdp_json_ld(): void
    {
        // The catalog-wide reference-price gate only lets old_price through
        // once a discount's history is verified — simulate that here.
        config(['merchant.reference_prices_verified' => true]);

        $product = Product::factory()->create([
            'id' => 90010,
            'title' => 'Ardenforest pellets – palé de 70 sacos de 15 kg',
            'slug' => 'ardenforest-pellets-feed-90010',
            'price' => '29.99',
            'old_price' => '39.99',
            'ref' => 'AF-90010',
        ]);

        $feed = $this->get(route('feed.google-shopping'));
        $feed->assertOk();
        $feed->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

        $xml = $feed->getContent();
        $this->assertStringContainsString('<g:id>lv-90010</g:id>', $xml);
        $this->assertStringContainsString('<g:price>39.99 EUR</g:price>', $xml);
        $this->assertStringContainsString('<g:sale_price>29.99 EUR</g:sale_price>', $xml);
        $this->assertStringContainsString('<g:availability>in_stock</g:availability>', $xml);
        $this->assertStringContainsString('<g:brand>Ardenforest</g:brand>', $xml);
        $this->assertStringContainsString('<g:google_product_category>625</g:google_product_category>', $xml);
        $this->assertStringContainsString('<g:country>ES</g:country>', $xml);
        $this->assertStringContainsString('0.00 EUR', $xml);
        $this->assertStringNotContainsString('identifier_exists', $xml);

        $pdp = $this->get(route('product.show', ['slug' => $product->slug]));
        $pdp->assertOk();
        $pdp->assertSee('data-offer-price="29.99"', false);
        $pdp->assertSee('Envío gratis en toda España', false);
        $pdp->assertDontSee('Europa', false);

        $this->assertTrue((bool) preg_match_all('/<script type="application\/ld\+json">\s*(.*?)\s*<\/script>/is', $pdp->getContent(), $blocks));
        $productLd = null;
        foreach ($blocks[1] as $json) {
            $data = json_decode($json, true);
            if (is_array($data) && ($data['@type'] ?? '') === 'Product') {
                $productLd = $data;
                break;
            }
        }

        $this->assertNotNull($productLd);
        $this->assertSame('29.99', $productLd['offers']['price']);
        $this->assertSame('EUR', $productLd['offers']['priceCurrency']);
        $this->assertSame('https://schema.org/InStock', $productLd['offers']['availability']);
        $this->assertSame(14, $productLd['offers']['hasMerchantReturnPolicy']['merchantReturnDays']);
        $this->assertSame('0.00', $productLd['offers']['shippingDetails']['shippingRate']['value']);
        $this->assertSame('ES', $productLd['offers']['shippingDetails']['shippingDestination']['addressCountry']);
    }

    public function test_sale_price_is_suppressed_until_reference_prices_are_verified(): void
    {
        Product::factory()->create([
            'id' => 90013,
            'slug' => 'unverified-discount-90013',
            'price' => '29.99',
            'old_price' => '39.99',
        ]);

        $xml = $this->get(route('feed.google-shopping'))->getContent();

        $this->assertStringContainsString('<g:id>lv-90013</g:id>', $xml);
        $this->assertStringContainsString('<g:price>29.99 EUR</g:price>', $xml);
        $this->assertStringNotContainsString('<g:sale_price>', $xml);
    }

    public function test_legacy_feed_url_serves_the_same_generator(): void
    {
        Product::factory()->create(['id' => 90011, 'slug' => 'legacy-feed-90011']);

        $a = $this->get(route('feed.google-shopping'))->getContent();
        $b = $this->get(route('feed.google-merchant'))->getContent();

        $this->assertSame($a, $b);
        $this->get(route('feed.google-shopping'))
            ->assertHeader('Content-Disposition', 'inline; filename="google-shopping.xml"');
    }

    public function test_download_url_forces_attachment_with_the_same_xml(): void
    {
        Product::factory()->create(['id' => 90012, 'slug' => 'download-feed-90012']);

        $view = $this->get(route('feed.google-shopping'));
        $download = $this->get(route('feed.google-shopping.download'));

        $view->assertOk();
        $download->assertOk();
        $download->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $download->assertHeader('Content-Disposition', 'attachment; filename="google-shopping.xml"');
        $this->assertSame($view->getContent(), $download->getContent());
        $this->assertStringContainsString('<g:id>lv-90012</g:id>', $download->getContent());
    }
}
