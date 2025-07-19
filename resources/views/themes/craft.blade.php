<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praxis Store - Craft Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .craft-font { font-family: 'Quicksand', sans-serif; }
        .script-font { font-family: 'Dancing Script', cursive; }
    </style>
</head>
<body class="bg-white craft-font">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-amber-100 py-4">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="script-font text-3xl font-semibold text-amber-800">{{ $store_name ?? 'Praxis' }}</h1>
                    <p class="text-xs text-amber-600 -mt-1">Handcrafted with Love</p>
                </div>
                
                <!-- Navigation -->
                <nav class="flex space-x-6">
                    <a href="#" class="text-amber-800 hover:text-amber-600 text-sm font-medium transition-colors">Shop</a>
                    <a href="#" class="text-amber-800 hover:text-amber-600 text-sm font-medium transition-colors">About</a>
                    <a href="#" class="text-amber-800 hover:text-amber-600 text-sm font-medium transition-colors">Contact</a>
                    <button class="text-amber-800 hover:text-amber-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="py-16 bg-gradient-to-br from-amber-50 to-orange-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- About Image -->
                <div class="text-center lg:text-left">
                    <!-- TODO: Replace with your artisan/craftsman image -->
                    <img src="https://via.placeholder.com/500x600" alt="Our Artisan" class="w-full max-w-md mx-auto lg:mx-0 rounded-lg shadow-lg">
                </div>
                
                <!-- About Content -->
                <div>
                    <h2 class="script-font text-4xl lg:text-5xl font-semibold text-amber-800 mb-6">
                        Made with Heart
                    </h2>
                    <p class="text-lg text-amber-700 mb-6 leading-relaxed">
                        Every piece in our collection is lovingly crafted by skilled artisans who pour their passion 
                        and expertise into creating unique, high-quality products. We believe in the beauty of 
                        handmade items and the stories they tell.
                    </p>
                    <p class="text-amber-700 mb-8 leading-relaxed">
                        From our workshop to your home, each creation carries the warmth and authenticity that only 
                        handcrafted items can provide.
                    </p>
                    <button class="bg-amber-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-amber-700 transition-colors shadow-md">
                        Meet Our Artisans
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="script-font text-3xl font-semibold text-amber-800 mb-4">Featured Creations</h3>
                <p class="text-amber-700 text-lg">Discover our most beloved handcrafted pieces</p>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if($products->count() > 0)
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-amber-100">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            @if($product->images->count() > 0)
                                <!-- TODO: Replace with your product image -->
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" class="w-full h-80 object-cover">
                            @else
                                <img src="https://via.placeholder.com/400x500" alt="{{ $product->title }}" class="w-full h-80 object-cover">
                            @endif
                            <div class="absolute top-4 right-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                                Handmade
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h4 class="text-lg font-semibold text-amber-800 mb-2">{{ $product->title }}</h4>
                            <p class="text-amber-600 text-sm mb-3">{{ Str::limit($product->description, 50) }}</p>
                            <div class="flex items-center justify-between">
                                <p class="text-xl font-bold text-amber-800">
                                    @if($product->variants->count() > 0)
                                        Rp {{ number_format($product->variants->first()->price, 0, ',', '.') }}
                                    @else
                                        Rp 0
                                    @endif
                                </p>
                                
                                @if($product->variants->count() > 0)
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="variant_id" value="{{ $product->variants->first()->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-amber-700 transition-colors">
                                            Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <button class="bg-amber-300 text-amber-600 px-4 py-2 rounded-lg font-medium cursor-not-allowed">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-12">
                        <p class="text-amber-600 text-lg">No products available yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Value Proposition Section -->
    <section class="py-16 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="script-font text-3xl font-semibold text-amber-800 mb-4">Why Choose Handcrafted?</h3>
                <p class="text-amber-700 text-lg">The unique benefits of our artisan-made products</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Handmade -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-amber-800 mb-2">Buatan Tangan</h4>
                    <p class="text-amber-700">Setiap produk dibuat dengan tangan oleh pengrajin berpengalaman</p>
                </div>
                
                <!-- Local Materials -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-amber-800 mb-2">Bahan Lokal</h4>
                    <p class="text-amber-700">Menggunakan bahan berkualitas dari sumber lokal terpercaya</p>
                </div>
                
                <!-- Quality Guaranteed -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-amber-800 mb-2">Kualitas Terjamin</h4>
                    <p class="text-amber-700">Setiap produk melalui kontrol kualitas yang ketat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-amber-800 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h4 class="script-font text-2xl font-semibold mb-4">{{ $store_name ?? 'Praxis' }}</h4>
                    <p class="text-amber-200 mb-4">{{ $store_description ?? 'Handcrafted with love and care. Every piece tells a story.' }}</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-amber-200 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-amber-200 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-amber-200 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h5 class="font-semibold mb-4">Quick Links</h5>
                    <ul class="space-y-2 text-amber-200">
                        <li><a href="#" class="hover:text-white transition-colors">Shop All</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Best Sellers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Sale</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div>
                    <h5 class="font-semibold mb-4">Support</h5>
                    <ul class="space-y-2 text-amber-200">
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-amber-700 mt-8 pt-8 text-center">
                <p class="text-amber-200">&copy; 2024 Praxis Store. Handcrafted with love.</p>
            </div>
        </div>
    </footer>
</body>
</html> 