<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description',
        'price', 'image', 'is_best_seller', 'is_new_arrival'
    ];

    protected function casts(): array
    {
        return [
            'is_best_seller' => 'boolean',
            'is_new_arrival' => 'boolean',
            'price' => 'decimal:2',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }
}
