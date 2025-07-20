@extends('layouts.app')
@section('title', 'Add Shipping Rate')
@section('content')
<div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Add Shipping Rate for Zone: {{ $zone->name }}</h1>
    <form action="{{ route('shipping-rates.store') }}" method="POST">
        @csrf
        <input type="hidden" name="zone_id" value="{{ $zone->id }}">
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Type</label>
            <select name="type" class="w-full border rounded px-3 py-2" required>
                <option value="flat">Flat Rate</option>
                <option value="weight">By Weight</option>
                <option value="price">By Price</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Min Value (kg or Rp)</label>
            <input type="number" step="0.01" name="min_value" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Max Value (kg or Rp)</label>
            <input type="number" step="0.01" name="max_value" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Rate (Rp)</label>
            <input type="number" step="0.01" name="rate" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Courier (optional)</label>
            <input type="text" name="courier" class="w-full border rounded px-3 py-2">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            <a href="{{ route('shipping-rates.index', ['zone_id' => $zone->id]) }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back</a>
        </div>
    </form>
</div>
@endsection 