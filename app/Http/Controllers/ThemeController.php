<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class ThemeController extends Controller
{
    /**
     * Display the themes page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('themes.index');
    }

    /**
     * Apply a theme and update onboarding status.
     *
     * @param string $themeId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function applyTheme($themeId)
    {
        $user = Auth::user();
        
        // Get or create user's store
        $store = Store::where('user_id', $user->id)->first();
        if (!$store) {
            // Create a default store for the user
            $store = Store::create([
                'user_id' => $user->id,
                'name' => $user->name . "'s Store",
                'domain' => null, // Let user set their own domain
                'description' => 'Welcome to our store',
                'status' => 'active',
                'is_locked' => true,
            ]);
        }
        
        // Update store's selected theme
        $store->update(['selected_theme' => $themeId]);
        
        // Update onboarding status
        $onboardingStatus = $user->onboarding_status ?? [];
        $onboardingStatus['designed_store'] = true;
        
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $user->id)
            ->update(['onboarding_status' => json_encode($onboardingStatus)]);

        return redirect()->route('dashboard')->with('success', "Theme {$themeId} berhasil diterapkan!");
    }
}
