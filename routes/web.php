<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::post('/check-user', [AuthController::class, 'checkUser']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

// Dashboard route (requires authentication)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Test route for development (remove in production)
Route::get('/test-auth', function () {
    $user = \App\Models\User::where('phone', '628123456789')->first();
    if ($user) {
        return response()->json([
            'success' => true,
            'message' => 'Test user found',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email
            ]
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Test user not found'
        ]);
    }
});