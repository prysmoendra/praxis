@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="flex flex-col lg:flex-row gap-8">
    <!-- Form Utama -->
    <div class="flex-1">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            <div class="bg-white rounded-xl shadow p-8 space-y-6">
                <div>
                    <label class="block font-semibold mb-1 text-lg">Judul Produk</label>
                    <input type="text" name="title" class="w-full border rounded px-3 py-2 text-lg" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2 min-h-[120px]" rows="5" required></textarea>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Media</label>
                    <div id="drop-area" class="border-2 border-dashed border-gray-300 rounded-lg p-8 flex flex-col items-center justify-center bg-gray-50 min-h-[200px] transition-colors duration-200 cursor-pointer relative">
                        <svg class="w-16 h-16 text-blue-400 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 48 48">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M24 6v30m0 0l-8-8m8 8l8-8"/>
                            <rect x="8" y="38" width="32" height="4" rx="2" fill="currentColor" class="text-blue-100"/>
                        </svg>
                        <span class="text-gray-700 font-medium text-lg mb-1">Drag & Drop gambar di sini</span>
                        <span class="text-gray-500 text-sm mb-2">atau klik untuk memilih file</span>
                        <input id="file-input" type="file" name="images[]" multiple class="absolute inset-0 opacity-0 cursor-pointer" style="height:100%;width:100%;">
                    </div>
                    <script>
                        const dropArea = document.getElementById('drop-area');
                        const fileInput = document.getElementById('file-input');
                        dropArea.addEventListener('dragover', (e) => {
                            e.preventDefault();
                            dropArea.classList.add('bg-blue-50', 'border-blue-400');
                        });
                        dropArea.addEventListener('dragleave', (e) => {
                            dropArea.classList.remove('bg-blue-50', 'border-blue-400');
                        });
                        dropArea.addEventListener('drop', (e) => {
                            e.preventDefault();
                            dropArea.classList.remove('bg-blue-50', 'border-blue-400');
                            fileInput.files = e.dataTransfer.files;
                        });
                    </script>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Slug</label>
                    <input type="text" name="slug" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Vendor</label>
                    <input type="text" name="vendor" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tipe Produk</label>
                    <input type="text" name="product_type" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Kategori / Koleksi</label>
                    <input type="text" name="collections" class="w-full border rounded px-3 py-2" placeholder="Pisahkan dengan koma">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tag</label>
                    <input type="text" name="tags" class="w-full border rounded px-3 py-2" placeholder="Pisahkan dengan koma">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Harga</label>
                        <input type="number" name="price" class="w-full border rounded px-3 py-2" step="0.01" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Harga Coret (Compare at price)</label>
                        <input type="number" name="compare_at_price" class="w-full border rounded px-3 py-2" step="0.01">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">SKU</label>
                        <input type="text" name="sku" class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Stok</label>
                        <input type="number" name="quantity" class="w-full border rounded px-3 py-2" min="0">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Berat (kg)</label>
                        <input type="number" name="weight" class="w-full border rounded px-3 py-2" step="0.01">
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2" required>
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tanggal Publish</label>
                    <input type="datetime-local" name="published_at" class="w-full border rounded px-3 py-2">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded font-semibold hover:bg-blue-700 transition">Simpan Produk</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Panel Samping -->
    <div class="w-full lg:w-80 flex-shrink-0 space-y-8">
        <div class="bg-white rounded-xl shadow p-6">
            <div class="mb-4">
                <label class="block font-semibold mb-1">Status</label>
                <select name="status_side" class="w-full border rounded px-3 py-2">
                    <option value="active">Active</option>
                    <option value="draft">Draft</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Publikasi</label>
                <input type="checkbox" name="published" class="mr-2"> Online Store
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Organisasi Produk</label>
                <input type="text" name="type_side" class="w-full border rounded px-3 py-2 mb-2" placeholder="Type">
                <input type="text" name="vendor_side" class="w-full border rounded px-3 py-2 mb-2" placeholder="Vendor">
                <input type="text" name="collections_side" class="w-full border rounded px-3 py-2 mb-2" placeholder="Collections">
                <input type="text" name="tags_side" class="w-full border rounded px-3 py-2" placeholder="Tags">
            </div>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <div class="mb-4">
                <label class="block font-semibold mb-1">SEO</label>
                <input type="text" name="seo_title" class="w-full border rounded px-3 py-2 mb-2" placeholder="SEO Title">
                <textarea name="seo_description" class="w-full border rounded px-3 py-2" rows="2" placeholder="SEO Description"></textarea>
            </div>
        </div>
    </div>
</div>
@endsection 