<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

/**
 * Query facade over the catalog. Data now lives in the `products` table;
 * if that table is not migrated yet (fresh install, tests) it transparently
 * falls back to the legacy array in config/loja_products.php. The public API
 * and the array shape of every result are unchanged.
 */
class LojaProduct
{
    protected Collection $items;

    public function __construct()
    {
        $this->items = self::source();
    }

    protected static function source(): Collection
    {
        try {
            if (Schema::hasTable('products')) {
                $rows = Product::query()->orderBy('id')->get();

                if ($rows->isNotEmpty()) {
                    return $rows->map->toCatalogArray()->values();
                }
            }
        } catch (\Throwable $e) {
            // fall through to the config array
        }

        return collect(config('loja_products', []))->filter(fn ($e) => is_array($e))->values();
    }

    public static function query(): self
    {
        return new self();
    }

    public function where(string $key, $value): self
    {
        $this->items = $this->items->where($key, $value);

        return $this;
    }

    public function search(string $term): self
    {
        $term = strtolower($term);

        $this->items = $this->items->filter(function ($item) use ($term) {
            return str_contains(strtolower($item['title'] ?? ''), $term)
                || str_contains(strtolower($item['slug'] ?? ''), $term);
        });

        return $this;
    }

    public function orderBy(string $key, string $direction = 'asc'): self
    {
        $this->items = $direction === 'asc'
            ? $this->items->sortBy($key)
            : $this->items->sortByDesc($key);

        return $this;
    }

    public function applyFilters(array $filters = []): self
    {
        if (! empty($filters['category'])) {
            $this->items = $this->items->where('category', $filters['category']);
        }

        if (isset($filters['min_price'], $filters['max_price'])) {
            $this->items = $this->items->filter(function ($item) use ($filters) {
                $price = (float) str_replace([',', ' '], '', (string) ($item['price'] ?? 0));

                return $price >= $filters['min_price'] && $price <= $filters['max_price'];
            });
        }

        if (! empty($filters['in_stock'])) {
            $this->items = $this->items->where('in_stock', true);
        }

        if (! empty($filters['stock']) && $filters['stock'] === 'instock') {
            $this->items = $this->items->where('in_stock', true);
        }

        if (! empty($filters['colors']) && is_array($filters['colors'])) {
            $this->items = $this->items->filter(function ($item) use ($filters) {
                return isset($item['color']) && in_array($item['color'], $filters['colors']);
            });
        }

        if (! empty($filters['search'])) {
            $this->search($filters['search']);
        }

        switch ($filters['orderby'] ?? null) {
            case 'price':
                $this->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $this->orderBy('price', 'desc');
                break;
            case 'date':
                $this->orderBy('id', 'desc');
                break;
            case 'title':
                $this->orderBy('title', 'asc');
                break;
            default:
                $this->orderBy('id', 'asc');
        }

        return $this;
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        $page = (int) request('page', 1);

        $results = $this->items
            ->slice(($page - 1) * $perPage, $perPage)
            ->values();

        return new LengthAwarePaginator(
            $results,
            $this->items->count(),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }

    public function get(): Collection
    {
        return $this->items->values();
    }

    public static function find($id): ?array
    {
        return self::source()->firstWhere('id', $id);
    }
}
