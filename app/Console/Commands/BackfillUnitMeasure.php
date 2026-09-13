<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Support\UnitPricing;
use Illuminate\Console\Command;

/**
 * One-off / repeatable backfill of unit_measure_value + unit_measure_unit
 * from the product title. Only touches products where both columns are
 * still empty, so a manually corrected value is never overwritten.
 */
class BackfillUnitMeasure extends Command
{
    protected $signature = 'products:backfill-unit-measure {--dry-run : Show what would change without writing to the database}';

    protected $description = 'Derive unit_measure_value/unit_measure_unit from product titles for products missing them';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $products = Product::query()
            ->whereNull('unit_measure_value')
            ->whereNull('unit_measure_unit')
            ->get();

        $updated = 0;
        $skipped = 0;

        foreach ($products as $product) {
            $result = UnitPricing::parseFromTitle($product->title, $product->category);

            if ($result === null) {
                $skipped++;

                continue;
            }

            $this->line(sprintf(
                '#%d %s -> %s%s',
                $product->id,
                $product->title,
                $result['value'],
                $result['unit']
            ));

            if (! $dryRun) {
                $product->unit_measure_value = $result['value'];
                $product->unit_measure_unit = $result['unit'];
                $product->save();
            }

            $updated++;
        }

        $this->info(sprintf(
            '%s%d produits mis à jour, %d sans mesure détectée (sur %d examinés).',
            $dryRun ? '[dry-run] ' : '',
            $updated,
            $skipped,
            $products->count()
        ));

        return self::SUCCESS;
    }
}
