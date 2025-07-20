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
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-semibold text-gray-900">{{ $store_name ?? 'BOOKSTORE' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">Books</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">About</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                </nav>
                
                <!-- Cart Icon -->
                <div class="flex items-center">
                    <button class="p-2 text-gray-600 hover:text-gray-900 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-6 leading-tight">
                Discover Your Next<br>
                <span class="font-medium">Great Read</span>
            </h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Curated collection of books that inspire, educate, and entertain. 
                Find your perfect match from our carefully selected titles.
            </p>
            
            <!-- Search Bar -->
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="text" placeholder="Search books by title, author, or ISBN" 
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-none focus:ring-0 focus:border-gray-900 focus:outline-none">
                <button class="bg-gray-900 text-white px-8 py-3 font-medium hover:bg-gray-800 transition-colors">
                    Search
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-2xl font-medium text-gray-900 mb-4">Featured Books</h3>
                <p class="text-gray-600">Selected titles for the discerning reader</p>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($products->count() > 0)
                    @foreach($products->take(6) as $product)
                    <div class="bg-white border border-gray-200 hover:border-gray-300 transition-colors">
                        <!-- Product Image -->
                        <div class="aspect-[3/4] overflow-hidden">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">{{ $product->title }}</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-2">{{ $product->title }}</h4>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex items-center justify-between">
                                <p class="text-lg font-semibold text-gray-900">
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
                                        <button type="submit" class="text-gray-900 border border-gray-900 px-4 py-2 text-sm font-medium hover:bg-gray-900 hover:text-white transition-colors">
                                            Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <button class="text-gray-400 border border-gray-300 px-4 py-2 text-sm font-medium cursor-not-allowed">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
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

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-2xl font-medium text-gray-900 mb-4">Browse by Category</h3>
                <p class="text-gray-600">Find books that match your interests</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fiction -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-2">Fiction</h4>
                    <p class="text-gray-600 text-sm">Novels, short stories, and literary works</p>
                </div>
                
                <!-- Non-Fiction -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-2">Non-Fiction</h4>
                    <p class="text-gray-600 text-sm">Biographies, history, and academic texts</p>
                </div>
                
                <!-- Academic -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-2">Academic</h4>
                    <p class="text-gray-600 text-sm">Textbooks and educational materials</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h3 class="text-2xl font-medium text-gray-900 mb-6">About Our Collection</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        We believe in the power of knowledge and the joy of reading. Our carefully curated collection 
                        represents the best in literature, education, and entertainment.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Whether you're a student looking for textbooks, a professional seeking knowledge, 
                        or simply someone who loves a good story, we have something for you.
                    </p>
                    <button class="bg-gray-900 text-white px-6 py-3 font-medium hover:bg-gray-800 transition-colors">
                        Learn More
                    </button>
                </div>
                
                <!-- Right Content - Simple Stats -->
                <div class="space-y-6">
                    <div class="border-l-4 border-gray-900 pl-6">
                        <h4 class="text-2xl font-semibold text-gray-900">1000+</h4>
                        <p class="text-gray-600">Books in our collection</p>
                    </div>
                    <div class="border-l-4 border-gray-900 pl-6">
                        <h4 class="text-2xl font-semibold text-gray-900">50+</h4>
                        <p class="text-gray-600">Categories available</p>
                    </div>
                    <div class="border-l-4 border-gray-900 pl-6">
                        <h4 class="text-2xl font-semibold text-gray-900">24/7</h4>
                        <p class="text-gray-600">Customer support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-2xl font-medium text-gray-900 mb-4">Stay Updated</h3>
            <p class="text-gray-600 mb-8">Get notified about new releases and special offers</p>
            
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Enter your email address" 
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-none focus:ring-0 focus:border-gray-900 focus:outline-none">
                <button class="bg-gray-900 text-white px-6 py-3 font-medium hover:bg-gray-800 transition-colors">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-xl font-semibold mb-4">{{ $store_name ?? 'BOOKSTORE' }}</h3>
                    <p class="text-gray-400 mb-4">{{ $store_description ?? 'Your trusted source for quality books and educational materials.' }}</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-sm font-semibold mb-4 uppercase tracking-wide">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">All Books</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Best Sellers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Sale</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div>
                    <h4 class="text-sm font-semibold mb-4 uppercase tracking-wide">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Shipping</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
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