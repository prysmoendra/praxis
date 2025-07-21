<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store_name ?? 'Bookstore' }} - Craft Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        
        /* Custom animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #059669, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="bg-white font-sans">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-3xl font-serif font-bold gradient-text">{{ $store_name ?? 'Z' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Home</a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Pages</a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Shop</a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Blog</a>
                </nav>
                
                <!-- Cart Icon -->
                <div class="flex items-center">
                    <button class="p-3 text-gray-900 hover:text-green-600 transition-all duration-300 hover:scale-110 relative group">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.2998 5H22L20 12H8.37675M21 16H9L7 3H4M4 8H2M5 11H2M6 14H2M10 20C10 20.5523 9.55228 21 9 21C8.44772 21 8 20.5523 8 20C8 19.4477 8.44772 19 9 19C9.55228 19 10 19.4477 10 20ZM21 20C21 20.5523 20.5523 21 20 21C19.4477 21 19 20.5523 19 20C19 19.4477 19.4477 19 20 19C20.5523 19 21 19.4477 21 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-green-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-green-50 via-white to-emerald-50 overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-32 h-32 bg-green-200 rounded-full opacity-20 animate-float"></div>
            <div class="absolute bottom-20 right-10 w-24 h-24 bg-emerald-300 rounded-full opacity-30 animate-float" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left animate-fade-in-up">
                    <h2 class="text-5xl md:text-7xl font-serif font-bold text-gray-900 mb-8 leading-tight">
                        Buy and sell your 
                        <span class="gradient-text">textbooks</span> 
                        for the best price
                    </h2>
                    <p class="text-xl text-gray-600 mb-10 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                        Find the perfect textbooks for your studies or sell your old ones to fellow students. Quality guaranteed.
                    </p>
                    
                    <!-- Search Bar -->
                    <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto lg:mx-0">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Search for ISBN number" 
                                   class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-green-500/20 focus:border-green-500 focus:outline-none transition-all duration-300 text-lg">
                            <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Search
                        </button>
                    </div>
                </div>
                
                <!-- Right Content - Featured Book -->
                <div class="relative animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="relative z-10 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="https://via.placeholder.com/400x600/4F46E5/FFFFFF?text=Gone+Dead" 
                             alt="Gone Dead by C.R Bernard" 
                             class="w-full max-w-sm mx-auto shadow-2xl rounded-2xl">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full opacity-30 animate-float"></div>
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-yellow-400 rounded-full opacity-20 animate-float" style="animation-delay: 2s;"></div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="text-center mt-16">
                <div class="w-6 h-12 border-2 border-gray-400 rounded-full mx-auto flex justify-center animate-bounce">
                    <div class="w-1 h-4 bg-gray-400 rounded-full mt-2"></div>
                </div>
                <p class="text-gray-500 mt-4 text-sm">Scroll to explore</p>
            </div>
        </div>
    </section>

    <!-- Best Seller Books Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-serif font-bold text-gray-900 mb-6">Best Seller Books</h3>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if($products->count() > 0)
                    @foreach($products->take(4) as $product)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" 
                                     class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <img src="https://via.placeholder.com/400x500/6B7280/FFFFFF?text={{ urlencode($product->title) }}" 
                                     alt="{{ $product->title }}" 
                                     class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            
                            <!-- Discount Badge -->
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                {{ rand(5, 15) }}% Off
                            </div>
                            
                            <!-- Quick View Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-full font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                    Quick View
                                </button>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">{{ $product->title }}</h4>
                            <p class="text-2xl font-bold gradient-text mb-4">
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
                                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-xl font-medium">No products available yet.</p>
                        <p class="text-gray-400 mt-2">Check back soon for amazing books!</p>
                    </div>
                @endif
            </div>
            
            <!-- Pagination Indicator -->
            <div class="flex justify-center mt-12">
                <div class="flex space-x-3">
                    <div class="w-3 h-3 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                    <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-serif font-bold text-gray-900 mb-6">What Our Customers Say</h3>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 text-lg leading-relaxed">"Amazing service! I found all the textbooks I needed for my semester at great prices. The quality was excellent and shipping was fast."</p>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/60x60/6B7280/FFFFFF?text=CW" alt="Cameron Williamson" class="w-14 h-14 rounded-full mr-4 ring-4 ring-green-100">
                        <div>
                            <h4 class="font-semibold text-gray-900 text-lg">Cameron Williamson</h4>
                            <p class="text-gray-500">Web Designer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 text-lg leading-relaxed">"I sold my old textbooks and made back most of what I paid for them. The platform is so easy to use and the community is great!"</p>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/60x60/6B7280/FFFFFF?text=JC" alt="Jane Cooper" class="w-14 h-14 rounded-full mr-4 ring-4 ring-green-100">
                        <div>
                            <h4 class="font-semibold text-gray-900 text-lg">Jane Cooper</h4>
                            <p class="text-gray-500">Marketing Coordinator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-green-600 to-emerald-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Image -->
                <div class="relative">
                    <img src="https://via.placeholder.com/600x400/6B7280/FFFFFF?text=Student+Reading" 
                         alt="Student reading" 
                         class="w-full rounded-2xl shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-500">
                </div>
                
                <!-- Right Content -->
                <div class="text-center lg:text-left">
                    <h3 class="text-4xl font-serif font-bold mb-8">We Provide You The Experience</h3>
                    <p class="text-xl mb-10 opacity-90 leading-relaxed">
                        Browse the collection of our best selling and top interesting products. 
                        Discover books that will inspire and educate.
                    </p>
                    <button class="bg-white text-green-600 px-10 py-4 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg inline-flex items-center text-lg">
                        See our products
                        <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Help -->
                <div>
                    <h4 class="text-xl font-semibold mb-6">Help</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Legal Notice</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Secure Payment -->
                <div>
                    <h4 class="text-xl font-semibold mb-6">Secure Payment</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Payment Methods</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Security</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Social Networks -->
                <div>
                    <h4 class="text-xl font-semibold mb-6">Social Networks</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Pinterest</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Facebook</a></li>
                        <li><a href="#" class="hover:text-white transition-colors duration-300 hover:translate-x-2 transform inline-block">Instagram</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2024 {{ $store_name ?? 'Bookstore' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 