<?php

namespace Tests\Unit\Merchant;

use App\Domain\Merchant\GoogleProductMapper;
use App\Domain\Merchant\Support\Availability;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoogleProductMapperTest extends TestCase
{
    use RefreshDatabase;

    public function test_maps_sku_price_sale_and_brand(): void
    {
        $product = Product::factory()->create([
            'id' => 90001,
            'title' => 'Ardenforest pellets – palé de 70 sacos de 15 kg',
            'slug' => 'ardenforest-pellets-test-90001',
            'price' => '29.99',
            'old_price' => '39.99',
            'ref' => 'AF-90001',
        ]);

        $dto = app(GoogleProductMapper::class)->map($product);

        $this->assertTrue($dto->eligible);
        $this->assertSame('lv-90001', $dto->id);
        $this->assertSame('29.99', number_format($dto->offerAmount, 2, '.', ''));
        $this->assertSame('39.99 EUR', $dto->price);
        $this->assertSame('29.99 EUR', $dto->salePrice);
        $this->assertSame(Availability::InStock, $dto->availability);
        $this->assertSame('Ardenforest', $dto->brand);
        $this->assertFalse($dto->sendIdentifierExists);
        $this->assertSame('625', $dto->googleProductCategory);
        $this->assertSame('ES', $dto->shippingCountry);
        $this->assertSame('0.00', $dto->shippingPrice);
        $this->assertSame(14, $dto->returnDays);
        $this->assertStringContainsString('29.99', $dto->toJsonLd()['offers']['price']);
    }

    public function test_does_not_invent_gtin_from_internal_ref(): void
    {
        $product = Product::factory()->create([
            'id' => 90002,
            'title' => 'Leña seca 40 cm palé',
            'slug' => 'lena-seca-test-90002',
            'category' => 'lena',
            'ref' => '537490002',
            'brand' => null,
        ]);

        $dto = app(GoogleProductMapper::class)->map($product);

        $this->assertNull($dto->gtin);
        $this->assertNull($dto->mpn);
        $this->assertTrue($dto->sendIdentifierExists);
    }
}
