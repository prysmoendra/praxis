@extends('layouts.app')

@section('title', 'Themes - Online Store')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text-primary mb-2">Online Store</h1>
        <p class="text-text-secondary">Customize your store's appearance and layout</p>
    </div>

    <!-- Current Theme Section -->
    <div class="bg-white rounded-xl shadow-sm border border-border-primary p-6 mb-8">
        <h2 class="text-xl font-semibold text-text-primary mb-4">Current theme</h2>
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-text-secondary text-sm">No theme installed</p>
                    <p class="text-text-primary font-medium">Install a theme to get started</p>
                </div>
            </div>
            <button class="bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                Install default theme
            </button>
        </div>
    </div>

    <!-- Theme Library -->
    <div class="bg-white rounded-xl shadow-sm border border-border-primary p-6">
        <h2 class="text-xl font-semibold text-text-primary mb-6">Theme Library</h2>
        
        <!-- Popular Free Themes -->
        <div class="mb-8">
            <h3 class="text-lg font-medium text-text-primary mb-4">Popular free themes</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Horizon Theme -->
                <div class="border border-border-primary rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h4 class="text-lg font-semibold mb-2">Horizon</h4>
                            <p class="text-sm opacity-90">Modern & Clean</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-text-primary mb-2">Horizon</h4>
                        <p class="text-text-secondary text-sm mb-3">A modern, clean theme perfect for fashion and lifestyle stores.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 text-sm font-medium">Free</span>
                            <form action="{{ route('themes.apply', 'horizon') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-interactive-primary text-interactive-primaryText px-3 py-1 rounded text-sm font-medium transition-colors">
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sense Theme -->
                <div class="border border-border-primary rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-teal-500 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h4 class="text-lg font-semibold mb-2">Sense</h4>
                            <p class="text-sm opacity-90">Minimalist</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-text-primary mb-2">Sense</h4>
                        <p class="text-text-secondary text-sm mb-3">A minimalist theme focused on content and user experience.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 text-sm font-medium">Free</span>
                            <form action="{{ route('themes.apply', 'sense') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-interactive-primary text-interactive-primaryText px-3 py-1 rounded text-sm font-medium transition-colors">
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Craft Theme -->
                <div class="border border-border-primary rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h4 class="text-lg font-semibold mb-2">Craft</h4>
                            <p class="text-sm opacity-90">Artisan</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-text-primary mb-2">Craft</h4>
                        <p class="text-text-secondary text-sm mb-3">An artisan theme perfect for handmade and craft products.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 text-sm font-medium">Free</span>
                            <form action="{{ route('themes.apply', 'craft') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-interactive-primary text-interactive-primaryText px-3 py-1 rounded text-sm font-medium transition-colors">
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium Themes -->
        <div>
            <h3 class="text-lg font-medium text-text-primary mb-4">Premium themes</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Premium Theme 1 -->
                <div class="border border-border-primary rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h4 class="text-lg font-semibold mb-2">Luxe</h4>
                            <p class="text-sm opacity-90">Premium</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-text-primary mb-2">Luxe</h4>
                        <p class="text-text-secondary text-sm mb-3">A premium theme for luxury and high-end products.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-blue-600 text-sm font-medium">$180</span>
                            <button class="bg-interactive-secondary text-interactive-secondaryText px-3 py-1 rounded text-sm font-medium transition-colors">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Premium Theme 2 -->
                <div class="border border-border-primary rounded-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-blue-500 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h4 class="text-lg font-semibold mb-2">Nova</h4>
                            <p class="text-sm opacity-90">Premium</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-text-primary mb-2">Nova</h4>
                        <p class="text-text-secondary text-sm mb-3">A cutting-edge theme with advanced customization options.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-blue-600 text-sm font-medium">$200</span>
                            <button class="bg-interactive-secondary text-interactive-secondaryText px-3 py-1 rounded text-sm font-medium transition-colors">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 