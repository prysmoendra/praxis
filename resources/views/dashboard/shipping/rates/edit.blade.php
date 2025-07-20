@extends('layouts.app')
@section('title', 'Edit Shipping Rate')
@section('content')
<div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Shipping Rate for Zone: {{ $zone->name }}</h1>
    <form action="{{ route('shipping-rates.update', $shippingRate) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Type</label>
            <select name="type" class="w-full border rounded px-3 py-2" required>
                <option value="flat" @if($shippingRate->type=='flat') selected @endif>Flat Rate</option>
                <option value="weight" @if($shippingRate->type=='weight') selected @endif>By Weight</option>
                <option value="price" @if($shippingRate->type=='price') selected @endif>By Price</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Min Value (kg or Rp)</label>
            <input type="number" step="0.01" name="min_value" class="w-full border rounded px-3 py-2" value="{{ $shippingRate->min_value }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Max Value (kg or Rp)</label>
            <input type="number" step="0.01" name="max_value" class="w-full border rounded px-3 py-2" value="{{ $shippingRate->max_value }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Rate (Rp)</label>
            <input type="number" step="0.01" name="rate" class="w-full border rounded px-3 py-2" value="{{ $shippingRate->rate }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Courier (optional)</label>
            <input type="text" name="courier" class="w-full border rounded px-3 py-2" value="{{ $shippingRate->courier }}">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('shipping-rates.index', ['zone_id' => $zone->id]) }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back</a>
        </div>
    </form>
</div>
@endsection 