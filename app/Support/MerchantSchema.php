<?php

namespace App\Support;

class MerchantSchema
{
    /**
     * Organization + OnlineStore + ContactPoint sharing the same NAP.
     *
     * @return array<string, mixed>
     */
    public static function graph(): array
    {
        $nap = config('merchant.nap');
        $orgId = url('/').'/#organization';
        $address = [
            '@type' => 'PostalAddress',
            'streetAddress' => $nap['street'],
            'postalCode' => $nap['postal_code'],
            'addressLocality' => $nap['locality'],
            'addressRegion' => $nap['region'],
            'addressCountry' => $nap['country'],
        ];

        return [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => $orgId,
                    'name' => $nap['legal_name'],
                    'legalName' => $nap['legal_name'],
                    'vatID' => $nap['vat_id'],
                    'taxID' => $nap['tax_id'],
                    'url' => url('/'),
                    'logo' => asset('wp-content/uploads/2022/01/er-01-scaled.png'),
                    'email' => $nap['email'],
                    'telephone' => $nap['telephone'],
                    'address' => $address,
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'contactType' => 'customer service',
                        'telephone' => $nap['telephone'],
                        'email' => $nap['email'],
                        'areaServed' => 'ES',
                        'availableLanguage' => 'es',
                    ],
                ],
                [
                    '@type' => 'OnlineStore',
                    '@id' => url('/').'/#store',
                    'name' => $nap['legal_name'],
                    'url' => url('/'),
                    'parentOrganization' => ['@id' => $orgId],
                    'email' => $nap['email'],
                    'telephone' => $nap['telephone'],
                    'address' => $address,
                    'areaServed' => 'ES',
                    'currenciesAccepted' => config('merchant.currency', 'EUR'),
                    'priceRange' => '€€',
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/').'/#website',
                    'url' => url('/'),
                    'name' => $nap['legal_name'],
                    'inLanguage' => 'es-ES',
                    'publisher' => ['@id' => $orgId],
                ],
                [
                    '@type' => 'LocalBusiness',
                    '@id' => url('/').'/#localbusiness',
                    'name' => $nap['legal_name'],
                    'legalName' => $nap['legal_name'],
                    'vatID' => $nap['vat_id'],
                    'parentOrganization' => ['@id' => $orgId],
                    'url' => url('/'),
                    'image' => asset('wp-content/uploads/2022/01/er-01-scaled.png'),
                    'email' => $nap['email'],
                    'telephone' => $nap['telephone'],
                    'address' => $address,
                    'areaServed' => 'ES',
                ],
            ],
        ];
    }
}
