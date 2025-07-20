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
    </style>
</head>
<body class="bg-white font-sans">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-serif font-bold text-green-600">{{ $store_name ?? 'Z' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-900 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">Shop</a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">About</a>
                    <a href="#" class="text-gray-900 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                </nav>
                
                <!-- Cart Icon -->
                <div class="flex items-center">
                    <button class="p-2 text-gray-900 hover:text-green-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Top Section - Featured Books & Navigation -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Left Content - Statistics & CTA -->
                <div class="lg:col-span-1">
                    <div class="space-y-8">
                        <!-- Statistics -->
                        <div class="space-y-4">
                            <div class="text-center lg:text-left">
                                <h2 class="text-2xl font-bold text-gray-900">50 Books Best Seller</h2>
                            </div>
                            <div class="text-center lg:text-left">
                                <h2 class="text-2xl font-bold text-gray-900">35 Books For Coming</h2>
                            </div>
                            <div class="text-center lg:text-left">
                                <h2 class="text-2xl font-bold text-gray-900">150 Books Totaly Products</h2>
                            </div>
                        </div>
                        
                        <!-- Call to Action -->
                        <div class="text-center lg:text-left">
                            <button class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors inline-flex items-center">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Featured Books -->
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Book 1 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="relative overflow-hidden group">
                                <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=White+Elephant" 
                                     alt="White Elephant by Trish Harnetiaux" 
                                     class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                                
                                <!-- Red Bow Decoration -->
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <div class="w-16 h-8 bg-red-500 rounded-full"></div>
                                </div>
                            </div>
                            
                            <div class="p-6 text-center">
                                <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">White Elephant</h4>
                                <p class="text-sm text-gray-600 mb-2">Trish Harnetiaux</p>
                                <p class="text-xl font-bold text-gray-900 mb-4">Rp 85.000</p>
                                
                                <form action="{{ route('cart.add', 1) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="variant_id" value="1">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Book 2 -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="relative overflow-hidden group">
                                <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=THE+OPEN+HEART+CLUB" 
                                     alt="THE OPEN HEART CLUB by Charles Bronstein" 
                                     class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            
                            <div class="p-6 text-center">
                                <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">THE OPEN HEART CLUB</h4>
                                <p class="text-sm text-gray-600 mb-2">Charles Bronstein</p>
                                <p class="text-xs text-gray-500 mb-2">A STORY ABOUT BIRTH & DEATH & CARDIAC SURGERY</p>
                                <p class="text-xl font-bold text-gray-900 mb-4">Rp 120.000</p>
                                
                                <form action="{{ route('cart.add', 2) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="variant_id" value="2">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors">
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
    <section class="py-16 bg-gradient-to-r from-green-50 to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <h3 class="text-3xl font-serif font-bold text-gray-900 mb-6">2021 National Book Award for Fiction shortlist</h3>
                    <button class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                        Shop
                    </button>
                </div>
                
                <!-- Right Content - Open Book -->
                <div class="relative">
                    <div class="relative z-10 transform rotate-3">
                        <img src="https://via.placeholder.com/500x400/F5F5F5/000000?text=Open+Book+with+Signature" 
                             alt="Open book with signature" 
                             class="w-full rounded-lg shadow-lg">
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-green-600 rounded-full opacity-20"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Books Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-serif font-bold text-gray-900 mb-4">Other Books</h3>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if($products->count() > 0)
                    @foreach($products->take(4) as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden group">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" 
                                     class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <img src="https://via.placeholder.com/400x500/6B7280/FFFFFF?text={{ urlencode($product->title) }}" 
                                     alt="{{ $product->title }}" 
                                     class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            @endif
                            
                            <!-- Discount Badge -->
                            <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded text-sm font-semibold">
                                {{ rand(5, 10) }}% Off
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">{{ $product->title }}</h4>
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
                                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors">
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
                    <!-- Fallback Books -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="relative overflow-hidden group">
                            <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=DEAD" 
                                 alt="DEAD" 
                                 class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded text-sm font-semibold">
                                5% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">DEAD</h4>
                            <p class="text-xl font-bold text-gray-900">Rp 75.000</p>
                            <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="relative overflow-hidden group">
                            <img src="https://via.placeholder.com/400x500/FFFFFF/000000?text=CALL+ME+BY+MY+FIRST+NAME" 
                                 alt="CALL ME BY MY FIRST NAME" 
                                 class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded text-sm font-semibold">
                                5% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">CALL ME BY MY FIRST NAME</h4>
                            <p class="text-xl font-bold text-gray-900">Rp 95.000</p>
                            <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="relative overflow-hidden group">
                            <img src="https://via.placeholder.com/400x500/DC2626/FFFFFF?text=PSD+BOX+MOCKUP" 
                                 alt="PSD BOX MOCKUP" 
                                 class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded text-sm font-semibold">
                                5% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">PSD BOX MOCKUP</h4>
                            <p class="text-xl font-bold text-gray-900">Rp 140.000</p>
                            <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="relative overflow-hidden group">
                            <img src="https://via.placeholder.com/400x500/0D9488/FFFFFF?text=Ölü+Canlar" 
                                 alt="Ölü Canlar" 
                                 class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-2 right-2 bg-green-600 text-white px-2 py-1 rounded text-sm font-semibold">
                                10% Off
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-lg font-serif font-semibold text-gray-900 mb-2">Ölü Canlar</h4>
                            <p class="text-xl font-bold text-gray-900">Rp 150.000</p>
                            <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors mt-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- View More Arrow -->
            <div class="flex justify-center mt-8">
                <button class="bg-green-600 text-white p-3 rounded-full hover:bg-green-700 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Help -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Help</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Legal Notice</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Secure Payment -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Secure Payment</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Payment Methods</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Security</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Social Networks -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Social Networks</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Pinterest</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Facebook</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Instagram</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 {{ $store_name ?? 'Bookstore' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 