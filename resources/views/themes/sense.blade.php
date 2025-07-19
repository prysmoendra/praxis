<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praxis Store - Sense Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        .serif { font-family: 'Playfair Display', serif; }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white border-b border-gray-100 py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="serif text-2xl font-medium text-gray-900">{{ $store_name ?? 'praxis' }}</h1>
                </div>
                
                <!-- Navigation -->
                <nav class="flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors">Shop</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors">About</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Hero Image -->
                <div class="order-2 lg:order-1">
                    <!-- TODO: Replace with your hero product image -->
                    <img src="https://via.placeholder.com/600x800" alt="Featured Product" class="w-full h-auto object-cover">
                </div>
                
                <!-- Hero Content -->
                <div class="order-1 lg:order-2">
                    <h2 class="serif text-5xl lg:text-6xl font-medium text-gray-900 mb-6 leading-tight">
                        Artistry in<br>
                        <span class="italic">Every Detail</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Discover our carefully curated collection where each piece tells a story of craftsmanship and design. 
                        Minimalist aesthetics meet functional beauty in every creation.
                    </p>
                    <button class="border border-gray-900 text-gray-900 px-8 py-3 text-sm font-medium hover:bg-gray-900 hover:text-white transition-colors">
                        Explore Collection
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($products->count() > 0)
                @foreach($products as $index => $product)
                <div class="mb-32 last:mb-0">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center {{ $index % 2 == 1 ? 'lg:grid-flow-col-dense' : '' }}">
                        <!-- Product Image -->
                        <div class="{{ $index % 2 == 1 ? 'lg:col-start-2' : '' }}">
                            @if($product->images->count() > 0)
                                <!-- TODO: Replace with your product image -->
                                <img src="{{ $product->images->first()->url }}" alt="{{ $product->title }}" class="w-full h-auto object-cover">
                            @else
                                <img src="https://via.placeholder.com/600x800" alt="{{ $product->title }}" class="w-full h-auto object-cover">
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="{{ $index % 2 == 1 ? 'lg:col-start-1' : '' }}">
                            <h3 class="serif text-3xl font-medium text-gray-900 mb-4">{{ $product->title }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                {{ $product->description }}
                            </p>
                            <div class="flex items-center justify-between">
                                <p class="text-2xl font-light text-gray-900">
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
                                        <button type="submit" class="border border-gray-900 text-gray-900 px-6 py-2 text-sm font-medium hover:bg-gray-900 hover:text-white transition-colors">
                                            Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <button class="border border-gray-300 text-gray-300 px-6 py-2 text-sm font-medium cursor-not-allowed">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center py-20">
                    <p class="text-gray-500 text-lg">No products available yet.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="serif text-4xl font-medium text-gray-900 mb-8">Our Philosophy</h3>
            <p class="text-lg text-gray-600 leading-relaxed">
                We believe in the power of thoughtful design. Every product in our collection is created with intention, 
                focusing on quality, sustainability, and timeless appeal. Our minimalist approach celebrates the beauty 
                of simplicity and the art of living well.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h4 class="serif text-xl font-medium text-gray-900 mb-2">{{ $store_name ?? 'praxis' }}</h4>
                    <p class="text-sm text-gray-600">{{ $store_description ?? 'Minimalist design for modern living' }}</p>
                </div>
                
                <div class="flex space-x-8 text-sm text-gray-600">
                    <a href="#" class="hover:text-gray-900 transition-colors">Shop</a>
                    <a href="#" class="hover:text-gray-900 transition-colors">About</a>
                    <a href="#" class="hover:text-gray-900 transition-colors">Contact</a>
                    <a href="#" class="hover:text-gray-900 transition-colors">Privacy</a>
                </div>
            </div>
            
            <div class="border-t border-gray-100 mt-8 pt-8 text-center">
                <p class="text-sm text-gray-500">&copy; 2024 Praxis Store. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 