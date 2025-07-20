<?php

namespace App\Http\Controllers;

use App\Models\ShippingZone;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShippingZoneController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $store = \App\Models\Store::where('user_id', $user->id)->first();
        $zones = $store ? $store->shippingZones()->get() : collect();
        return view('dashboard.shipping.zones.index', compact('zones', 'store'));
    }

    public function create()
    {
        return view('dashboard.shipping.zones.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $store = \App\Models\Store::where('user_id', $user->id)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $zone = $store->shippingZones()->create($validated);
        
        // Update onboarding status to mark shipping zones as configured
        $onboardingStatus = $user->onboarding_status ?? [];
        $onboardingStatus['configured_shipping'] = true;
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $user->id)
            ->update(['onboarding_status' => json_encode($onboardingStatus)]);
        
        return redirect()->route('shipping-zones.index')->with('success', 'Shipping zone created!');
    }

    public function edit(ShippingZone $shippingZone)
    {
        return view('dashboard.shipping.zones.edit', compact('shippingZone'));
    }

    public function update(Request $request, ShippingZone $shippingZone)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $shippingZone->update($validated);
        return redirect()->route('shipping-zones.index')->with('success', 'Shipping zone updated!');
    }

    public function destroy(ShippingZone $shippingZone)
    {
        $shippingZone->delete();
        return redirect()->route('shipping-zones.index')->with('success', 'Shipping zone deleted!');
    }
}
