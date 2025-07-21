<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store_name ?? 'Bookstore' }} - Minimal Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Custom animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }
        
        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #111827, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Custom focus styles */
        .focus-ring:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
        }
        
        /* Smooth transitions */
        .transition-smooth {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-semibold gradient-text">{{ $store_name ?? 'BOOKSTORE' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-smooth relative group">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-smooth"></span>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-smooth relative group">
                        Books
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-smooth"></span>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-smooth relative group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-smooth"></span>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-smooth relative group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 group-hover:w-full transition-smooth"></span>
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
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up">
                <h2 class="text-5xl md:text-6xl font-light text-gray-900 mb-8 leading-tight">
                    Discover Your Next<br>
                    <span class="font-medium gradient-text">Great Read</span>
                </h2>
                <p class="text-xl text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed">
                    Curated collection of books that inspire, educate, and entertain. 
                    Find your perfect match from our carefully selected titles.
                </p>
                
                <!-- Search Bar -->
                <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <div class="relative flex-1">
                        <input type="text" placeholder="Search books by title, author, or ISBN" 
                                class="w-full px-6 py-4 border-2 border-gray-200 rounded-none focus:ring-0 focus:border-gray-900 focus:outline-none focus-ring text-lg transition-smooth">
                        <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button class="bg-gray-900 text-white px-8 py-4 font-medium hover:bg-gray-800 transition-smooth transform hover:scale-105">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-3xl font-medium text-gray-900 mb-6">Featured Books</h3>
                <div class="w-16 h-0.5 bg-gray-900 mx-auto mb-6"></div>
                <p class="text-gray-600 text-lg">Selected titles for the discerning reader</p>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($products->count() > 0)
                    @foreach($products->take(6) as $product)
                    <div class="bg-white border border-gray-200 hover:border-gray-300 transition-smooth group animate-fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                        <!-- Product Image -->
                        <div class="aspect-[3/4] overflow-hidden">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-smooth">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center group-hover:bg-gray-200 transition-smooth">
                                    <span class="text-gray-400 text-sm">{{ $product->title }}</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-8">
                            <h4 class="text-lg font-medium text-gray-900 mb-3 group-hover:text-gray-700 transition-smooth">{{ $product->title }}</h4>
                            <p class="text-sm text-gray-600 mb-4 leading-relaxed">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex items-center justify-between">
                                <p class="text-xl font-semibold text-gray-900">
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
                                        <button type="submit" class="text-gray-900 border-2 border-gray-900 px-6 py-3 text-sm font-medium hover:bg-gray-900 hover:text-white transition-smooth transform hover:scale-105">
                                            Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <button class="text-gray-400 border-2 border-gray-300 px-6 py-3 text-sm font-medium cursor-not-allowed">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-16">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-xl font-medium">No products available yet.</p>
                        <p class="text-gray-400 mt-2">Check back soon for amazing books!</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-3xl font-medium text-gray-900 mb-6">Browse by Category</h3>
                <div class="w-16 h-0.5 bg-gray-900 mx-auto mb-6"></div>
                <p class="text-gray-600 text-lg">Find books that match your interests</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Fiction -->
                <div class="text-center group animate-slide-in-left">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-smooth group-hover:scale-110">
                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 mb-3">Fiction</h4>
                    <p class="text-gray-600 leading-relaxed">Novels, short stories, and literary works that transport you to new worlds.</p>
                </div>
                
                <!-- Non-Fiction -->
                <div class="text-center group animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-smooth group-hover:scale-110">
                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 mb-3">Non-Fiction</h4>
                    <p class="text-gray-600 leading-relaxed">Biographies, history, and academic texts that expand your knowledge.</p>
                </div>
                
                <!-- Academic -->
                <div class="text-center group animate-slide-in-right">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-smooth group-hover:scale-110">
                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 mb-3">Academic</h4>
                    <p class="text-gray-600 leading-relaxed">Textbooks and educational materials for students and professionals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="animate-slide-in-left">
                    <h3 class="text-3xl font-medium text-gray-900 mb-8">About Our Collection</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        We believe in the power of knowledge and the joy of reading. Our carefully curated collection 
                        represents the best in literature, education, and entertainment.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                        Whether you're a student looking for textbooks, a professional seeking knowledge, 
                        or simply someone who loves a good story, we have something for you.
                    </p>
                    <button class="bg-gray-900 text-white px-8 py-4 font-medium hover:bg-gray-800 transition-smooth transform hover:scale-105">
                        Learn More
                    </button>
                </div>
                
                <!-- Right Content - Simple Stats -->
                <div class="space-y-8 animate-slide-in-right">
                    <div class="border-l-4 border-gray-900 pl-8">
                        <h4 class="text-3xl font-semibold text-gray-900 mb-2">1000+</h4>
                        <p class="text-gray-600 text-lg">Books in our collection</p>
                    </div>
                    <div class="border-l-4 border-gray-900 pl-8">
                        <h4 class="text-3xl font-semibold text-gray-900 mb-2">50+</h4>
                        <p class="text-gray-600 text-lg">Categories available</p>
                    </div>
                    <div class="border-l-4 border-gray-900 pl-8">
                        <h4 class="text-3xl font-semibold text-gray-900 mb-2">24/7</h4>
                        <p class="text-gray-600 text-lg">Customer support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up">
                <h3 class="text-3xl font-medium text-gray-900 mb-6">Stay Updated</h3>
                <div class="w-16 h-0.5 bg-gray-900 mx-auto mb-6"></div>
                <p class="text-gray-600 mb-10 text-lg">Get notified about new releases and special offers</p>
                
                <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Enter your email address" 
                           class="flex-1 px-6 py-4 border-2 border-gray-200 rounded-none focus:ring-0 focus:border-gray-900 focus:outline-none focus-ring text-lg transition-smooth">
                    <button class="bg-gray-900 text-white px-8 py-4 font-medium hover:bg-gray-800 transition-smooth transform hover:scale-105">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-semibold mb-6 gradient-text">{{ $store_name ?? 'BOOKSTORE' }}</h3>
                    <p class="text-gray-400 mb-6 text-lg leading-relaxed">{{ $store_description ?? 'Your trusted source for quality books and educational materials. We believe in the power of knowledge and the joy of reading.' }}</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-sm font-semibold mb-6 uppercase tracking-wide">Quick Links</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">All Books</a></li>
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">Best Sellers</a></li>
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">Sale</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div>
                    <h4 class="text-sm font-semibold mb-6 uppercase tracking-wide">Support</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">Shipping</a></li>
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition-smooth hover:translate-x-2 transform inline-block">FAQ</a></li>
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