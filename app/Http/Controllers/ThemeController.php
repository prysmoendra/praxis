<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        // Update user's selected theme
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $user->id)
            ->update(['selected_theme' => $themeId]);
        
        // Update onboarding status
        $onboardingStatus = $user->onboarding_status ?? [];
        $onboardingStatus['designed_store'] = true;
        
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $user->id)
            ->update(['onboarding_status' => json_encode($onboardingStatus)]);

        return redirect()->route('dashboard')->with('success', "Theme {$themeId} berhasil diterapkan!");
    }
}
