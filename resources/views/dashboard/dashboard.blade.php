@extends('layouts.app')
@section('title', 'Praxis Dashboard - ' . ($user->name ?? ''))
@section('content')
<!-- Welcome Section -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-text-primary mb-2">
        <span id="greeting" data-translate-key="greeting_morning">Good Morning</span>, {{ $user->name }}!
    </h1>
    <p class="text-text-secondary" data-translate-key="dashboard_manage_store">Manage your Praxis e-commerce store and track your business performance.</p>
</div>

@php
    // Check if user is new (created within last 7 days and no setup completed)
    $isNewUser = $user->created_at->diffInDays(now()) <= 7;
    $setupCompleted = false; // This would be stored in database in real implementation
    
    // Get user's store
    $store = \App\Models\Store::where('user_id', $user->id)->first();
    
    // Check if all three steps in "Sell online" section are complete
    $hasAddedProduct = isset($onboardingStatus['has_added_product']) && $onboardingStatus['has_added_product'];
    $hasDomain = $store && $store->domain && trim($store->domain) !== '';
    $hasDesignedStore = isset($onboardingStatus['designed_store']) && $onboardingStatus['designed_store']; // Design store is complete if theme is set
    
    $sellOnlineComplete = $hasAddedProduct && $hasDomain && $hasDesignedStore;
    
    // Calculate progress for all tasks
    $completedTasks = 0;
    $totalTasks = 8;
    
    // Sell Online Section (3 tasks)
    if ($hasAddedProduct) $completedTasks++;
    if ($hasDomain) $completedTasks++;
    if ($hasDesignedStore) $completedTasks++;
    
    // Store Settings Section (2 tasks)
    $hasStoreName = $store && $store->name && trim($store->name) !== '';
    $hasShippingZones = $store && $store->shippingZones()->count() > 0;
    
    if ($hasStoreName) $completedTasks++;
    if ($hasShippingZones) $completedTasks++;
    
    $storeSettingsComplete = $hasStoreName && $hasShippingZones;
    
    // Launch Store Section (2 tasks) - Currently not implemented, so always 0
    // Place test order - not implemented yet
    // Unlock store - not implemented yet
    
    // Point of Sale Section (1 task) - Currently not implemented, so always 0
    // Configure POS settings - not implemented yet
    
    // Debug: Show task status (temporary for checking)
    $taskStatus = [
        'Add your first product' => $hasAddedProduct ? '✅ Complete' : '❌ Not done',
        'Design your store' => $hasDesignedStore ? '✅ Complete' : '❌ Not done',
        'Customize your domain' => $hasDomain ? '✅ Complete' : '❌ Not done',
        'Add store name' => $hasStoreName ? '✅ Complete' : '❌ Not done',
        'Review shipping rates' => $hasShippingZones ? '✅ Complete' : '❌ Not done',
        'Place test order' => '❌ Not implemented',
        'Unlock store' => '❌ Not implemented',
        'Configure POS settings' => '❌ Not implemented'
    ];
@endphp

@if($isNewUser && !$setupCompleted)
    <!-- Setup Guide for New Users -->
    <div class="mb-8">
        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <!-- Setup Guide Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center space-x-5">
                        <div class="w-10 h-10 bg-accent-primary rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            {{-- <p class="text-sm text-text-secondary" data-translate-key="dashboard_tasks_complete">{{ $completedTasks }} of {{ $totalTasks }} tasks complete</p> --}}
                            <h3 class="text-sm text-text-secondary">{{ $completedTasks }} of {{ $totalTasks }} tasks complete</h3>
                            <h2 class="text-2xl font-bold text-text-primary" data-translate-key="dashboard_setup_guide">Setup guide</h2>
                        </div>
                    </div>
                </div>
                <p class="text-text-secondary text-sm" data-translate-key="dashboard_complete_tasks">Complete these essential tasks to get your store up and running.</p>
            </div>
            <!-- Setup Guide Accordion -->
            <div class="space-y-0">
                <!-- Sell Online Section -->
                <div class="border-t border-border-primary first:border-t-0">
                    <button onclick="toggleAccordion('sell-online')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 {{ $sellOnlineComplete ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center">
                                @if($sellOnlineComplete)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @else
                                    <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                @endif
                            </div>
                            <span class="text-text-primary font-semibold" data-translate-key="dashboard_sell_online">Sell online</span>
                        </div>
                        <svg id="sell-online-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="sell-online-content" class="accordion-content pb-4">
                        <div class="ml-9 space-y-4">
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ isset($onboardingStatus['has_added_product']) && $onboardingStatus['has_added_product'] ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if(isset($onboardingStatus['has_added_product']) && $onboardingStatus['has_added_product'])
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_add_first_product">Add your first product</h4>
                                    <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_add_first_product_desc">Write a description, add photos, and set pricing for the products you plan to sell.</p>
                                    @if(!isset($onboardingStatus['has_added_product']) || !$onboardingStatus['has_added_product'])
                                        <div class="flex space-x-3">
                                            <a href="{{ route('products.create') }}">
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_add_product">Add product</span>
                                                </button>
                                            </a>
                                            <button class="action-btn-secondary bg-interactive-secondary text-interactive-secondaryText px-4 py-2 rounded-lg text-sm font-semibold border border-border-primary transition-colors">
                                                <span data-translate-key="dashboard_learn_more">Learn more</span>
                                            </button>
                                        </div>
                                    @else
                                        <div class="flex items-center space-x-2">
                                            <span class="text-green-600 text-sm font-medium">✓ Completed</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/shopifycloud/shopify/assets/admin/home/onboarding/home-onboarding-add-import-products-3ceb89e4fef1ee85d58fa00f9a3073a06b41d69463281060dcbee49c6d224904.svg" class="w-40 h-28">
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ (isset($onboardingStatus['designed_store']) && $onboardingStatus['designed_store']) ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if(isset($onboardingStatus['designed_store']) && $onboardingStatus['designed_store'])
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-text-primary font-semibold mb-1 flex items-center" data-translate-key="dashboard_design_store">
                                        Design your store
                                        @if(isset($onboardingStatus['designed_store']) && $onboardingStatus['designed_store'])
                                            <span class="ml-2 inline-flex items-center px-3 py-1.5 rounded-full bg-green-500 text-white shadow-sm">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                <span class="ml-1 text-white text-xs font-semibold">Theme complete</span>
                                            </span>
                                        @endif
                                    </h4>
                                    <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_design_store_desc">Customize your store's appearance and layout.</p>
                                    @if(isset($onboardingStatus['designed_store']) && $onboardingStatus['designed_store'])
                                        <div class="flex items-center space-x-2">
                                            <span class="text-green-600 text-sm font-medium">✓ Completed</span>
                                        </div>
                                    @else
                                        <a href="{{ route('themes.index') }}">
                                            <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                <span data-translate-key="dashboard_customize_theme">Customize theme</span>
                                            </button>
                                        </a>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/b/shopify-guidance-dashboard-public/insiqov52rypdygzdwnmwabm1rrp.svgz" class="w-40 h-28">
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ $hasDomain ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if($hasDomain)
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">3</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 mb-1">Set your store domain</h4>
                                    <p class="text-text-secondary text-sm mb-3">Set up a custom domain for your online store.</p>
                                    @if($hasDomain && $store)
                                        <div class="mt-2 p-3 bg-gray-100 rounded-md">
                                            <p class="text-sm text-gray-600 font-medium">Domain Anda: <strong>{{ $store->domain }}</strong></p>
                                            <p class="text-xs text-gray-500 mt-1">Nama domain tidak dapat diubah setelah disimpan.</p>
                                        </div>
                                    @else
                                        <div x-data="{ editing: false, domain: '' }">
                                            <p x-show="!editing" @click="editing = true" class="text-sm text-blue-500 font-semibold hover:underline cursor-pointer">Set a unique domain for your store (e.g., toko-anda.com).</p>
                                            <form x-show="editing" action="{{ route('dashboard.store.update') }}" method="POST" class="flex items-center gap-2 mt-2">
                                                @csrf
                                                <input type="text" name="domain" x-model="domain" class="block w-[70%] h-9 pl-3 border-gray-300 rounded-md shadow-sm sm:text-sm" placeholder="toko-anda.com">
                                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg">Save</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/b/shopify-guidance-dashboard-public/729gxhu1tsumw5uf49g3xx697ar6.svgz" class="w-40 h-28">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Store Settings Section -->
                <div class="border-t border-border-primary">
                    <button onclick="toggleAccordion('store-settings')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 {{ $storeSettingsComplete ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center">
                                @if($storeSettingsComplete)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @else
                                    <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                @endif
                            </div>
                            <span class="text-text-primary font-semibold" data-translate-key="dashboard_store_settings">Store settings</span>
                        </div>
                        <svg id="store-settings-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="store-settings-content" class="accordion-content pb-4">
                        <div class="ml-9 space-y-4">
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ $hasStoreName ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if($hasStoreName)
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 mb-1">Add store name</h4>
                                    <p class="text-text-secondary text-sm mb-3">Add a touch of brilliance name to your store.</p>
                                    @if($hasStoreName && $store)
                                        <div class="flex items-center space-x-2">
                                            <span class="text-green-600 text-sm font-medium">✓ Completed</span>
                                            <span class="text-gray-600 text-sm">Store name: <strong>{{ $store->name }}</strong></span>
                                        </div>
                                    @else
                                        <div x-data="{ editing: false, name: '{{ $store->name ?? '' }}' }">
                                            <p x-show="!editing" @click="editing = true" class="text-sm text-blue-500 font-semibold hover:underline cursor-pointer">Set a name for your store.</p>
                                            <form x-show="editing" action="{{ route('dashboard.store.update') }}" method="POST" class="flex items-center gap-2 mt-2">
                                                @csrf
                                                <input type="hidden" name="store_id" value="{{ $store->id ?? '' }}">
                                                <input type="text" name="name" x-model="name" class="block w-[70%] h-9 pl-3 border-gray-300 rounded-md shadow-sm sm:text-sm" placeholder="e.g. Toko Kreatif Saya">
                                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg">Save</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/b/shopify-guidance-dashboard-public/jvgftp8f6tvy54wvytr03pi0974g.svgz" class="w-40 h-28">
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ $hasShippingZones ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if($hasShippingZones)
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_review_shipping">Review your shipping rates</h4>
                                    <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_review_shipping_desc">Configure shipping options and rates for your customers.</p>
                                    @if($hasShippingZones)
                                        <div class="flex items-center space-x-2">
                                            <span class="text-green-600 text-sm font-medium">✓ Completed</span>
                                            <span class="text-text-secondary text-sm">({{ $store->shippingZones()->count() }} zone{{ $store->shippingZones()->count() > 1 ? 's' : '' }} configured)</span>
                                        </div>
                                    @else
                                        <a href="{{ route('shipping-zones.index') }}" class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                            <span data-translate-key="dashboard_configure_shipping">Configure shipping</span>
                                        </a>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/b/shopify-guidance-dashboard-public/2l1xr6rqkjhw0ktznk0bxc33zgr7.svgz" class="w-36 h-28 mr-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Launch Store Section -->
                <div class="border-t border-border-primary">
                    <button onclick="toggleAccordion('launch-store')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 {{ (isset($onboardingStatus['has_unlocked_store']) && $onboardingStatus['has_unlocked_store']) ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center">
                                @if(isset($onboardingStatus['has_unlocked_store']) && $onboardingStatus['has_unlocked_store'])
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @else
                                    <span class="text-interactive-secondaryText text-xs font-semibold">3</span>
                                @endif
                            </div>
                            <span class="text-text-primary font-semibold" data-translate-key="dashboard_launch_store">Launch your online store</span>
                        </div>
                        <svg id="launch-store-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="launch-store-content" class="accordion-content pb-4">
                        <div class="ml-9 space-y-4">
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ (isset($onboardingStatus['has_placed_test_order']) && $onboardingStatus['has_placed_test_order']) ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if(isset($onboardingStatus['has_placed_test_order']) && $onboardingStatus['has_placed_test_order'])
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_place_test_order">Place a test order</h4>
                                    <p class="text-text-secondary text-sm mb-6" data-translate-key="dashboard_place_test_order_desc">Make sure things are running smoothly by placing a test order from your own store.</p>
                                    @if(isset($onboardingStatus['has_placed_test_order']) && $onboardingStatus['has_placed_test_order'])
                                        <div class="flex items-center space-x-2">
                                            <span class="text-green-600 text-sm font-medium">✓ Completed</span>
                                        </div>
                                    @else
                                        <button
                                            id="test-order-btn"
                                            class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors"
                                            data-store-url="{{ url('/store/' . ($store->domain ?? '')) . '?test=1' }}"
                                        >
                                            <span data-translate-key="dashboard_place_test_order_btn">Place test order</span>
                                        </button>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/b/shopify-guidance-dashboard-public/m66z0a57ues1gygrane8proz6gqn.svgz" class="w-36 h-28">
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 {{ (isset($onboardingStatus['has_unlocked_store']) && $onboardingStatus['has_unlocked_store']) ? 'bg-green-500' : 'bg-interactive-secondary' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    @if(isset($onboardingStatus['has_unlocked_store']) && $onboardingStatus['has_unlocked_store'])
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_unlock_store">Unlock your store</h4>
                                    <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_unlock_store_desc">Remove the password protection and make your store live.</p>
                                    @if(isset($onboardingStatus['has_unlocked_store']) && $onboardingStatus['has_unlocked_store'])
                                        <div class="flex items-center space-x-2">
                                            <span class="text-green-600 text-sm font-medium">✓ Completed</span>
                                        </div>
                                    @else
                                        <form action="{{ route('dashboard.store.unlock') }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                <span data-translate-key="dashboard_unlock_store_btn">Unlock store</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="https://cdn.shopify.com/shopifycloud/shopify/assets/admin/home/onboarding/detail-images/launch-store-task-a76f144875f76dfce52a49830e86865767433564f080749237058964763c6c27.svg" class="w-36 h-28">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Point of Sale Section -->
                <div class="border-t border-border-primary">
                    <button onclick="toggleAccordion('pos-setup')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-interactive-secondary rounded-full flex items-center justify-center">
                                <span class="text-interactive-secondaryText text-xs font-semibold">4</span>
                            </div>
                            <span class="text-text-primary font-semibold" data-translate-key="dashboard_pos_setup">Set up Point of Sale</span>
                        </div>
                        <svg id="pos-setup-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="pos-setup-content" class="accordion-content pb-4">
                        <div class="ml-9 space-y-4">
                            <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_configure_pos">Configure POS settings</h4>
                                    <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_configure_pos_desc">Set up your point of sale system for in-person sales.</p>
                                    <a href="{{ route('dashboard.pos') }}" class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                        <span data-translate-key="dashboard_setup_pos">Set up POS</span>
                                    </a>
                                </div>
                                <div class="flex-shrink-0">
                                    <img alt="" src="/images/hero_pos.png" class="w-36 h-24">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!$isNewUser || $setupCompleted)
    <!-- Stats Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-text-secondary text-sm" data-translate-key="dashboard_total_sales">Total Sales</p>
                    <p class="text-2xl font-bold text-text-primary">Rp 0</p>
                </div>
                <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-text-secondary text-sm" data-translate-key="dashboard_total_orders">Total Orders</p>
                    <p class="text-2xl font-bold text-text-primary">0</p>
                </div>
                <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-text-secondary text-sm" data-translate-key="dashboard_products">Products</p>
                    <p class="text-2xl font-bold text-text-primary">0</p>
                </div>
                <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-text-secondary text-sm" data-translate-key="dashboard_customers">Customers</p>
                    <p class="text-2xl font-bold text-text-primary">0</p>
                </div>
                <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-text-primary mb-4" data-translate-key="dashboard_quick_actions">Quick Actions</h3>
            <div class="space-y-3">
                <button class="w-full bg-interactive-primary text-interactive-primaryText py-2 px-4 rounded-lg text-sm font-semibold hover:bg-interactive-primary/90 transition-colors">
                    <span data-translate-key="dashboard_add_product">Add New Product</span>
                </button>
                <button class="w-full bg-interactive-secondary text-interactive-secondaryText py-2 px-4 rounded-lg text-sm font-semibold border border-border-primary hover:bg-interactive-secondary/80 transition-colors">
                    <span data-translate-key="dashboard_view_orders">View Orders</span>
                </button>
                <button class="w-full bg-interactive-secondary text-interactive-secondaryText py-2 px-4 rounded-lg text-sm font-semibold border border-border-primary hover:bg-interactive-secondary/80 transition-colors">
                    <span data-translate-key="dashboard_store_settings">Store Settings</span>
                </button>
            </div>
        </div>

        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-text-primary mb-4" data-translate-key="dashboard_recent_activity">Recent Activity</h3>
            <div class="space-y-3">
                <div class="text-sm text-text-secondary">
                    <p data-translate-key="dashboard_no_activity">No recent activity</p>
                </div>
            </div>
        </div>

        <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-text-primary mb-4" data-translate-key="dashboard_account_info">Account Info</h3>
            <div class="space-y-3 text-sm">
                <div>
                    <p class="text-text-secondary" data-translate-key="dashboard_name">Name</p>
                    <p class="text-text-primary font-semibold">{{ $user->name }}</p>
                </div>
                <div>
                    <p class="text-text-secondary" data-translate-key="dashboard_phone">Phone</p>
                    <p class="text-text-primary font-semibold">{{ $user->phone }}</p>
                </div>
                @if($user->email)
                <div>
                    <p class="text-text-secondary" data-translate-key="dashboard_email">Email</p>
                    <p class="text-text-primary font-semibold">{{ $user->email }}</p>
                </div>
                @endif
                <div>
                    <p class="text-text-secondary" data-translate-key="dashboard_member_since">Member Since</p>
                    <p class="text-text-primary font-semibold">{{ $user->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

<script>
    function logout() {
        if (confirm('Are you sure you want to logout?')) {
            fetch('/auth/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.href = '/';
            });
        }
    }
    function switchLanguage() {
        alert('Language switcher not implemented yet.');
    }
    function switchMode() {
        // Simple toggle for demonstration
        document.body.classList.toggle('bg-background-main');
        document.body.classList.toggle('bg-primary-dark');
        document.body.classList.toggle('text-white');
        document.body.classList.toggle('text-text-primary');
    }
    // Accordion: Only one open at a time
    function toggleAccordion(sectionId) {
        const allContents = document.querySelectorAll('.accordion-content');
        const allIcons = document.querySelectorAll('.accordion-icon');
        allContents.forEach((el) => {
            if (el.id === sectionId + '-content') {
                el.classList.toggle('open');
            } else {
                el.classList.remove('open');
            }
        });
        allIcons.forEach((icon) => {
            if (icon.id === sectionId + '-icon') {
                icon.classList.toggle('rotated');
            } else {
                icon.classList.remove('rotated');
            }
        });
    }
    function skipSetup() {
        if (confirm('Are you sure you want to skip the setup guide? You can always access it later from the settings.')) {
            window.location.reload();
        }
    }
    // Language switching functionality
    const translations = {
        id: {
            // Dashboard translations
            dashboard_welcome: 'Selamat Datang',
            dashboard_manage_store: 'Kelola toko Praxis e-commerce Anda dan pantau kinerja bisnis.',
            dashboard_total_sales: 'Total Penjualan',
            dashboard_total_orders: 'Total Pesanan',
            dashboard_products: 'Produk',
            dashboard_customers: 'Pelanggan',
            dashboard_quick_actions: 'Aksi Cepat',
            dashboard_add_product: 'Tambah Produk Baru',
            dashboard_view_orders: 'Lihat Pesanan',
            dashboard_store_settings: 'Pengaturan Toko',
            dashboard_recent_activity: 'Aktivitas Terbaru',
            dashboard_no_activity: 'Tidak ada aktivitas terbaru',
            dashboard_account_info: 'Info Akun',
            dashboard_name: 'Nama',
            dashboard_phone: 'Telepon',
            dashboard_email: 'Email',
            dashboard_member_since: 'Anggota Sejak',
            dashboard_logout: 'Keluar',
            dashboard_language: 'Bahasa',
            dashboard_theme: 'Tema',
            dashboard_dark_mode: 'Mode Gelap',
            dashboard_setup_guide: 'Panduan Setup',
            dashboard_tasks_complete: '0 dari 9 tugas selesai',
            dashboard_complete_tasks: 'Selesaikan tugas-tugas penting ini untuk menjalankan toko Anda.',
            dashboard_skip_setup: 'Lewati setup',
            dashboard_sell_online: 'Jual Online',
            dashboard_add_first_product: 'Tambah produk pertama Anda',
            dashboard_add_first_product_desc: 'Tulis deskripsi, tambahkan foto, dan atur harga untuk produk yang akan Anda jual.',
            dashboard_add_product_btn: 'Tambah produk',
            dashboard_learn_more: 'Pelajari lebih lanjut',
            dashboard_design_store: 'Desain toko Anda',
            dashboard_design_store_desc: 'Sesuaikan tampilan dan tata letak toko Anda.',
            dashboard_customize_theme: 'Sesuaikan tema',
            dashboard_customize_domain: 'Sesuaikan domain Anda',
            dashboard_customize_domain_desc: 'Atur domain kustom untuk toko online Anda.',
            dashboard_setup_domain: 'Atur domain',
            dashboard_store_settings_title: 'Pengaturan Toko',
            dashboard_add_store_name: 'Tambah nama toko',
            dashboard_add_store_name_desc: 'Your temporary store name is currently "My Store". The store name appears in your admin and your online store.',
            dashboard_update_store_name: 'Perbarui nama toko',
            dashboard_review_shipping: 'Tinjau tarif pengiriman Anda',
            dashboard_review_shipping_desc: 'Konfigurasikan opsi dan tarif pengiriman untuk pelanggan Anda.',
            dashboard_configure_shipping: 'Konfigurasi pengiriman',
            dashboard_launch_store: 'Luncurkan toko online Anda',
            dashboard_place_test_order: 'Buat pesanan uji',
            dashboard_place_test_order_desc: 'Pastikan semuanya berjalan lancar dengan membuat pesanan uji dari toko Anda sendiri.',
            dashboard_place_test_order_btn: 'Buat pesanan uji',
            dashboard_unlock_store: 'Buka kunci toko Anda',
            dashboard_unlock_store_desc: 'Hapus perlindungan kata sandi dan buat toko Anda live.',
            dashboard_unlock_store_btn: 'Buka kunci toko',
            dashboard_pos_setup: 'Atur Point of Sale',
            dashboard_configure_pos: 'Konfigurasi pengaturan POS',
            dashboard_configure_pos_desc: 'Atur sistem point of sale Anda untuk penjualan langsung.',
            dashboard_setup_pos: 'Atur POS',
             // Sidebar
            sidebar_home: 'Beranda',
            sidebar_orders: 'Pesanan',
            sidebar_products: 'Produk',
            sidebar_customers: 'Pelanggan',
            sidebar_marketing: 'Pemasaran',
            sidebar_discounts: 'Diskon',
            sidebar_content: 'Konten',
            sidebar_markets: 'Pasar',
            sidebar_analytics: 'Analitik',
            sidebar_sales_channels: 'Saluran Penjualan',
            sidebar_online_store: 'Toko Online',
            sidebar_pos: 'Point of Sale',
            // Topnav
            topnav_profile: 'Profil',
            topnav_setting: 'Pengaturan',
            topnav_logout: 'Keluar',
            topnav_language: 'Bahasa',
            topnav_theme: 'Tema',
            topnav_dark_mode: 'Mode Gelap',
            // Greeting
            greeting_morning: 'Selamat Pagi',
            greeting_afternoon: 'Selamat Siang',
            greeting_evening: 'Selamat Sore',
            greeting_night: 'Selamat Malam',
        },
        en: {
            // Dashboard translations
            dashboard_welcome: 'Welcome',
            dashboard_manage_store: 'Manage your Praxis e-commerce store and track your business performance.',
            dashboard_total_sales: 'Total Sales',
            dashboard_total_orders: 'Total Orders',
            dashboard_products: 'Products',
            dashboard_customers: 'Customers',
            dashboard_quick_actions: 'Quick Actions',
            dashboard_add_product: 'Add New Product',
            dashboard_view_orders: 'View Orders',
            dashboard_store_settings: 'Store Settings',
            dashboard_recent_activity: 'Recent Activity',
            dashboard_no_activity: 'No recent activity',
            dashboard_account_info: 'Account Info',
            dashboard_name: 'Name',
            dashboard_phone: 'Phone',
            dashboard_email: 'Email',
            dashboard_member_since: 'Member Since',
            dashboard_logout: 'Logout',
            dashboard_language: 'Language',
            dashboard_theme: 'Theme',
            dashboard_dark_mode: 'Dark Mode',
            dashboard_setup_guide: 'Setup Guide',
            dashboard_tasks_complete: '0 of 9 tasks complete',
            dashboard_complete_tasks: 'Complete these essential tasks to get your store up and running.',
            dashboard_skip_setup: 'Skip setup',
            dashboard_sell_online: 'Sell Online',
            dashboard_add_first_product: 'Add your first product',
            dashboard_add_first_product_desc: 'Write a description, add photos, and set pricing for the products you plan to sell.',
            dashboard_add_product_btn: 'Add product',
            dashboard_learn_more: 'Learn more',
            dashboard_design_store: 'Design your store',
            dashboard_design_store_desc: 'Customize your store\'s appearance and layout.',
            dashboard_customize_theme: 'Customize theme',
            dashboard_customize_domain: 'Customize your domain',
            dashboard_customize_domain_desc: 'Set up a custom domain for your online store.',
            dashboard_setup_domain: 'Set up domain',
            dashboard_store_settings_title: 'Store Settings',
            dashboard_add_store_name: 'Add store name',
            dashboard_add_store_name_desc: 'Your temporary store name is currently "My Store". The store name appears in your admin and your online store.',
            dashboard_update_store_name: 'Update store name',
            dashboard_review_shipping: 'Review your shipping rates',
            dashboard_review_shipping_desc: 'Configure shipping options and rates for your customers.',
            dashboard_configure_shipping: 'Configure shipping',
            dashboard_launch_store: 'Launch your online store',
            dashboard_place_test_order: 'Place a test order',
            dashboard_place_test_order_desc: 'Make sure things are running smoothly by placing a test order from your own store.',
            dashboard_place_test_order_btn: 'Place test order',
            dashboard_unlock_store: 'Unlock your store',
            dashboard_unlock_store_desc: 'Remove the password protection and make your store live.',
            dashboard_unlock_store_btn: 'Unlock store',
            dashboard_pos_setup: 'Set up Point of Sale',
            dashboard_configure_pos: 'Configure POS settings',
            dashboard_configure_pos_desc: 'Set up your point of sale system for in-person sales.',
            dashboard_setup_pos: 'Set up POS',
            // Sidebar
            sidebar_home: 'Home',
            sidebar_orders: 'Orders',
            sidebar_products: 'Products',
            sidebar_customers: 'Customers',
            sidebar_marketing: 'Marketing',
            sidebar_discounts: 'Discounts',
            sidebar_content: 'Content',
            sidebar_markets: 'Markets',
            sidebar_analytics: 'Analytics',
            sidebar_sales_channels: 'Sales channels',
            sidebar_online_store: 'Online Store',
            sidebar_pos: 'Point of Sale',
            // Topnav
            topnav_profile: 'Profile',
            topnav_setting: 'Setting',
            topnav_logout: 'Logout',
            topnav_language: 'Language',
            topnav_theme: 'Theme',
            topnav_dark_mode: 'Dark Mode',
            // Greeting
            greeting_morning: 'Good Morning',
            greeting_afternoon: 'Good Afternoon',
            greeting_evening: 'Good Evening',
            greeting_night: 'Good Night',
        }
    };

    let currentLanguage = localStorage.getItem('language') || 'id';
    let isDarkMode = localStorage.getItem('darkMode') === 'true';

    function setLanguage(lang) {
        currentLanguage = lang;
        localStorage.setItem('language', lang);
        
        // Update language button styles
        const langIdButton = document.getElementById('lang-id');
        const langEnButton = document.getElementById('lang-en');
        
        if (lang === 'id') {
            langIdButton.classList.remove('bg-interactive-secondary', 'text-interactive-secondaryText');
            langIdButton.classList.add('gradient-bg', 'text-white');
            langEnButton.classList.remove('gradient-bg', 'text-white');
            langEnButton.classList.add('bg-interactive-secondary', 'text-interactive-secondaryText');
        } else {
            langEnButton.classList.remove('bg-interactive-secondary', 'text-interactive-secondaryText');
            langEnButton.classList.add('gradient-bg', 'text-white');
            langIdButton.classList.remove('gradient-bg', 'text-white');
            langIdButton.classList.add('bg-interactive-secondary', 'text-interactive-secondaryText');
        }
        
        // Apply translations
        applyTranslations();
    }

    function applyTranslations() {
        // Apply translations to elements with data-translate-key
        document.querySelectorAll('[data-translate-key]').forEach(element => {
            const key = element.getAttribute('data-translate-key');
            const translation = translations[currentLanguage][key];
            
            if (translation !== undefined) {
                if (element.tagName === 'INPUT' && key.includes('placeholder')) {
                    element.placeholder = translation;
                } else {
                    element.innerHTML = translation;
                }
            }
        });
    }

    function toggleDarkMode() {
        isDarkMode = !isDarkMode;
        localStorage.setItem('darkMode', isDarkMode);
        
        const toggle = document.getElementById('theme-toggle');
        const slider = document.getElementById('theme-toggle-slider');
        
        if (isDarkMode) {
            // Switch to dark mode
            document.body.classList.add('dark-mode');
            toggle.classList.remove('bg-interactive-secondary');
            toggle.classList.add('bg-accent-primary');
            slider.classList.remove('translate-x-1');
            slider.classList.add('translate-x-6');
        } else {
            // Switch to light mode
            document.body.classList.remove('dark-mode');
            toggle.classList.remove('bg-accent-primary');
            toggle.classList.add('bg-interactive-secondary');
            slider.classList.remove('translate-x-6');
            slider.classList.add('translate-x-1');
        }
    }

    // Initialize theme and language on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Set initial language
        setLanguage(currentLanguage);
        
        // Set initial theme based on saved preference
        const savedDarkMode = localStorage.getItem('darkMode') === 'true';
        if (savedDarkMode) {
            isDarkMode = true;
            document.body.classList.add('dark-mode');
            
            // Update toggle state
            const toggle = document.getElementById('theme-toggle');
            const slider = document.getElementById('theme-toggle-slider');
            if (toggle && slider) {
                toggle.classList.remove('bg-interactive-secondary');
                toggle.classList.add('bg-accent-primary');
                slider.classList.remove('translate-x-1');
                slider.classList.add('translate-x-6');
            }
        }
        
        // Auto-expand first accordion section
        const firstAccordion = document.querySelector('.accordion-content');
        const firstIcon = document.querySelector('.accordion-icon');
        if (firstAccordion && firstIcon) {
            firstAccordion.classList.add('open');
            firstIcon.classList.add('rotated');
        }

        const btn = document.getElementById('test-order-btn');
        if (btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                fetch("{{ route('dashboard.onboarding.test-order') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        window.open(btn.getAttribute('data-store-url'), '_blank');
                        location.reload();
                    }
                });
            });
        }
    });
</script> 