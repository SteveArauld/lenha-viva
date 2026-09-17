<?php

namespace App\DTO\Merchant;

use App\Domain\Merchant\Support\Availability;

class GoogleProductData
{
    /**
     * @param  list<string>  $additionalImageLinks
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $link,
        public string $imageLink,
        public array $additionalImageLinks,
        public string $price,
        public ?string $salePrice,
        public float $offerAmount,
        public string $currency,
        public Availability $availability,
        public string $condition,
        public ?string $brand,
        public ?string $gtin,
        public ?string $mpn,
        public bool $identifierExists,
        public bool $sendIdentifierExists,
        public ?string $itemGroupId,
        public ?string $color,
        public ?string $googleProductCategory,
        public ?string $productType,
        public ?string $unitPricingMeasure,
        public ?string $unitPricingBaseMeasure,
        public ?string $certificationCode,
        public string $shippingCountry,
        public string $shippingService,
        public string $shippingPrice,
        public int $minHandlingTime,
        public int $maxHandlingTime,
        public int $minTransitTime,
        public int $maxTransitTime,
        public int $returnDays,
        public bool $eligible,
        public string $sku,
        public bool $inStock,
    ) {}

    /**
     * JSON-LD Product + Offer. Price is the amount the customer pays now
     * (sale price when present) so it matches the PDP and g:sale_price.
     *
     * @return array<string, mixed>
     */
    public function toJsonLd(): array
    {
        $nap = config('merchant.nap');
        $product = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $this->title,
            'description' => $this->description,
            'image' => $this->imageLink,
            'sku' => $this->sku,
            'offers' => [
                '@type' => 'Offer',
                'url' => $this->link,
                'priceCurrency' => $this->currency,
                'price' => number_format($this->offerAmount, 2, '.', ''),
                'availability' => $this->availability->schemaUrl(),
                'itemCondition' => 'https://schema.org/NewCondition',
                'seller' => [
                    '@type' => 'Organization',
                    'name' => $nap['legal_name'] ?? config('app.name'),
                ],
                'hasMerchantReturnPolicy' => $this->returnPolicy(),
                'shippingDetails' => $this->shippingDetails(),
            ],
        ];

        if ($this->brand) {
            $product['brand'] = ['@type' => 'Brand', 'name' => $this->brand];
        }

        if ($this->gtin) {
            $len = strlen($this->gtin);
            $key = match ($len) {
                8 => 'gtin8',
                12 => 'gtin12',
                13 => 'gtin13',
                14 => 'gtin14',
                default => 'gtin',
            };
            $product[$key] = $this->gtin;
        }

        if ($this->mpn) {
            $product['mpn'] = $this->mpn;
        }

        if ($this->productType) {
            $product['category'] = $this->productType;
        }

        return $product;
    }

    /**
     * @return array<string, mixed>
     */
    public function returnPolicy(): array
    {
        return [
            '@type' => 'MerchantReturnPolicy',
            'applicableCountry' => $this->shippingCountry,
            'returnPolicyCategory' => 'https://schema.org/MerchantReturnFiniteReturnWindow',
            'merchantReturnDays' => $this->returnDays,
            'returnMethod' => 'https://schema.org/ReturnByMail',
            'returnFees' => 'https://schema.org/ReturnShippingFees',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function shippingDetails(): array
    {
        return [
            '@type' => 'OfferShippingDetails',
            'shippingRate' => [
                '@type' => 'MonetaryAmount',
                'value' => $this->shippingPrice,
                'currency' => $this->currency,
            ],
            'shippingDestination' => [
                '@type' => 'DefinedRegion',
                'addressCountry' => $this->shippingCountry,
            ],
            'deliveryTime' => [
                '@type' => 'ShippingDeliveryTime',
                'handlingTime' => [
                    '@type' => 'QuantitativeValue',
                    'minValue' => $this->minHandlingTime,
                    'maxValue' => $this->maxHandlingTime,
                    'unitCode' => 'd',
                ],
                'transitTime' => [
                    '@type' => 'QuantitativeValue',
                    'minValue' => $this->minTransitTime,
                    'maxValue' => $this->maxTransitTime,
                    'unitCode' => 'd',
                ],
            ],
        ];
    }
}
