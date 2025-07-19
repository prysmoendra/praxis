<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praxis Store - Horizon Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $store_name ?? 'PRAXIS' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors">Shop</a>
                    <a href="#" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors">About</a>
                </nav>
                
                <!-- Cart Icon -->
                <div class="flex items-center">
                    <button class="p-2 text-gray-900 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative h-96 md:h-[600px] overflow-hidden">
        <!-- Hero Banner Image -->
        <!-- TODO: Replace with your hero banner image -->
        <img src="https://via.placeholder.com/1920x600" alt="Hero Banner" class="w-full h-full object-cover">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        
        <!-- Hero Content -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 tracking-tight">Discover Your Style</h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">Premium fashion for the modern lifestyle</p>
                <button class="bg-white text-gray-900 px-8 py-3 text-lg font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    Shop Now
                </button>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Featured Products</h3>
                <p class="text-gray-600 text-lg">Curated collection for the discerning shopper</p>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if($products->count() > 0)
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden group">
                            @if($product->images->count() > 0)
                                <!-- TODO: Replace with your product image -->
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <img src="https://via.placeholder.com/400x500" alt="{{ $product->title }}" class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->title }}</h4>
                            <p class="text-xl font-bold text-gray-900">
                                @if($product->variants->count() > 0)
                                    Rp {{ number_format($product->variants->first()->price, 0, ',', '.') }}
                                @else
                                    Rp 0
                                @endif
                            </p>
                            
                            @if($product->variants->count() > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="variant_id" value="{{ $product->variants->first()->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-gray-900 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <button class="w-full bg-gray-300 text-gray-500 py-2 px-4 rounded-lg cursor-not-allowed mt-4">
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No products available yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4">{{ $store_name ?? 'PRAXIS' }}</h3>
                    <p class="text-gray-400 mb-4">{{ $store_description ?? 'Premium fashion and lifestyle products for the modern individual.' }}</p>
                </div>
                
                <!-- Shop Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Shop</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Best Sellers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Collections</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Sale</a></li>
                    </ul>
                </div>
                
                <!-- Info Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Shipping</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Praxis Store. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 