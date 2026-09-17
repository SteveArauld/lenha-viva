<?php

namespace App\Domain\Merchant\Support;

class ProductImage
{
    public const MIN_DIMENSION = 500;

    /**
     * First gallery image whose largest on-disk variant is ≥ 500×500,
     * falling back to the first path (Google still needs an image_link).
     */
    public static function main(array $product): ?string
    {
        $images = self::gallery($product);

        foreach ($images as $image) {
            $resolved = self::largestVariant($image);
            if (self::meetsMinDimensions($resolved)) {
                return $resolved;
            }
        }

        $fallback = $images[0] ?? null;

        return $fallback ? self::largestVariant($fallback) : null;
    }

    /**
     * Extra images (max 10) that already meet the minimum size.
     */
    public static function additional(array $product, ?string $mainResolved): array
    {
        $extra = [];
        $mainResolved = $mainResolved ?? '';

        foreach (self::gallery($product) as $image) {
            $resolved = self::largestVariant($image);

            if ($resolved === $mainResolved || in_array($resolved, $extra, true)) {
                continue;
            }

            if (! self::meetsMinDimensions($resolved)) {
                continue;
            }

            $extra[] = $resolved;

            if (count($extra) >= 10) {
                break;
            }
        }

        return $extra;
    }

    public static function publicUrl(string $relativePath): string
    {
        return asset(ltrim($relativePath, '/'));
    }

    public static function largestVariant(string $path): string
    {
        $path = ltrim($path, '/');

        if (! preg_match('/^(.*)-(\d+)x(\d+)(\.[a-zA-Z]+)$/', $path, $m)) {
            return $path;
        }

        $original = $m[1].$m[4];
        $originalFile = public_path($original);

        if (! is_file($originalFile)) {
            return $path;
        }

        $size = @getimagesize($originalFile);

        if ($size && $size[0] >= (int) $m[2] && $size[1] >= (int) $m[3]) {
            return $original;
        }

        return $path;
    }

    public static function meetsMinDimensions(string $servedPath): bool
    {
        $file = public_path($servedPath);

        if (! is_file($file)) {
            return false;
        }

        $size = @getimagesize($file);

        return $size && $size[0] >= self::MIN_DIMENSION && $size[1] >= self::MIN_DIMENSION;
    }

    public static function dimensions(string $servedPath): ?array
    {
        $file = public_path($servedPath);

        if (! is_file($file)) {
            return null;
        }

        $size = @getimagesize($file);

        return $size ? [(int) $size[0], (int) $size[1]] : null;
    }

    private static function gallery(array $product): array
    {
        $images = array_values(array_filter($product['images'] ?? [], fn ($i) => is_string($i) && $i !== ''));

        if ($images === [] && ! empty($product['hover_image'])) {
            $images[] = $product['hover_image'];
        }

        return $images;
    }
}
