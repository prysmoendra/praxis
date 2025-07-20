<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class StorefrontController extends Controller
{
    /**
     * Display the storefront for a specific user domain.
     *
     * @param string $userDomain
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($userDomain)
    {
        // Find store by domain
        $store = \App\Models\Store::where('domain', $userDomain)->first();
        
        if (!$store) {
            abort(404, 'Store not found');
        }

        $user = $store->user;

        // Get user's products
        $products = Product::where('user_id', $user->id)
                          ->where('status', 'active')
                          ->with(['images', 'variants'])
                          ->get();

        // Get selected theme from store
        $theme = $store->selected_theme ?? 'horizon';

        // Prepare data for the theme
        $storeData = [
            'user' => $user,
            'products' => $products,
            'store_name' => $store->name ?? $user->name . "'s Store",
            'store_description' => $store->description ?? 'Welcome to our store',
            'store_logo' => $store->logo,
        ];

        // Ganti baris yang menentukan view
        // LAMA: return view("themes.{$theme}", $storeData);
        // BARU: Gunakan view dari direktori storefronts yang baru dibuat
        $templateView = "storefronts.{$userDomain}.index";

        // Pastikan variabel lain seperti $store, $customizations, $products tetap di-passing
        return view($templateView, $storeData);
    }

    /**
     * Generate a unique store domain for a user.
     *
     * @param string $userName
     * @return string
     */
    public static function generateStoreDomain($userName)
    {
        $baseDomain = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $userName));
        $domain = $baseDomain . '.praxis.com';
        
        // Check if domain already exists
        $counter = 1;
        while (\App\Models\Store::where('domain', $domain)->exists()) {
            $domain = $baseDomain . $counter . '.praxis.com';
            $counter++;
        }
        
        return $domain;
    }
}
