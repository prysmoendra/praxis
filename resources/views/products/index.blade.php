@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="{{ route('products.create') }}" class="bg-interactive-primary text-interactive-primaryText py-2 px-4 rounded-lg text-sm font-semibold hover:bg-interactive-primary/90 transition-colors">
        <span data-translate-key="dashboard_add_product">Add New Product</span>
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($products as $product)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap flex items-center gap-2">
                    @if($product->images->first())
                        <img src="{{ asset('storage/' . $product->images->first()->url) }}" alt="{{ $product->images->first()->alt_text ?? $product->title }}" class="w-10 h-10 object-cover rounded">
                    @else
                        <span class="w-10 h-10 bg-gray-200 flex items-center justify-center rounded">-</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $product->title }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    Rp.{{ $product->variants->first()->price ?? '-' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $product->variants->first()->quantity ?? '-' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <form action="{{ route('products.updateStatus', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()" class="px-2 py-1 rounded border text-xs font-semibold {{
                            $product->status === 'active' ? 'bg-green-100 text-green-800' : ($product->status === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800')
                        }}">
                            <option value="active" {{ $product->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="draft" {{ $product->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ $product->status === 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </form>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 