<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Praxis</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#0D1117',
                        'primary-surface': '#161B22',
                        'primary-elevated': '#21262D',
                        'primary-darker': '#010409',
                        'accent-blue': '#58A6FF',
                        'accent-purple': '#8B5CF6',
                        'accent-green': '#22C55E',
                        'accent-orange': '#F97316',
                        'neutral-200': '#E6EDF3',
                        'neutral-300': '#8B949E',
                        'neutral-400': '#6E7681',
                        'neutral-500': '#30363D'
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1F6FEB 0%, #8B5CF6 100%);
        }
        .gradient-text {
            background: linear-gradient(135deg, #58A6FF 0%, #8B5CF6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-primary-dark text-white font-inter antialiased">
    <!-- Navigation -->
    <nav class="bg-primary-surface border-b border-neutral-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="/images/svg-praxis.png" alt="Praxis Logo" class="h-6 w-auto">
                    </a>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <span class="text-neutral-200">Welcome to your Dashboard!</span>
                    <a href="/" class="text-neutral-300 hover:text-white transition-colors duration-200">Back to Home</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Welcome to Praxis Dashboard</h1>
            <p class="text-xl text-neutral-200 max-w-2xl mx-auto">
                Your e-commerce journey starts here. Build, manage, and grow your online store with ease.
            </p>
        </div>

        <!-- Dashboard Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Store Builder -->
            <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Store Builder</h3>
                <p class="text-neutral-300 mb-6">Create and customize your online store with our intuitive drag-and-drop builder.</p>
                <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                    Build Store
                </button>
            </div>

            <!-- Product Management -->
            <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Product Management</h3>
                <p class="text-neutral-300 mb-6">Add, edit, and organize your products with advanced inventory management.</p>
                <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                    Manage Products
                </button>
            </div>

            <!-- Analytics -->
            <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Analytics</h3>
                <p class="text-neutral-300 mb-6">Track your sales, customer behavior, and business performance with detailed analytics.</p>
                <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                    View Analytics
                </button>
            </div>

            <!-- Orders -->
            <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Orders</h3>
                <p class="text-neutral-300 mb-6">Manage customer orders, track shipments, and handle returns efficiently.</p>
                <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                    View Orders
                </button>
            </div>

            <!-- Marketing -->
            <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Marketing</h3>
                <p class="text-neutral-300 mb-6">Create campaigns, send emails, and promote your products to grow sales.</p>
                <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                    Marketing Tools
                </button>
            </div>

            <!-- Settings -->
            <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Settings</h3>
                <p class="text-neutral-300 mb-6">Configure your store settings, payment methods, and account preferences.</p>
                <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                    Settings
                </button>
            </div>
        </div>
    </div>
</body>
</html> 