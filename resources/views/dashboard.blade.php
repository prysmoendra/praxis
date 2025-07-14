<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Praxis Dashboard - {{ $user->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Praxis Design System Colors
                        background: {
                            main: '#F1F2F4'
                        },
                        surface: {
                            sidebar: '#FFFFFF',
                            card: '#FFFFFF',
                            popover: '#FFFFFF',
                            topbar: '#1A1C1D'
                        },
                        text: {
                            primary: '#1A1C1D',
                            secondary: '#6D7175',
                            onDark: '#E3E5E7'
                        },
                        interactive: {
                            primary: '#2C6ECB',
                            primaryText: '#FFFFFF',
                            secondary: '#E3E5E7',
                            secondaryText: '#1A1C1D',
                            tertiary: 'transparent',
                            tertiaryText: '#1A1C1D'
                        },
                        border: {
                            primary: '#E1E3E5',
                            interactive: '#8C9196'
                        },
                        accent: {
                            primary: '#47803C'
                        }
                    },
                    fontFamily: {
                        'inter': ['Inter', '-apple-system', 'BlinkMacSystemFont', 'San Francisco', 'Segoe UI', 'Helvetica Neue', 'sans-serif']
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
        
        /* Accordion styles */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .accordion-content.open {
            max-height: 1000px;
            transition: max-height 0.3s ease-in;
        }
        
        .accordion-icon {
            transition: transform 0.3s ease;
        }
        
        .accordion-icon.rotated {
            transform: rotate(180deg);
        }

        /* Dark mode styles */
        .dark-mode {
            background-color: #161B22 !important;
            color: white !important;
        }

        .dark-mode .min-h-screen {
            background-color: #0D1117 !important;
        }

        .dark-mode .bg-surface-card {
            background-color: #21262D !important;
            border-color: #6B7280 !important;
        }

        .dark-mode .text-text-primary {
            color: white !important;
        }

        .dark-mode .text-text-secondary {
            color: #D1D5DB !important;
        }

        .dark-mode .border-border-primary {
            border-color: #6B7280 !important;
        }

        .dark-mode .bg-background-main {
            background-color: #0D1117 !important;
        }

        /* Accordion button hover effects */
        .accordion-trigger {
            transition: all 0.2s ease-in-out;
        }

        .accordion-trigger:hover {
            background-color: #F1F2F4 !important;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .accordion-trigger:hover {
            background-color: #2D3748 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Action button hover effects */
        .action-btn-primary {
            transition: all 0.2s ease-in-out;
        }

        .action-btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(44, 110, 203, 0.3);
        }

        .action-btn-secondary {
            transition: all 0.2s ease-in-out;
        }

        .action-btn-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #E5E7EB !important;
        }

        .dark-mode .action-btn-secondary:hover {
            background-color: #374151 !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="bg-background-main text-text-primary font-inter antialiased">
    <!-- Navigation -->
    <nav class="bg-surface-topbar text-text-onDark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="/images/svg-praxis.png" alt="Praxis Logo" class="h-6 w-auto">
                    </a>
                </div>
                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 gradient-bg rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <span class="hidden md:inline text-sm font-medium text-text-onDark">{{ $user->name }}</span>
                        <svg class="w-4 h-4 ml-1 text-text-onDark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-56 bg-surface-card border border-border-primary rounded-xl shadow-lg z-50">
                        <div class="p-4 border-b border-border-primary">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-lg">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-base font-semibold text-text-primary">{{ $user->name }}</p>
                                    <p class="text-xs text-text-secondary">{{ $user->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <button onclick="logout()" class="w-full text-left px-4 py-2 text-sm text-text-primary hover:bg-background-main rounded transition">Logout</button>
                        </div>
                        <div class="py-2 border-t border-border-primary">
                            <!-- Language Switcher -->
                            <div class="px-4 py-2">
                                <p class="text-xs text-text-secondary mb-2">Language</p>
                                <div class="flex items-center border border-border-primary rounded-lg overflow-hidden">
                                    <button onclick="setLanguage('id')" id="lang-id" class="gradient-bg text-white font-semibold px-3 py-2 text-sm flex-1">ID</button>
                                    <button onclick="setLanguage('en')" id="lang-en" class="bg-interactive-secondary text-interactive-secondaryText hover:text-text-primary font-semibold px-3 py-2 text-sm flex-1 transition-colors">EN</button>
                                </div>
                            </div>
                            <!-- Dark/Light Mode Toggle -->
                            <div class="px-4 py-2">
                                <p class="text-xs text-text-secondary mb-2">Theme</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-text-primary">Dark Mode</span>
                                    <button onclick="toggleDarkMode()" id="theme-toggle" class="relative inline-flex h-6 w-11 items-center rounded-full bg-interactive-secondary transition-colors">
                                        <span id="theme-toggle-slider" class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="min-h-screen bg-background-main">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-text-primary mb-2">
                    @php
                        $hour = now()->hour;
                        if ($hour >= 0 && $hour < 10) {
                            echo 'Good Morning';
                        } elseif ($hour >= 10 && $hour < 15) {
                            echo 'Good Afternoon';
                        } elseif ($hour >= 15 && $hour < 18) {
                            echo 'Good Evening';
                        } elseif ($hour >= 18 && $hour < 24) {
                            echo 'Good Night';
                        }
                    @endphp
                    , {{ $user->name }}!
                </h1>
                <p class="text-text-secondary" data-translate-key="dashboard_manage_store">Manage your Praxis e-commerce store and track your business performance.</p>
            </div>

            @php
                // Check if user is new (created within last 7 days and no setup completed)
                $isNewUser = $user->created_at->diffInDays(now()) <= 7;
                $setupCompleted = false; // This would be stored in database in real implementation
            @endphp

            @if($isNewUser && !$setupCompleted)
                <!-- Setup Guide for New Users -->
                <div class="mb-8">
                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <!-- Setup Guide Header -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-accent-primary rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-text-secondary" data-translate-key="dashboard_tasks_complete">0 of 9 tasks complete</p>
                                        <h2 class="text-xl font-semibold text-text-primary" data-translate-key="dashboard_setup_guide">Setup guide</h2>
                                    </div>
                                </div>
                                <button onclick="skipSetup()" class="text-text-secondary hover:text-text-primary text-sm font-medium transition-colors" data-translate-key="dashboard_skip_setup">
                                    Skip setup
                                </button>
                            </div>
                            <p class="text-text-secondary text-sm" data-translate-key="dashboard_complete_tasks">Complete these essential tasks to get your store up and running.</p>
                        </div>

                        <!-- Setup Guide Accordion -->
                        <div class="space-y-0">
                            <!-- Sell Online Section -->
                            <div class="border-t border-border-primary first:border-t-0">
                                <button onclick="toggleAccordion('sell-online')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-interactive-secondary rounded-full flex items-center justify-center">
                                            <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                        </div>
                                        <span class="text-text-primary font-semibold" data-translate-key="dashboard_sell_online">Sell online</span>
                                    </div>
                                    <svg id="sell-online-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="sell-online-content" class="accordion-content pb-4">
                                    <div class="ml-9 space-y-4">
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_add_first_product">Add your first product</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_add_first_product_desc">Write a description, add photos, and set pricing for the products you plan to sell.</p>
                                                <div class="flex space-x-3">
                                                    <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                        <span data-translate-key="dashboard_add_product">Add product</span>
                                                    </button>
                                                    <button class="action-btn-secondary bg-interactive-secondary text-interactive-secondaryText px-4 py-2 rounded-lg text-sm font-semibold border border-border-primary transition-colors">
                                                        <span data-translate-key="dashboard_learn_more">Learn more</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_design_store">Design your store</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_design_store_desc">Customize your store's appearance and layout.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_customize_theme">Customize theme</span>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">3</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_customize_domain">Customize your domain</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_customize_domain_desc">Set up a custom domain for your online store.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_setup_domain">Set up domain</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Store Settings Section -->
                            <div class="border-t border-border-primary">
                                <button onclick="toggleAccordion('store-settings')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-interactive-secondary rounded-full flex items-center justify-center">
                                            <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                        </div>
                                        <span class="text-text-primary font-semibold" data-translate-key="dashboard_store_settings">Store settings</span>
                                    </div>
                                    <svg id="store-settings-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="store-settings-content" class="accordion-content pb-4">
                                    <div class="ml-9 space-y-4">
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_add_store_name">Add store name</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_add_store_name_desc">Your temporary store name is currently "My Store". The store name appears in your admin and your online store.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_update_store_name">Update store name</span>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_review_shipping">Review your shipping rates</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_review_shipping_desc">Configure shipping options and rates for your customers.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_configure_shipping">Configure shipping</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Launch Store Section -->
                            <div class="border-t border-border-primary">
                                <button onclick="toggleAccordion('launch-store')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-interactive-secondary rounded-full flex items-center justify-center">
                                            <span class="text-interactive-secondaryText text-xs font-semibold">3</span>
                                        </div>
                                        <span class="text-text-primary font-semibold" data-translate-key="dashboard_launch_store">Launch your online store</span>
                                    </div>
                                    <svg id="launch-store-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="launch-store-content" class="accordion-content pb-4">
                                    <div class="ml-9 space-y-4">
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_place_test_order">Place a test order</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_place_test_order_desc">Make sure things are running smoothly by placing a test order from your own store.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_place_test_order_btn">Place test order</span>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">2</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_unlock_store">Unlock your store</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_unlock_store_desc">Remove the password protection and make your store live.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_unlock_store_btn">Unlock store</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Point of Sale Section -->
                            <div class="border-t border-border-primary">
                                <button onclick="toggleAccordion('pos-setup')" class="accordion-trigger w-full flex justify-between items-center py-4 px-0 cursor-pointer rounded-lg transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-interactive-secondary rounded-full flex items-center justify-center">
                                            <span class="text-interactive-secondaryText text-xs font-semibold">4</span>
                                        </div>
                                        <span class="text-text-primary font-semibold" data-translate-key="dashboard_pos_setup">Set up Point of Sale</span>
                                    </div>
                                    <svg id="pos-setup-icon" class="accordion-icon w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="pos-setup-content" class="accordion-content pb-4">
                                    <div class="ml-9 space-y-4">
                                        <div class="flex items-start space-x-4 p-4 bg-background-main rounded-lg">
                                            <div class="w-8 h-8 bg-interactive-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                                <span class="text-interactive-secondaryText text-xs font-semibold">1</span>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-text-primary font-semibold mb-1" data-translate-key="dashboard_configure_pos">Configure POS settings</h4>
                                                <p class="text-text-secondary text-sm mb-3" data-translate-key="dashboard_configure_pos_desc">Set up your point of sale system for in-person sales.</p>
                                                <button class="action-btn-primary bg-interactive-primary text-interactive-primaryText px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                                    <span data-translate-key="dashboard_setup_pos">Set up POS</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Dashboard Content (shown after setup or for existing users) -->
            @if(!$isNewUser || $setupCompleted)
                <!-- Stats Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-text-secondary text-sm" data-translate-key="dashboard_total_sales">Total Sales</p>
                                <p class="text-2xl font-bold text-text-primary">Rp 0</p>
                            </div>
                            <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-text-secondary text-sm" data-translate-key="dashboard_total_orders">Total Orders</p>
                                <p class="text-2xl font-bold text-text-primary">0</p>
                            </div>
                            <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-text-secondary text-sm" data-translate-key="dashboard_products">Products</p>
                                <p class="text-2xl font-bold text-text-primary">0</p>
                            </div>
                            <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-text-secondary text-sm" data-translate-key="dashboard_customers">Customers</p>
                                <p class="text-2xl font-bold text-text-primary">0</p>
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
                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-text-primary mb-4" data-translate-key="dashboard_quick_actions">Quick Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full bg-interactive-primary text-interactive-primaryText py-2 px-4 rounded-lg text-sm font-semibold hover:bg-interactive-primary/90 transition-colors">
                                <span data-translate-key="dashboard_add_product">Add New Product</span>
                            </button>
                            <button class="w-full bg-interactive-secondary text-interactive-secondaryText py-2 px-4 rounded-lg text-sm font-semibold border border-border-primary hover:bg-interactive-secondary/80 transition-colors">
                                <span data-translate-key="dashboard_view_orders">View Orders</span>
                            </button>
                            <button class="w-full bg-interactive-secondary text-interactive-secondaryText py-2 px-4 rounded-lg text-sm font-semibold border border-border-primary hover:bg-interactive-secondary/80 transition-colors">
                                <span data-translate-key="dashboard_store_settings">Store Settings</span>
                            </button>
                        </div>
                    </div>

                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-text-primary mb-4" data-translate-key="dashboard_recent_activity">Recent Activity</h3>
                        <div class="space-y-3">
                            <div class="text-sm text-text-secondary">
                                <p data-translate-key="dashboard_no_activity">No recent activity</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-card border border-border-primary rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-text-primary mb-4" data-translate-key="dashboard_account_info">Account Info</h3>
                        <div class="space-y-3 text-sm">
                            <div>
                                <p class="text-text-secondary" data-translate-key="dashboard_name">Name</p>
                                <p class="text-text-primary font-semibold">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="text-text-secondary" data-translate-key="dashboard_phone">Phone</p>
                                <p class="text-text-primary font-semibold">{{ $user->phone }}</p>
                            </div>
                            @if($user->email)
                            <div>
                                <p class="text-text-secondary" data-translate-key="dashboard_email">Email</p>
                                <p class="text-text-primary font-semibold">{{ $user->email }}</p>
                            </div>
                            @endif
                            <div>
                                <p class="text-text-secondary" data-translate-key="dashboard_member_since">Member Since</p>
                                <p class="text-text-primary font-semibold">{{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
        function switchLanguage() {
            alert('Language switcher not implemented yet.');
        }
        function switchMode() {
            // Simple toggle for demonstration
            document.body.classList.toggle('bg-background-main');
            document.body.classList.toggle('bg-primary-dark');
            document.body.classList.toggle('text-white');
            document.body.classList.toggle('text-text-primary');
        }
        // Accordion: Only one open at a time
        function toggleAccordion(sectionId) {
            const allContents = document.querySelectorAll('.accordion-content');
            const allIcons = document.querySelectorAll('.accordion-icon');
            allContents.forEach((el) => {
                if (el.id === sectionId + '-content') {
                    el.classList.toggle('open');
                } else {
                    el.classList.remove('open');
                }
            });
            allIcons.forEach((icon) => {
                if (icon.id === sectionId + '-icon') {
                    icon.classList.toggle('rotated');
                } else {
                    icon.classList.remove('rotated');
                }
            });
        }
        function skipSetup() {
            if (confirm('Are you sure you want to skip the setup guide? You can always access it later from the settings.')) {
                window.location.reload();
            }
        }
        // Language switching functionality
        const translations = {
            id: {
                // Dashboard translations
                dashboard_welcome: 'Selamat Datang',
                dashboard_manage_store: 'Kelola toko Praxis e-commerce Anda dan pantau kinerja bisnis.',
                dashboard_total_sales: 'Total Penjualan',
                dashboard_total_orders: 'Total Pesanan',
                dashboard_products: 'Produk',
                dashboard_customers: 'Pelanggan',
                dashboard_quick_actions: 'Aksi Cepat',
                dashboard_add_product: 'Tambah Produk Baru',
                dashboard_view_orders: 'Lihat Pesanan',
                dashboard_store_settings: 'Pengaturan Toko',
                dashboard_recent_activity: 'Aktivitas Terbaru',
                dashboard_no_activity: 'Tidak ada aktivitas terbaru',
                dashboard_account_info: 'Info Akun',
                dashboard_name: 'Nama',
                dashboard_phone: 'Telepon',
                dashboard_email: 'Email',
                dashboard_member_since: 'Anggota Sejak',
                dashboard_logout: 'Keluar',
                dashboard_language: 'Bahasa',
                dashboard_theme: 'Tema',
                dashboard_dark_mode: 'Mode Gelap',
                dashboard_setup_guide: 'Panduan Setup',
                dashboard_tasks_complete: '0 dari 9 tugas selesai',
                dashboard_complete_tasks: 'Selesaikan tugas-tugas penting ini untuk menjalankan toko Anda.',
                dashboard_skip_setup: 'Lewati setup',
                dashboard_sell_online: 'Jual Online',
                dashboard_add_first_product: 'Tambah produk pertama Anda',
                dashboard_add_first_product_desc: 'Tulis deskripsi, tambahkan foto, dan atur harga untuk produk yang akan Anda jual.',
                dashboard_add_product_btn: 'Tambah produk',
                dashboard_learn_more: 'Pelajari lebih lanjut',
                dashboard_design_store: 'Desain toko Anda',
                dashboard_design_store_desc: 'Sesuaikan tampilan dan tata letak toko Anda.',
                dashboard_customize_theme: 'Sesuaikan tema',
                dashboard_customize_domain: 'Sesuaikan domain Anda',
                dashboard_customize_domain_desc: 'Atur domain kustom untuk toko online Anda.',
                dashboard_setup_domain: 'Atur domain',
                dashboard_store_settings_title: 'Pengaturan Toko',
                dashboard_add_store_name: 'Tambah nama toko',
                dashboard_add_store_name_desc: 'Nama toko sementara Anda saat ini adalah "My Store". Nama toko muncul di admin dan toko online Anda.',
                dashboard_update_store_name: 'Perbarui nama toko',
                dashboard_review_shipping: 'Tinjau tarif pengiriman Anda',
                dashboard_review_shipping_desc: 'Konfigurasikan opsi dan tarif pengiriman untuk pelanggan Anda.',
                dashboard_configure_shipping: 'Konfigurasi pengiriman',
                dashboard_launch_store: 'Luncurkan toko online Anda',
                dashboard_place_test_order: 'Buat pesanan uji',
                dashboard_place_test_order_desc: 'Pastikan semuanya berjalan lancar dengan membuat pesanan uji dari toko Anda sendiri.',
                dashboard_place_test_order_btn: 'Buat pesanan uji',
                dashboard_unlock_store: 'Buka kunci toko Anda',
                dashboard_unlock_store_desc: 'Hapus perlindungan kata sandi dan buat toko Anda live.',
                dashboard_unlock_store_btn: 'Buka kunci toko',
                dashboard_pos_setup: 'Atur Point of Sale',
                dashboard_configure_pos: 'Konfigurasi pengaturan POS',
                dashboard_configure_pos_desc: 'Atur sistem point of sale Anda untuk penjualan langsung.',
                dashboard_setup_pos: 'Atur POS'
            },
            en: {
                // Dashboard translations
                dashboard_welcome: 'Welcome',
                dashboard_manage_store: 'Manage your Praxis e-commerce store and track your business performance.',
                dashboard_total_sales: 'Total Sales',
                dashboard_total_orders: 'Total Orders',
                dashboard_products: 'Products',
                dashboard_customers: 'Customers',
                dashboard_quick_actions: 'Quick Actions',
                dashboard_add_product: 'Add New Product',
                dashboard_view_orders: 'View Orders',
                dashboard_store_settings: 'Store Settings',
                dashboard_recent_activity: 'Recent Activity',
                dashboard_no_activity: 'No recent activity',
                dashboard_account_info: 'Account Info',
                dashboard_name: 'Name',
                dashboard_phone: 'Phone',
                dashboard_email: 'Email',
                dashboard_member_since: 'Member Since',
                dashboard_logout: 'Logout',
                dashboard_language: 'Language',
                dashboard_theme: 'Theme',
                dashboard_dark_mode: 'Dark Mode',
                dashboard_setup_guide: 'Setup Guide',
                dashboard_tasks_complete: '0 of 9 tasks complete',
                dashboard_complete_tasks: 'Complete these essential tasks to get your store up and running.',
                dashboard_skip_setup: 'Skip setup',
                dashboard_sell_online: 'Sell Online',
                dashboard_add_first_product: 'Add your first product',
                dashboard_add_first_product_desc: 'Write a description, add photos, and set pricing for the products you plan to sell.',
                dashboard_add_product_btn: 'Add product',
                dashboard_learn_more: 'Learn more',
                dashboard_design_store: 'Design your store',
                dashboard_design_store_desc: 'Customize your store\'s appearance and layout.',
                dashboard_customize_theme: 'Customize theme',
                dashboard_customize_domain: 'Customize your domain',
                dashboard_customize_domain_desc: 'Set up a custom domain for your online store.',
                dashboard_setup_domain: 'Set up domain',
                dashboard_store_settings_title: 'Store Settings',
                dashboard_add_store_name: 'Add store name',
                dashboard_add_store_name_desc: 'Your temporary store name is currently "My Store". The store name appears in your admin and your online store.',
                dashboard_update_store_name: 'Update store name',
                dashboard_review_shipping: 'Review your shipping rates',
                dashboard_review_shipping_desc: 'Configure shipping options and rates for your customers.',
                dashboard_configure_shipping: 'Configure shipping',
                dashboard_launch_store: 'Launch your online store',
                dashboard_place_test_order: 'Place a test order',
                dashboard_place_test_order_desc: 'Make sure things are running smoothly by placing a test order from your own store.',
                dashboard_place_test_order_btn: 'Place test order',
                dashboard_unlock_store: 'Unlock your store',
                dashboard_unlock_store_desc: 'Remove the password protection and make your store live.',
                dashboard_unlock_store_btn: 'Unlock store',
                dashboard_pos_setup: 'Set up Point of Sale',
                dashboard_configure_pos: 'Configure POS settings',
                dashboard_configure_pos_desc: 'Set up your point of sale system for in-person sales.',
                dashboard_setup_pos: 'Set up POS'
            }
        };

        let currentLanguage = localStorage.getItem('language') || 'id';
        let isDarkMode = localStorage.getItem('darkMode') === 'true';

        function setLanguage(lang) {
            currentLanguage = lang;
            localStorage.setItem('language', lang);
            
            // Update language button styles
            const langIdButton = document.getElementById('lang-id');
            const langEnButton = document.getElementById('lang-en');
            
            if (lang === 'id') {
                langIdButton.classList.remove('bg-interactive-secondary', 'text-interactive-secondaryText');
                langIdButton.classList.add('gradient-bg', 'text-white');
                langEnButton.classList.remove('gradient-bg', 'text-white');
                langEnButton.classList.add('bg-interactive-secondary', 'text-interactive-secondaryText');
            } else {
                langEnButton.classList.remove('bg-interactive-secondary', 'text-interactive-secondaryText');
                langEnButton.classList.add('gradient-bg', 'text-white');
                langIdButton.classList.remove('gradient-bg', 'text-white');
                langIdButton.classList.add('bg-interactive-secondary', 'text-interactive-secondaryText');
            }
            
            // Apply translations
            applyTranslations();
        }

        function applyTranslations() {
            // Apply translations to elements with data-translate-key
            document.querySelectorAll('[data-translate-key]').forEach(element => {
                const key = element.getAttribute('data-translate-key');
                const translation = translations[currentLanguage][key];
                
                if (translation !== undefined) {
                    if (element.tagName === 'INPUT' && key.includes('placeholder')) {
                        element.placeholder = translation;
                    } else {
                        element.innerHTML = translation;
                    }
                }
            });
        }

        function toggleDarkMode() {
            isDarkMode = !isDarkMode;
            localStorage.setItem('darkMode', isDarkMode);
            
            const toggle = document.getElementById('theme-toggle');
            const slider = document.getElementById('theme-toggle-slider');
            
            if (isDarkMode) {
                // Switch to dark mode
                document.body.classList.add('dark-mode');
                toggle.classList.remove('bg-interactive-secondary');
                toggle.classList.add('bg-accent-primary');
                slider.classList.remove('translate-x-1');
                slider.classList.add('translate-x-6');
            } else {
                // Switch to light mode
                document.body.classList.remove('dark-mode');
                toggle.classList.remove('bg-accent-primary');
                toggle.classList.add('bg-interactive-secondary');
                slider.classList.remove('translate-x-6');
                slider.classList.add('translate-x-1');
            }
        }

        // Initialize theme and language on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial language
            setLanguage(currentLanguage);
            
            // Set initial theme based on saved preference
            const savedDarkMode = localStorage.getItem('darkMode') === 'true';
            if (savedDarkMode) {
                isDarkMode = true;
                document.body.classList.add('dark-mode');
                
                // Update toggle state
                const toggle = document.getElementById('theme-toggle');
                const slider = document.getElementById('theme-toggle-slider');
                if (toggle && slider) {
                    toggle.classList.remove('bg-interactive-secondary');
                    toggle.classList.add('bg-accent-primary');
                    slider.classList.remove('translate-x-1');
                    slider.classList.add('translate-x-6');
                }
            }
            
            // Auto-expand first accordion section
            const firstAccordion = document.querySelector('.accordion-content');
            const firstIcon = document.querySelector('.accordion-icon');
            if (firstAccordion && firstIcon) {
                firstAccordion.classList.add('open');
                firstIcon.classList.add('rotated');
            }
        });
    </script>
</body>
</html> 