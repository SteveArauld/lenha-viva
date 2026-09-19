<?php

namespace App\Domain\Merchant;

use App\Domain\Merchant\Support\Availability;
use App\Domain\Merchant\Support\BrandResolver;
use App\Domain\Merchant\Support\Gtin;
use App\Domain\Merchant\Support\PriceFormatter;
use App\Domain\Merchant\Support\ProductImage;
use App\Domain\Merchant\Support\TitleBuilder;
use App\DTO\Merchant\GoogleProductData;
use App\Models\Product;
use App\Support\CategoryLabels;
use App\Support\UnitPricing;

class GoogleProductMapper
{
    private const EPREL_CATEGORIES = ['estufas-de-pellets', 'calderas-de-lena'];

    public function map(Product|array $product): GoogleProductData
    {
        $row = $product instanceof Product ? $product->toCatalogArray() : $product;

        $currency = (string) config('merchant.currency', 'EUR');
        $shipping = config('merchant.shipping');
        $returns = config('merchant.returns');

        $id = (int) ($row['id'] ?? 0);
        $feedId = (string) config('merchant.feed_id_prefix', 'lv-').$id;

        $offerAmount = PriceFormatter::amount($row['price'] ?? 0);
        $regularAmount = PriceFormatter::amount($row['old_price'] ?? 0);
        $onSale = $regularAmount > $offerAmount && $offerAmount > 0;

        $availability = Availability::fromStock(! empty($row['in_stock']));
        $brand = BrandResolver::resolve($row);
        $gtin = $this->gtin($row, $id);
        $mpn = $gtin ? null : $this->mpn($row, $id);
        $hasIdentifier = $gtin !== null || $mpn !== null;
        $sendIdentifierExists = ! $hasIdentifier && $brand === null;

        $mainImage = ProductImage::main($row);
        $additional = $mainImage ? ProductImage::additional($row, $mainImage) : [];

        $title = TitleBuilder::build((string) ($row['title'] ?? ''), $brand, $row['color'] ?? null);
        $description = TitleBuilder::description(
            (string) ($row['description'] ?? $row['short_description'] ?? '')
        );

        $slug = (string) ($row['slug'] ?? '');
        $link = $slug !== '' ? route('product.show', ['slug' => $slug]) : '';

        $category = $row['category'] ?? null;
        $googleCategory = $row['google_product_category']
            ?? (config('merchant.google_product_category')[$category] ?? null);

        $unitValue = isset($row['unit_measure_value']) ? (float) $row['unit_measure_value'] : null;
        $unit = $row['unit_measure_unit'] ?? null;

        $eligible = $id > 0
            && $slug !== ''
            && $title !== ''
            && $description !== ''
            && $mainImage !== null
            && $offerAmount > 0
            && $link !== '';

        return new GoogleProductData(
            id: $feedId,
            title: $title,
            description: $description,
            link: $link,
            imageLink: $mainImage ? ProductImage::publicUrl($mainImage) : '',
            additionalImageLinks: array_map(fn ($p) => ProductImage::publicUrl($p), $additional),
            price: PriceFormatter::google($onSale ? $regularAmount : $offerAmount, $currency),
            salePrice: $onSale ? PriceFormatter::google($offerAmount, $currency) : null,
            offerAmount: $offerAmount,
            currency: $currency,
            availability: $availability,
            condition: 'new',
            brand: $brand,
            gtin: $gtin,
            mpn: $mpn,
            identifierExists: $hasIdentifier || $brand !== null,
            sendIdentifierExists: $sendIdentifierExists,
            itemGroupId: null,
            color: ($row['color'] ?? '') !== '' ? (string) $row['color'] : null,
            googleProductCategory: $googleCategory ? (string) $googleCategory : null,
            productType: $category ? CategoryLabels::label($category) : null,
            unitPricingMeasure: UnitPricing::measureString($unitValue, $unit),
            unitPricingBaseMeasure: UnitPricing::baseMeasureString($unit),
            certificationCode: $this->eprelCode($row),
            shippingCountry: (string) ($shipping['country'] ?? 'ES'),
            shippingService: (string) ($shipping['service'] ?? 'Estándar'),
            shippingPrice: number_format((float) ($shipping['price'] ?? 0), 2, '.', ''),
            minHandlingTime: (int) ($shipping['handling_min'] ?? 0),
            maxHandlingTime: (int) ($shipping['handling_max'] ?? 1),
            minTransitTime: (int) ($shipping['transit_min'] ?? 2),
            maxTransitTime: (int) ($shipping['transit_max'] ?? 3),
            returnDays: (int) ($returns['days'] ?? 14),
            eligible: $eligible,
            sku: $feedId,
            inStock: $availability === Availability::InStock,
        );
    }

    private function gtin(array $row, int $id): ?string
    {
        foreach (['gtin', 'ref'] as $key) {
            $candidate = isset($row[$key]) ? (string) $row[$key] : '';

            if ($candidate === '' || str_contains($candidate, (string) $id)) {
                continue;
            }

            $normalized = Gtin::normalize($candidate);

            if ($normalized) {
                return $normalized;
            }
        }

        return null;
    }

    /**
     * Manufacturer part number only when it is not the catalog id / Woo SKU clone.
     */
    private function mpn(array $row, int $id): ?string
    {
        $ref = trim((string) ($row['ref'] ?? ''));

        if ($ref === '') {
            return null;
        }

        if (strcasecmp($ref, (string) $id) === 0 || strcasecmp($ref, 'LV-'.$id) === 0) {
            return null;
        }

        if (preg_match('/^\d+$/', $ref) && str_contains($ref, (string) $id)) {
            return null;
        }

        // A bare 8–14 digit code is a barcode, not a part number: a valid one
        // is already sent as gtin, an invalid one must not be recycled as mpn.
        if (preg_match('/^\d{8,14}$/', $ref)) {
            return null;
        }

        return mb_substr($ref, 0, 70);
    }

    private function eprelCode(array $row): ?string
    {
        if (! in_array($row['category'] ?? null, self::EPREL_CATEGORIES, true)) {
            return null;
        }

        $code = trim((string) ($row['eprel_code'] ?? ''));

        return ($code !== '' && preg_match('/^\d+$/', $code)) ? $code : null;
    }
}
