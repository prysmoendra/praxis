<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255',
            'vendor' => 'nullable|string|max:255',
            'product_type' => 'nullable|string|max:255',
            'collections' => 'nullable|string',
            'tags' => 'nullable|string',
            'price' => 'required|numeric',
            'compare_at_price' => 'nullable|numeric',
            'sku' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer',
            'weight' => 'nullable|numeric',
            'status' => 'required|in:active,draft,archived',
            'published_at' => 'nullable|date',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        // Save product
        $product = new \App\Models\Product();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->slug = $validated['slug'];
        $product->vendor = $validated['vendor'] ?? null;
        $product->product_type = $validated['product_type'] ?? null;
        $product->status = $validated['status'];
        $product->published_at = $validated['published_at'] ?? null;
        $product->user_id = Auth::user()->id; // Associate with current user
        $product->save();

        // Save default variant
        $product->variants()->create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'compare_at_price' => $validated['compare_at_price'] ?? null,
            'sku' => $validated['sku'] ?? null,
            'quantity' => $validated['quantity'] ?? 0,
            'weight' => $validated['weight'] ?? null,
        ]);

        // Save images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'url' => $path,
                    'alt_text' => $product->title,
                    'position' => 0,
                ]);
            }
        }

        // Update onboarding status - user has added their first product
        $user = Auth::user();
        $onboardingStatus = $user->onboarding_status ?? [];
        $onboardingStatus['has_added_product'] = true;
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $user->id)
            ->update(['onboarding_status' => json_encode($onboardingStatus)]);

        // Debug: data POST
        // dd([
        //     'validated' => $validated,
        //     'images' => $imagePaths,
        // ]);

        return redirect()->route('dashboard.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function index()
    {
        $products = \App\Models\Product::where('user_id', Auth::id())
            ->with(['variants', 'images'])
            ->latest()
            ->get();
        return view('products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = \App\Models\Product::where('id', $id)
            ->where('user_id', Auth::id())
            ->with(['variants', 'images'])
            ->firstOrFail();
        $variant = $product->variants->first();
        return view('products.edit', compact('product', 'variant'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $product = \App\Models\Product::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->save();
        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,draft,archived',
        ]);
        $product = \App\Models\Product::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $product->status = $request->status;
        $product->save();
        return redirect()->route('dashboard.products.index')->with('success', 'Status produk berhasil diubah.');
    }

    public function destroy($id)
    {
        $product = \App\Models\Product::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully.');
    }

    public function deleteImage($productId, $imageId)
    {
        $product = \App\Models\Product::where('id', $productId)->where('user_id', Auth::id())->firstOrFail();
        $image = $product->images()->where('id', $imageId)->firstOrFail();
        // Hapus file fisik
        \Illuminate\Support\Facades\Storage::disk('public')->delete($image->url);
        $image->delete();
        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
