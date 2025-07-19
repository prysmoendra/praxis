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
        // Find user by store domain
        $user = User::where('store_domain', $userDomain)->first();
        
        if (!$user) {
            abort(404, 'Store not found');
        }

        // Get user's products
        $products = Product::where('user_id', $user->id)
                          ->where('status', 'active')
                          ->with(['images', 'variants'])
                          ->get();

        // Get selected theme
        $theme = $user->selected_theme ?? 'horizon';

        // Prepare data for the theme
        $storeData = [
            'user' => $user,
            'products' => $products,
            'store_name' => $user->store_name ?? $user->name . "'s Store",
            'store_description' => $user->store_description ?? 'Welcome to our store',
            'store_logo' => $user->store_logo,
        ];

        // Render the appropriate theme
        return view("themes.{$theme}", $storeData);
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
        while (User::where('store_domain', $domain)->exists()) {
            $domain = $baseDomain . $counter . '.praxis.com';
            $counter++;
        }
        
        return $domain;
    }
}
