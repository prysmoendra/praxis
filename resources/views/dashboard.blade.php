<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Praxis Dashboard - {{ $user->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            dark: '#0D1117',
                            darker: '#010409',
                            surface: '#161B22',
                            elevated: '#21262D'
                        },
                        accent: {
                            blue: '#58A6FF',
                            'blue-bright': '#1F6FEB',
                            purple: '#8B5CF6',
                            green: '#3FB950',
                            orange: '#FF8C00'
                        }
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
    <nav class="bg-primary-surface border-b border-neutral-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="/images/svg-praxis.png" alt="Praxis Logo" class="h-6 w-auto">
                    </a>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 gradient-bg rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-white">{{ $user->name }}</p>
                            <p class="text-xs text-neutral-300">{{ $user->phone }}</p>
                        </div>
                    </div>
                    <button onclick="logout()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="min-h-screen bg-primary-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold gradient-text mb-2">
                    @php
                        $hour = now()->hour;
                        if ($hour >= 5 && $hour < 12) {
                            echo 'Good Morning';
                        } elseif ($hour >= 12 && $hour < 17) {
                            echo 'Good Afternoon';
                        } elseif ($hour >= 17 && $hour < 21) {
                            echo 'Good Evening';
                        } else {
                            echo 'Good Night';
                        }
                    @endphp
                    , {{ $user->name }}!
                </h1>
                <p class="text-neutral-300">Manage your Praxis e-commerce store and track your business performance.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-neutral-300 text-sm">Total Sales</p>
                            <p class="text-2xl font-bold text-white">Rp 0</p>
                        </div>
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-neutral-300 text-sm">Total Orders</p>
                            <p class="text-2xl font-bold text-white">0</p>
                        </div>
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-neutral-300 text-sm">Products</p>
                            <p class="text-2xl font-bold text-white">0</p>
                        </div>
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-neutral-300 text-sm">Customers</p>
                            <p class="text-2xl font-bold text-white">0</p>
                        </div>
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <button class="w-full gradient-bg text-white py-2 px-4 rounded-lg text-sm font-medium hover:brightness-110 transition-all duration-200">
                            Add New Product
                        </button>
                        <button class="w-full border border-neutral-400 text-neutral-200 py-2 px-4 rounded-lg text-sm font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
                            View Orders
                        </button>
                        <button class="w-full border border-neutral-400 text-neutral-200 py-2 px-4 rounded-lg text-sm font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
                            Store Settings
                        </button>
                    </div>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
                    <div class="space-y-3">
                        <div class="text-sm text-neutral-300">
                            <p>No recent activity</p>
                        </div>
                    </div>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Account Info</h3>
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-neutral-300">Name</p>
                            <p class="text-white font-medium">{{ $user->name }}</p>
                        </div>
                        <div>
                            <p class="text-neutral-300">Phone</p>
                            <p class="text-white font-medium">{{ $user->phone }}</p>
                        </div>
                        @if($user->email)
                        <div>
                            <p class="text-neutral-300">Email</p>
                            <p class="text-white font-medium">{{ $user->email }}</p>
                        </div>
                        @endif
                        <div>
                            <p class="text-neutral-300">Member Since</p>
                            <p class="text-white font-medium">{{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                fetch('/auth/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.redirect;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    window.location.href = '/';
                });
            }
        }
    </script>
</body>
</html> 