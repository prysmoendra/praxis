<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store_name ?? 'Store' }} - Horizon Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Custom animations */
        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .animate-slide-in-up {
            animation: slideInUp 0.8s ease-out;
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
        
        .animate-pulse-slow {
            animation: pulse 3s ease-in-out infinite;
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Glass morphism */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-3xl font-bold gradient-text">{{ $store_name ?? 'STORE' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-900 hover:text-gray-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#" class="text-gray-900 hover:text-gray-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        Shop
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#" class="text-gray-900 hover:text-gray-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </nav>
                
                <!-- Cart Icon -->
                <div class="flex items-center">
                    <button class="p-3 text-gray-900 hover:text-gray-600 transition-all duration-300 hover:scale-110 relative group">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.2998 5H22L20 12H8.37675M21 16H9L7 3H4M4 8H2M5 11H2M6 14H2M10 20C10 20.5523 9.55228 21 9 21C8.44772 21 8 20.5523 8 20C8 19.4477 8.44772 19 9 19C9.55228 19 10 19.4477 10 20ZM21 20C21 20.5523 20.5523 21 20 21C19.4477 21 19 20.5523 19 20C19 19.4477 19.4477 19 20 19C20.5523 19 21 19.4477 21 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-gray-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden">
        <!-- Hero Banner Image -->
        <img src="https://via.placeholder.com/1920x1080" alt="Hero Banner" class="w-full h-full object-cover">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/20"></div>
        
        <!-- Hero Content -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4 animate-slide-in-up">
                <h2 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight leading-tight">
                    Discover Your 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">Style</span>
                </h2>
                <p class="text-xl md:text-2xl mb-10 opacity-90 max-w-2xl mx-auto leading-relaxed">
                    Premium fashion for the modern lifestyle. Curated collections that define your unique personality.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-gray-900 px-10 py-4 text-lg font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Shop Now
                    </button>
                    <button class="border-2 border-white text-white px-10 py-4 text-lg font-semibold rounded-xl hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105">
                        Explore Collection
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white rounded-full mt-2"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Premium Quality</h3>
                    <p class="text-gray-600">Handpicked items from the finest materials and craftsmanship.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Fast Delivery</h3>
                    <p class="text-gray-600">Quick and reliable shipping to your doorstep worldwide.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Customer Love</h3>
                    <p class="text-gray-600">Dedicated support and satisfaction guaranteed.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-6">Featured Products</h3>
                <div class="w-24 h-1 bg-gray-900 mx-auto rounded-full"></div>
                <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">Curated collection for the discerning shopper. Each piece tells a story of elegance and sophistication.</p>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if($products->count() > 0)
                    @foreach($products as $product)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <img src="https://via.placeholder.com/400x500" alt="{{ $product->title }}" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            
                            <!-- Quick View Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-full font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                    Quick View
                                </button>
                            </div>
                            
                            <!-- Wishlist Button -->
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3 group-hover:text-gray-600 transition-colors">{{ $product->title }}</h4>
                            <p class="text-2xl font-bold text-gray-900 mb-4">
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
                                    <button type="submit" class="w-full bg-gray-900 text-white py-3 px-6 rounded-xl hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <button class="w-full bg-gray-300 text-gray-500 py-3 px-6 rounded-xl cursor-not-allowed mt-4 font-semibold">
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-xl font-medium">No products available yet.</p>
                        <p class="text-gray-400 mt-2">Check back soon for amazing products!</p>
                    </div>
                @endif
            </div>
            
            <!-- View All Button -->
            <div class="text-center mt-12">
                <button class="bg-gray-900 text-white px-10 py-4 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    View All Products
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-3xl font-bold mb-6">Stay Updated</h3>
            <p class="text-gray-300 mb-10 text-lg">Get the latest updates on new arrivals and exclusive offers</p>
            
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Enter your email address" 
                       class="flex-1 px-6 py-4 border-2 border-gray-700 rounded-xl focus:ring-4 focus:ring-white/20 focus:border-white focus:outline-none bg-gray-800 text-white placeholder-gray-400">
                <button class="bg-white text-gray-900 px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-3xl font-bold mb-6 gradient-text">{{ $store_name ?? 'STORE' }}</h3>
                    <p class="text-gray-400 mb-6 text-lg leading-relaxed">{{ $store_description ?? 'Premium fashion and lifestyle products for the modern individual. We believe in quality, style, and sustainability.' }}</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Shop Links -->
                <div>
                    <h4 class="text-xl font-semibold mb-6">Shop</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Best Sellers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Collections</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Sale</a></li>
                    </ul>
                </div>
                
                <!-- Info Links -->
                <div>
                    <h4 class="text-xl font-semibold mb-6">Info</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Shipping</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Returns</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2024 {{ $store_name ?? 'Store' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 