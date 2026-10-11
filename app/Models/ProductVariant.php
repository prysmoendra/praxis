<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'title',
        'price',
        'compare_at_price',
        'sku',
        'quantity',
        'weight',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
