<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'id', 'title', 'slug', 'category', 'ref', 'price', 'old_price',
        'in_stock', 'color', 'hover_image', 'images', 'short_description', 'description',
        'unit_measure_value', 'unit_measure_unit', 'eprel_code',
    ];

    protected $casts = [
        'images' => 'array',
        'in_stock' => 'boolean',
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'unit_measure_value' => 'decimal:3',
    ];

    public function categoryModel()
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }

    /**
     * Same shape as the legacy config/loja_products.php entries, so code that
     * still expects that array structure keeps working unchanged.
     */
    public function toCatalogArray(): array
    {
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'hover_image' => $this->hover_image ?? '',
            'old_price' => $this->old_price !== null ? (string) $this->old_price : null,
            'price' => (string) $this->price,
            'category' => $this->category,
            'images' => $this->images ?? [],
            'in_stock' => (bool) $this->in_stock,
            'color' => $this->color ?? '',
            'short_description' => $this->short_description ?? '',
            'description' => $this->description ?? '',
            'ref' => $this->ref ?? '',
            'slug' => $this->slug,
            'unit_measure_value' => $this->unit_measure_value,
            'unit_measure_unit' => $this->unit_measure_unit,
            'eprel_code' => $this->eprel_code,
        ];
    }
}
