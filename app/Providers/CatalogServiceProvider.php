<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Throwable;

class CatalogServiceProvider extends ServiceProvider
{
    /**
     * The catalog now lives in the `products` table. To avoid touching every
     * consumer at once, we hydrate config('loja_products') from the database
     * on boot, keeping the exact legacy array shape. The array in
     * config/loja_products.php stays as the import source / fallback.
     */
    public function boot(): void
    {
        try {
            if (! Schema::hasTable('products')) {
                return;
            }

            $products = Product::query()->orderBy('id')->get();

            if ($products->isEmpty()) {
                return;
            }

            config(['loja_products' => $products->map->toCatalogArray()->all()]);
        } catch (Throwable $e) {
            // During install / before migrations the table may not exist yet —
            // fall back to the array already loaded from the config file.
        }
    }
}
