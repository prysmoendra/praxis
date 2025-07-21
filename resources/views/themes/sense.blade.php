<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store_name ?? 'Bookstore' }} - Sense Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        
        /* Custom animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-100px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
        
        .animate-slide-in-left {
            animation: slideInLeft 1s ease-out;
        }
        
        .animate-slide-in-right {
            animation: slideInRight 1s ease-out;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 4s ease-in-out infinite;
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #059669, #10b981, #34d399);
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
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        Shop
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-4 py-2 text-sm font-medium transition-all duration-300 hover:scale-105 relative group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
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

    <!-- Top Section - Featured Books & Navigation -->
    <section class="py-20 bg-gradient-to-br from-green-50 via-white to-emerald-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <!-- Left Content - Statistics & CTA -->
                <div class="lg:col-span-1 animate-slide-in-left">
                    <div class="space-y-10">
                        <!-- Statistics -->
                        <div class="space-y-6">
                            <div class="text-center lg:text-left">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">50 Books</h2>
                                <p class="text-green-600 font-semibold">Best Seller</p>
                            </div>
                            <div class="text-center lg:text-left">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">35 Books</h2>
                                <p class="text-green-600 font-semibold">For Coming</p>
                            </div>
                            <div class="text-center lg:text-left">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">150 Books</h2>
                                <p class="text-green-600 font-semibold">Total Products</p>
                            </div>
                        </div>
                        
                        <!-- Call to Action -->
                        <div class="text-center lg:text-left">
                            <button class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-flex items-center">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Featured Books -->
                <div class="lg:col-span-2 animate-slide-in-right">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Book 1 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group">
                            <div class="relative overflow-hidden">
                                <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=White+Elephant" 
                                    alt="White Elephant by Trish Harnetiaux" 
                                    class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                <!-- Red Bow Decoration -->
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-float">
                                    <div class="w-16 h-8 bg-red-500 rounded-full shadow-lg"></div>
                                </div>
                                
                                <!-- Quick View Overlay -->
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                    <button class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-full font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                        Quick View
                                    </button>
                                </div>
                            </div>
                            
                            <div class="p-6 text-center">
                                <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">White Elephant</h4>
                                <p class="text-sm text-gray-600 mb-2">Trish Harnetiaux</p>
                                <p class="text-xl font-bold gradient-text mb-4">Rp 85.000</p>
                                
                                <form action="{{ route('cart.add', 1) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="variant_id" value="1">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Book 2 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group">
                            <div class="relative overflow-hidden">
                                <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=THE+OPEN+HEART+CLUB" 
                                    alt="THE OPEN HEART CLUB by Charles Bronstein" 
                                    class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                <!-- Quick View Overlay -->
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                    <button class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-full font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                        Quick View
                                    </button>
                                </div>
                            </div>
                            
                            <div class="p-6 text-center">
                                <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">THE OPEN HEART CLUB</h4>
                                <p class="text-sm text-gray-600 mb-2">Charles Bronstein</p>
                                <p class="text-xs text-gray-500 mb-2">A STORY ABOUT BIRTH & DEATH & CARDIAC SURGERY</p>
                                <p class="text-xl font-bold gradient-text mb-4">Rp 120.000</p>
                                
                                <form action="{{ route('cart.add', 2) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="variant_id" value="2">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Award Shortlist Section -->
    <section class="py-20 bg-gradient-to-r from-green-50 to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left animate-slide-in-left">
                    <h3 class="text-4xl font-serif font-bold text-gray-900 mb-8 leading-tight">2021 National Book Award for Fiction shortlist</h3>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">Discover the most acclaimed literary works of the year, carefully selected by our expert panel.</p>
                    <button class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-10 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Shop Now
                    </button>
                </div>
                
                <!-- Right Content - Open Book -->
                <div class="relative animate-slide-in-right">
                    <div class="relative z-10 transform rotate-3 hover:rotate-0 transition-transform duration-500 animate-float">
                        <img src="https://via.placeholder.com/500x400/F5F5F5/000000?text=Open+Book+with+Signature" 
                             alt="Open book with signature" 
                             class="w-full rounded-2xl shadow-2xl">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full opacity-30 animate-pulse-slow"></div>
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-yellow-400 rounded-full opacity-20 animate-float" style="animation-delay: 2s;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Books Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-serif font-bold text-gray-900 mb-6">Other Books</h3>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if($products->count() > 0)
                    @foreach($products->take(4) as $product)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s;">
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
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                {{ rand(5, 10) }}% Off
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
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">{{ $product->title }}</h4>
                            <p class="text-xl font-bold gradient-text mb-4">
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
                    <!-- Fallback Books -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=DEAD" 
                                 alt="DEAD" 
                                 class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                5% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">DEAD</h4>
                            <p class="text-xl font-bold gradient-text mb-4">Rp 75.000</p>
                            <button class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up" style="animation-delay: 0.1s;">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=CALL+ME+BY+MY+FIRST+NAME" 
                                 alt="CALL ME BY MY FIRST NAME" 
                                 class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                5% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">CALL ME BY MY FIRST NAME</h4>
                            <p class="text-xl font-bold gradient-text mb-4">Rp 95.000</p>
                            <button class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x500/DC2626/FFFFFF?text=PSD+BOX+MOCKUP" 
                                 alt="PSD BOX MOCKUP" 
                                 class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                5% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">PSD BOX MOCKUP</h4>
                            <p class="text-xl font-bold gradient-text mb-4">Rp 140.000</p>
                            <button class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x500/0D9488/FFFFFF?text=Ölü+Canlar" 
                                 alt="Ölü Canlar" 
                                 class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                10% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">Ölü Canlar</h4>
                            <p class="text-xl font-bold gradient-text mb-4">Rp 150.000</p>
                            <button class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- View More Arrow -->
            <div class="flex justify-center mt-12">
                <button class="bg-gradient-to-r from-green-600 to-emerald-600 text-white p-4 rounded-full hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-110 shadow-lg animate-pulse-slow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gradient-to-r from-green-600 to-emerald-600 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up">
                <h3 class="text-3xl font-serif font-bold mb-6">Stay Updated</h3>
                <p class="text-xl mb-10 opacity-90">Get the latest updates on new releases and exclusive offers</p>
                
                <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Enter your email address" 
                           class="flex-1 px-6 py-4 border-2 border-white/30 rounded-xl focus:ring-4 focus:ring-white/20 focus:border-white focus:outline-none bg-white/10 text-white placeholder-white/70 backdrop-blur-sm">
                    <button class="bg-white text-green-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Subscribe
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