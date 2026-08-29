<?php

namespace App\Support;

/**
 * Certifications held by Casacuberta Trias S.L. (brand "Lenha Viva").
 *
 * Certificate numbers / validity dates are placeholders — replace the
 * "[POR COMPLETAR]" values with the real data from each certificate.
 * The PDF files go in public/certificaciones/ ; until they are supplied the
 * "pdf" key stays null and the page shows "documento disponible bajo petición".
 */
class Certifications
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            [
                'key' => 'enplus-a1',
                'name' => 'ENplus® A1',
                'scope' => 'Pellets de madera — calidad A1 (norma ISO 17225-2)',
                'issuer' => 'European Pellet Council / AVEBIOM (España)',
                'number' => '[POR COMPLETAR]',
                'validity' => '[POR COMPLETAR]',
                'pdf' => null,
            ],
            [
                'key' => 'dinplus',
                'name' => 'DINplus',
                'scope' => 'Pellets de madera — certificación de calidad DINplus',
                'issuer' => 'DIN CERTCO (Alemania)',
                'number' => '[POR COMPLETAR]',
                'validity' => '[POR COMPLETAR]',
                'pdf' => null,
            ],
            [
                'key' => 'iso-9001',
                'name' => 'ISO 9001',
                'scope' => 'Sistema de gestión de la calidad',
                'issuer' => '[POR COMPLETAR — organismo certificador acreditado ENAC]',
                'number' => '[POR COMPLETAR]',
                'validity' => '[POR COMPLETAR]',
                'pdf' => null,
            ],
            [
                'key' => 'nf',
                'name' => 'NF Bois de chauffage',
                'scope' => 'Leña secada en secadero — humedad garantizada inferior al 20 %',
                'issuer' => 'FCBA / marque NF (Francia)',
                'number' => '[POR COMPLETAR]',
                'validity' => '[POR COMPLETAR]',
                'pdf' => null,
            ],
        ];
    }

    /**
     * Certification badges that apply to a given product, decided from its
     * category and description. Only badges that genuinely cover the product
     * are returned — never a blanket badge on the whole catalog.
     *
     * @return array<int, array<string, string>>
     */
    public static function forProduct(array $product): array
    {
        $category = $product['category'] ?? '';
        $haystack = mb_strtolower(
            ($product['title'] ?? '').' '
            .($product['short_description'] ?? '').' '
            .($product['description'] ?? '')
        );

        $badges = [];

        $isPellet = str_contains($category, 'pellets')
            || str_contains($haystack, 'pellet')
            || str_contains($haystack, 'granulado');

        if ($isPellet) {
            if (str_contains($haystack, 'enplus') || str_contains($haystack, 'en plus')) {
                $badges['enplus-a1'] = ['name' => 'ENplus® A1', 'key' => 'enplus-a1'];
            }
            if (str_contains($haystack, 'dinplus') || str_contains($haystack, 'din plus')) {
                $badges['dinplus'] = ['name' => 'DINplus', 'key' => 'dinplus'];
            }
        }

        $isFirewood = in_array($category, ['lenha', 'madeira-de-fogo', 'madeira-compactada', 'a-granel'], true)
            || str_contains($haystack, 'leña')
            || str_contains($haystack, 'troncos');

        if ($isFirewood && (str_contains($haystack, 'certificaci') && str_contains($haystack, 'nf')
            || str_contains($haystack, 'certificación nf')
            || str_contains($haystack, 'certificado nf')
            || str_contains($haystack, ' nf.')
            || str_contains($haystack, 'secado en secadero')
            || str_contains($haystack, 'séchoir'))) {
            $badges['nf'] = ['name' => 'NF Bois de chauffage', 'key' => 'nf'];
        }

        return array_values($badges);
    }
}
