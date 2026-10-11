@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="flex flex-col lg:flex-row gap-8">
    <!-- Form Utama -->
    <div class="flex-1">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-xl shadow p-8 space-y-6">
                <div>
                    <label class="block font-semibold mb-1 text-lg">Nama Produk</label>
                    <input type="text" name="title" class="w-full border rounded px-3 py-2 text-lg" value="{{ old('title', $product->title) }}" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2 min-h-[120px]" rows="5" required>{{ old('description', $product->description) }}</textarea>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Media</label>
                    <div class="flex flex-wrap gap-4 mb-4">
                        @foreach($product->images as $image)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->alt_text ?? $product->title }}" class="w-24 h-24 object-cover rounded border">
                                <form action="{{ route('products.deleteImage', [$product->id, $image->id]) }}" method="POST" class="absolute top-1 right-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700">&times;</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <input type="file" name="images[]" multiple class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Slug</label>
                    <input type="text" name="slug" class="w-full border rounded px-3 py-2" value="{{ old('slug', $product->slug) }}" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Vendor</label>
                    <input type="text" name="vendor" class="w-full border rounded px-3 py-2" value="{{ old('vendor', $product->vendor) }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tipe Produk</label>
                    <input type="text" name="product_type" class="w-full border rounded px-3 py-2" value="{{ old('product_type', $product->product_type) }}">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Harga</label>
                        <input type="number" name="price" class="w-full border rounded px-3 py-2" step="0.01" value="{{ old('price', $variant->price ?? '') }}" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Harga Coret (Compare at price)</label>
                        <input type="number" name="compare_at_price" class="w-full border rounded px-3 py-2" step="0.01" value="{{ old('compare_at_price', $variant->compare_at_price ?? '') }}">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">SKU</label>
                        <input type="text" name="sku" class="w-full border rounded px-3 py-2" value="{{ old('sku', $variant->sku ?? '') }}">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Stok</label>
                        <input type="number" name="quantity" class="w-full border rounded px-3 py-2" min="0" value="{{ old('quantity', $variant->quantity ?? '') }}">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Berat (kg)</label>
                        <input type="number" name="weight" class="w-full border rounded px-3 py-2" step="0.01" value="{{ old('weight', $variant->weight ?? '') }}">
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2" required>
                        <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="archived" {{ old('status', $product->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tanggal Publish</label>
                    <input type="datetime-local" name="published_at" class="w-full border rounded px-3 py-2" value="{{ old('published_at', $product->published_at ? $product->published_at->format('Y-m-d\TH:i') : '') }}">
                </div>
                <div class="flex justify-end gap-2">
                    <a href="{{ route('dashboard.products.index') }}" class="bg-gray-200 text-gray-800 px-8 py-2 rounded font-semibold hover:bg-gray-400 border border-gray-300 transition">Back</a>
                    <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded font-semibold hover:bg-blue-700 border border-blue-600 transition">Update Produk</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 