<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\User;

// Home route
Route::get('/', function () {
    return view('welcome.welcome');
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Dashboard order management routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('dashboard.orders.index');
    Route::get('/dashboard/orders/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('dashboard.orders.show');
    Route::put('/dashboard/orders/{id}/status', [App\Http\Controllers\OrderController::class, 'updateStatus'])->name('dashboard.orders.update-status');
    Route::get('/dashboard/orders/stats', [App\Http\Controllers\OrderController::class, 'getStats'])->name('dashboard.orders.stats');
});

// Set store domain from dashboard onboarding
Route::post('/dashboard/set-domain', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'store_domain' => 'required|string|alpha_dash|unique:users,store_domain',
    ]);
    $user = User::find(Auth::id());
    $user->store_domain = $request->store_domain;
    $user->save();
    return back()->with('success', 'Store domain set successfully!');
})->middleware(['auth'])->name('dashboard.set-domain');

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

Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

// Theme routes
Route::get('/online-store/themes', [App\Http\Controllers\ThemeController::class, 'index'])->name('themes.index');
Route::post('/online-store/themes/{themeId}/apply', [App\Http\Controllers\ThemeController::class, 'applyTheme'])->name('themes.apply');

// Multi-tenant storefront routes
Route::get('/{userDomain}', [App\Http\Controllers\StorefrontController::class, 'show'])
    ->where('userDomain', '[a-z0-9-]+\.praxis\.com')
    ->name('storefront.show');

// Cart routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{productId}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{itemKey}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{itemKey}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

// Checkout routes
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{orderId}', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');