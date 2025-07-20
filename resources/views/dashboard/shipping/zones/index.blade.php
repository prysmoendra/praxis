@extends('layouts.app')
@section('title', 'Shipping Zones')
@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold mb-4">Shipping Zones</h1>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <a href="{{ route('shipping-zones.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Add Zone</a>
    <div class="bg-white rounded shadow p-4">
        <table class="min-w-full text-sm">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-left">Description</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($zones as $zone)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $zone->name }}</td>
                        <td class="py-2 px-4">{{ $zone->description }}</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('shipping-zones.edit', $zone) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('shipping-zones.destroy', $zone) }}" method="POST" onsubmit="return confirm('Delete this zone?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="py-4 text-center text-gray-500">No shipping zones yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 