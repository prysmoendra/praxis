@extends('layouts.app')
@section('title', 'Add Shipping Zone')
@section('content')
<div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Add Shipping Zone</h1>
    <form action="{{ route('shipping-zones.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Zone Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            <a href="{{ route('shipping-zones.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back</a>
        </div>
    </form>
</div>
@endsection 