<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingRate;

class ShippingZone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'province',
        'city',
        'district',
        'village',
        'latitude',
        'longitude',
        'store_id',
    ];
    public function store() { return $this->belongsTo(Store::class); }
    public function rates() { return $this->hasMany(ShippingRate::class); }
} 