<?php

namespace App\Http\Controllers;

use App\Models\ShippingRate;
use App\Models\ShippingZone;
use Illuminate\Http\Request;

class ShippingRateController extends Controller
{
    public function index(Request $request)
    {
        $zoneId = $request->get('zone_id');
        $zone = ShippingZone::findOrFail($zoneId);
        $rates = $zone->rates;
        return view('dashboard.shipping.rates.index', compact('zone', 'rates'));
    }

    public function create(Request $request)
    {
        $zoneId = $request->get('zone_id');
        $zone = ShippingZone::findOrFail($zoneId);
        return view('dashboard.shipping.rates.create', compact('zone'));
    }

    public function store(Request $request)
    {
        $zone = ShippingZone::findOrFail($request->get('zone_id'));
        $validated = $request->validate([
            'type' => 'required|in:flat,weight,price',
            'min_value' => 'nullable|numeric',
            'max_value' => 'nullable|numeric',
            'rate' => 'required|numeric',
            'courier' => 'nullable|string|max:255',
        ]);
        $zone->rates()->create($validated);
        return redirect()->route('shipping-rates.index', ['zone_id' => $zone->id])->with('success', 'Shipping rate created!');
    }

    public function edit(ShippingRate $shippingRate)
    {
        $zone = $shippingRate->zone;
        return view('dashboard.shipping.rates.edit', compact('shippingRate', 'zone'));
    }

    public function update(Request $request, ShippingRate $shippingRate)
    {
        $validated = $request->validate([
            'type' => 'required|in:flat,weight,price',
            'min_value' => 'nullable|numeric',
            'max_value' => 'nullable|numeric',
            'rate' => 'required|numeric',
            'courier' => 'nullable|string|max:255',
        ]);
        $shippingRate->update($validated);
        return redirect()->route('shipping-rates.index', ['zone_id' => $shippingRate->shipping_zone_id])->with('success', 'Shipping rate updated!');
    }

    public function destroy(ShippingRate $shippingRate)
    {
        $zoneId = $shippingRate->shipping_zone_id;
        $shippingRate->delete();
        return redirect()->route('shipping-rates.index', ['zone_id' => $zoneId])->with('success', 'Shipping rate deleted!');
    }
}
