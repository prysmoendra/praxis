<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    use HasFactory;
    protected $fillable = ['shipping_zone_id', 'type', 'min_value', 'max_value', 'rate', 'courier'];
    public function zone() { return $this->belongsTo(ShippingZone::class, 'shipping_zone_id'); }
} 