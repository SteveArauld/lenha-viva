<?php

namespace App\Support;

/**
 * The category "slugs" stored on products (config/loja_products.php) were
 * generated in Portuguese and are also used as URL segments, so renaming
 * them would break every product URL. This maps each slug to its correct
 * Spanish display label without touching the underlying slugs/routes.
 */
class CategoryLabels
{
    protected static array $labels = [
        'pellets-de-madeira' => 'Pellets de madera',
        'pellets-de-madeira-e-pellets' => 'Pellets de madera',
        'chef-de-madeira' => 'Cocinas de leña',
        'fogao-a-lenha' => 'Estufas de leña',
        'caldeira-de-lenha' => 'Calderas de leña',
        'madeira-de-fogo' => 'Leña',
        'lenha' => 'Leña',
        'madeira-compactada' => 'Madera densificada',
        'a-granel' => 'Venta a granel',
        'uncategorized' => 'Otros productos',
    ];

    public static function label(?string $slug): string
    {
        if (! $slug) {
            return '';
        }

        return self::$labels[$slug] ?? ucwords(str_replace('-', ' ', $slug));
    }
}
