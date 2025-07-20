<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'domain',
        'description',
        'logo',
        'selected_theme',
        'status',
        'is_locked',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingZones()
    {
        return $this->hasMany(ShippingZone::class);
    }
} 