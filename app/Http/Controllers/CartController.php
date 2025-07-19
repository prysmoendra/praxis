<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    /**
     * Add item to cart.
     */
    public function add(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'variant_id' => 'required|exists:product_variants,id'
        ]);

        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($request->variant_id);

        $cart = session()->get('cart', []);
        
        $cartKey = $productId . '_' . $request->variant_id;
        
        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            $cart[$cartKey] = [
                'product_id' => $productId,
                'variant_id' => $request->variant_id,
                'product_title' => $product->title,
                'variant_title' => $variant->title,
                'price' => $variant->price,
                'quantity' => $request->quantity,
                'image' => $product->images->first() ? $product->images->first()->url : null
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Show cart contents.
     */
    public function show()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.show', compact('cart', 'total'));
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request, $itemKey)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove item from cart.
     */
    public function remove($itemKey)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$itemKey])) {
            unset($cart[$itemKey]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Item removed from cart!');
    }

    /**
     * Clear entire cart.
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.show')->with('success', 'Cart cleared successfully!');
    }
}
