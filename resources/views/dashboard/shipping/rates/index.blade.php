@extends('layouts.app')
@section('title', 'Shipping Rates')
@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold mb-4">Shipping Rates for Zone: {{ $zone->name }}</h1>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <a href="{{ route('shipping-rates.create', ['zone_id' => $zone->id]) }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Add Rate</a>
    <a href="{{ route('shipping-zones.index') }}" class="inline-block mb-4 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 ml-2">Back to Zones</a>
    <div class="bg-white rounded shadow p-4">
        <table class="min-w-full text-sm">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">Type</th>
                    <th class="py-2 px-4 text-left">Min</th>
                    <th class="py-2 px-4 text-left">Max</th>
                    <th class="py-2 px-4 text-left">Rate</th>
                    <th class="py-2 px-4 text-left">Courier</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rates as $rate)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ ucfirst($rate->type) }}</td>
                        <td class="py-2 px-4">{{ $rate->min_value }}</td>
                        <td class="py-2 px-4">{{ $rate->max_value }}</td>
                        <td class="py-2 px-4">{{ $rate->rate }}</td>
                        <td class="py-2 px-4">{{ $rate->courier }}</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('shipping-rates.edit', $rate) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('shipping-rates.destroy', $rate) }}?zone_id={{ $zone->id }}" method="POST" onsubmit="return confirm('Delete this rate?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-4 text-center text-gray-500">No shipping rates yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 