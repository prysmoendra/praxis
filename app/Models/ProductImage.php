<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['url', 'alt_text', 'position'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
