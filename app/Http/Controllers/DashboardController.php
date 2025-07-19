<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $onboardingStatus = $user->onboarding_status ?? [];
        
        return view('dashboard.dashboard', compact('user', 'onboardingStatus'));
    }
}
