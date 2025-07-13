<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate-key="page_title">Praxis - Real Action, Your Digital Business</title>
    <meta name="description" content="Praxis is an e-commerce builder platform specifically designed to assist MSMEs in building their own online stores.">
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
                        },
                        'custom-orange': '#F97316',
                        neutral: {
                            100: '#F0F6FC',
                            200: '#D0D7DE',
                            300: '#8B949E',
                            400: '#656D76',
                            500: '#484F58'
                        }
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'float': 'float 3s ease-in-out infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1F6FEB 0%, #8B5CF6 100%);
        }
        .gradient-text {
            background: linear-gradient(135deg, #58A6FF 0%, #8B5CF6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #58A6FF 0%, #8B5CF6 100%);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
    </style>
</head>
<body class="bg-primary-dark text-white font-inter antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 bg-primary-dark/40 backdrop-blur-sm border-b border-neutral-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#home" class="flex items-center">
                        <img src="/images/svg-praxis.png" alt="Praxis Logo" class="h-6 w-auto">
                    </a>
                </div>

                <!-- Desktop Navigation - Left Side -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#about" class="nav-link text-neutral-200 hover:text-white" data-translate-key="nav_about">Tentang Kami</a>
                    <a href="#features" class="nav-link text-neutral-200 hover:text-white" data-translate-key="nav_features">Fitur</a>
                    <a href="#how-it-works" class="nav-link text-neutral-200 hover:text-white" data-translate-key="nav_how_it_works">Cara Kerja</a>
                    <a href="#values" class="nav-link text-neutral-200 hover:text-white" data-translate-key="nav_values">Esensi</a>
                </div>

                <!-- Right Side - Language & CTA Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Language Switcher -->
                    <div class="flex items-center border border-neutral-500 rounded-lg overflow-hidden">
                        <a href="#" id="lang-id" class="gradient-bg text-white font-semibold px-3 py-2 text-sm">ID</a>
                        <a href="#" id="lang-en" class="bg-primary-elevated text-neutral-300 hover:text-white font-semibold px-3 py-2 text-sm transition-colors duration-200">EN</a>
                    </div>
                    
                    <button onclick="openLoginModal()" class="border border-neutral-400 text-neutral-200 px-6 py-2 rounded-lg font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200" data-translate-key="nav_login">
                        Masuk
                    </button>
                    <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200 transform hover:scale-105" data-translate-key="nav_start_free">
                        Mulai Gratis
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu fixed top-0 left-0 w-full h-full bg-primary-dark z-40 md:hidden">
            <div class="flex flex-col items-center justify-center h-full space-y-8">
                {{-- <a href="#home" class="text-xl text-neutral-200 hover:text-white" onclick="toggleMobileMenu()">Home</a> --}}
                <a href="#about" class="text-xl text-neutral-200 hover:text-white" onclick="toggleMobileMenu()">About</a>
                <a href="#features" class="text-xl text-neutral-200 hover:text-white" onclick="toggleMobileMenu()">Features</a>
                <a href="#how-it-works" class="text-xl text-neutral-200 hover:text-white" onclick="toggleMobileMenu()">How It Works</a>
                <a href="#values" class="text-xl text-neutral-200 hover:text-white" onclick="toggleMobileMenu()">Values</a>
                <button onclick="openLoginModal(); toggleMobileMenu()" class="border border-neutral-400 text-neutral-200 px-8 py-3 rounded-lg font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">Log In</button>
                <button class="gradient-bg text-white px-8 py-3 rounded-lg font-medium">Get Started</button>
            </div>
            <button class="absolute top-4 right-4 text-white" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-dark via-primary-surface to-primary-elevated"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6">
                    <span class="gradient-text" data-translate-key="hero_title_1">Real Action,</span><br>
                    <span class="text-white" data-translate-key="hero_title_2">Your Digital Business</span>
                </h1>
                <p class="text-xl md:text-2xl text-neutral-200 mb-8 max-w-3xl mx-auto" data-translate-key="hero_subtitle">
                    Praxis is an e-commerce builder platform specifically designed to assist MSMEs in building their own online stores with ease.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="scrollToSection('business-model')" class="gradient-bg text-white px-8 py-4 rounded-lg font-medium text-lg hover:brightness-110 transition-all duration-200 transform hover:scale-105" data-translate-key="hero_cta_1">
                        Build Your Store
                    </button>
                    <button class="border border-neutral-400 text-neutral-200 px-8 py-4 rounded-lg font-medium text-lg hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200" data-translate-key="hero_cta_2">
                        Watch Demo
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-accent-blue/20 rounded-full blur-xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-accent-purple/20 rounded-full blur-xl animate-float" style="animation-delay: 1s;"></div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-primary-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text" data-translate-key="about_title">About Praxis</h2>
                <p class="text-xl text-neutral-200 max-w-4xl mx-auto" data-translate-key="about_subtitle">
                    Praxis is more than just a tool; it's a partner ready to help you turn your ideas into reality. With an intuitive interface and step-by-step guides, we simplify the digitalization process for MSMEs.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Challenges Card -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="about_challenges_title">Our Challenges</h3>
                    <ul class="text-neutral-300 space-y-2">
                        <li data-translate-key="about_challenges_1">• Limited access to technology</li>
                        <li data-translate-key="about_challenges_2">• Lack of technical knowledge</li>
                        <li data-translate-key="about_challenges_3">• High development costs</li>
                        <li data-translate-key="about_challenges_4">• Time-consuming processes</li>
                    </ul>
                </div>

                <!-- Mission Card -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="about_mission_title">Our Mission</h3>
                    <ul class="text-neutral-300 space-y-2">
                        <li data-translate-key="about_mission_1">• Easy-to-use platform</li>
                        <li data-translate-key="about_mission_2">• Practical education</li>
                        <li data-translate-key="about_mission_3">• Affordable solutions</li>
                        <li data-translate-key="about_mission_4">• Growth support</li>
                    </ul>
                </div>

                <!-- Vision Card -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="about_vision_title">Our Vision</h3>
                    <p class="text-neutral-300" data-translate-key="about_vision_text">
                        To be the primary bridge for every MSME in Indonesia to access the digital market independently, inclusively, and sustainably.
                    </p>
                </div>

                <!-- Values Card -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="about_values_title">Our Values</h3>
                    <ul class="text-neutral-300 space-y-2">
                        <li data-translate-key="about_values_1">• Simplicity</li>
                        <li data-translate-key="about_values_2">• Inclusivity</li>
                        <li data-translate-key="about_values_3">• Collaboration</li>
                        <li data-translate-key="about_values_4">• Reliability</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section id="mission" class="py-20 bg-primary-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text" data-translate-key="mission_title">From Challenge to Opportunity</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto" data-translate-key="mission_subtitle">
                    We understand the hurdles MSMEs face. Our mission is to provide the solutions.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <h3 class="text-2xl font-semibold mb-6 text-white" data-translate-key="mission_challenges_title">The Challenges We Address</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300" data-translate-key="mission_challenges_1">Limited access to technology and resources.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300" data-translate-key="mission_challenges_2">Lack of technical and digital marketing knowledge.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300" data-translate-key="mission_challenges_3">High costs for site development and maintenance.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300" data-translate-key="mission_challenges_4">Time-consuming manual business processes.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <h3 class="text-2xl font-semibold mb-6 text-white" data-translate-key="mission_solutions_title">Our Mission in Action</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300" data-translate-key="mission_solutions_1">An all-in-one, no-code platform.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300" data-translate-key="mission_solutions_2">Practical education on digital marketing.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300" data-translate-key="mission_solutions_3">Affordable packages tailored to your scale.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300" data-translate-key="mission_solutions_4">Growth support through analytics and automation.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-primary-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text" data-translate-key="features_title">Why Choose Praxis?</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto" data-translate-key="features_subtitle">
                    Our comprehensive platform provides everything you need to build, manage, and grow your online business.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="features_no_code_title">No-Code Solution</h3>
                    <p class="text-neutral-300" data-translate-key="features_no_code_desc">Build your online store without any technical knowledge. Our drag-and-drop interface makes it easy for anyone.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="features_pricing_title">Affordable Pricing</h3>
                    <p class="text-neutral-300" data-translate-key="features_pricing_desc">Flexible pricing plans that grow with your business. Start free and upgrade when you're ready.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="features_analytics_title">Analytics & Reports</h3>
                    <p class="text-neutral-300" data-translate-key="features_analytics_desc">Get detailed insights into your business performance with comprehensive analytics and actionable reports.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="features_mobile_title">Mobile Responsive</h3>
                    <p class="text-neutral-300" data-translate-key="features_mobile_desc">Your store will look perfect on all devices. Mobile-first design ensures optimal customer experience.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="features_support_title">24/7 Support</h3>
                    <p class="text-neutral-300" data-translate-key="features_support_desc">Get help whenever you need it. Our dedicated support team is always ready to assist you.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4" data-translate-key="features_payments_title">Secure Payments</h3>
                    <p class="text-neutral-300" data-translate-key="features_payments_desc">Integrated payment gateways with bank-level security. Accept payments from various local and international methods.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-primary-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text" data-translate-key="how_it_works_title">How Praxis Works</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto" data-translate-key="how_it_works_subtitle">
                    Get your online store up and running in just a few simple steps.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">1</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4" data-translate-key="how_it_works_step1_title">Register Account</h3>
                    <p class="text-neutral-300" data-translate-key="how_it_works_step1_desc">Sign up and activate your account in just minutes with our simple registration process.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">2</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4" data-translate-key="how_it_works_step2_title">Choose Template</h3>
                    <p class="text-neutral-300" data-translate-key="how_it_works_step2_desc">Select from our collection of professional templates that suit your business needs.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">3</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4" data-translate-key="how_it_works_step3_title">Add Products</h3>
                    <p class="text-neutral-300" data-translate-key="how_it_works_step3_desc">Upload your products, organize categories, and integrate payment methods easily.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">4</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4" data-translate-key="how_it_works_step4_title">Customize Store</h3>
                    <p class="text-neutral-300" data-translate-key="how_it_works_step4_desc">Customize your store with your logo, colors, and promotional content to match your brand.</p>
                </div>

                <!-- Step 5 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">5</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4" data-translate-key="how_it_works_step5_title">Go Live</h3>
                    <p class="text-neutral-300" data-translate-key="how_it_works_step5_desc">Publish your store and manage orders and inventory from one centralized dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section id="values" class="py-20 bg-primary-dark relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-32 h-32 bg-accent-blue/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-40 h-40 bg-accent-purple/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-accent-green/10 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text" data-translate-key="values_title">Our Core Values</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto" data-translate-key="values_subtitle">
                    The principles that guide our innovation and partnership with you.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Simplicity -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.1s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-blue transition-colors duration-300" data-translate-key="values_simplicity_title">Simplicity</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300" data-translate-key="values_simplicity_desc">Simplifying every step without technical jargon.</p>
                </div>

                <!-- Inclusivity -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-purple transition-colors duration-300" data-translate-key="values_inclusivity_title">Inclusivity</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300" data-translate-key="values_inclusivity_desc">Empowering businesses of all sizes and backgrounds.</p>
                </div>

                <!-- Collaboration -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.3s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-green transition-colors duration-300" data-translate-key="values_collaboration_title">Collaboration</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300" data-translate-key="values_collaboration_desc">Listening to user feedback for continuous innovation.</p>
                </div>

                <!-- Reliability -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-orange transition-colors duration-300" data-translate-key="values_reliability_title">Reliability</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300" data-translate-key="values_reliability_desc">High uptime and full support to keep your store running.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Model Section -->
    <section id="business-model" class="py-20 bg-primary-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text" data-translate-key="business_model_title">Our Business Model</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto" data-translate-key="business_model_subtitle">
                    Flexible SaaS pricing with freemium and paid plans to suit every business size and budget.
                </p>
            </div>

            <!-- Business Model Details -->
            <div class="grid lg:grid-cols-5 gap-12 mb-16">
                <div class="lg:col-span-3">
                    <h3 class="text-2xl font-semibold text-white mb-6">Flexible Plans for Your Growth</h3>
                    <p class="text-lg text-neutral-200 mb-8">Our Software-as-a-Service (SaaS) model ensures you only pay for what you need. Start for free and upgrade as your business expands.</p>
                    <div class="space-y-6">
                        <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6 card-hover">
                            <h4 class="font-bold text-white mb-2">Freemium Plan</h4>
                            <p class="text-neutral-300">Try basic features for free. Perfect for getting started.</p>
                        </div>
                        <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6 card-hover">
                            <h4 class="font-bold text-white mb-2">Premium Plans</h4>
                            <p class="text-neutral-300">Unlock custom domains, in-depth analytics, and priority support.</p>
                        </div>
                        <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-6 card-hover">
                            <h4 class="font-bold text-white mb-2">Custom Services</h4>
                            <p class="text-neutral-300">For businesses requiring special integrations and additional features.</p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <h3 class="text-2xl font-semibold text-white mb-4">Additional Services</h3>
                    <p class="text-neutral-200 mb-6">Everything you need to optimize and scale.</p>
                    <ul class="space-y-4 text-neutral-300">
                        <li class="flex items-center">
                            <span class="text-accent-blue mr-3 text-lg">•</span>
                            Online training & webinars
                        </li>
                        <li class="flex items-center">
                            <span class="text-accent-blue mr-3 text-lg">•</span>
                            Local & international courier integration
                        </li>
                        <li class="flex items-center">
                            <span class="text-accent-blue mr-3 text-lg">•</span>
                            Automated email & social media marketing
                        </li>
                        <li class="flex items-center">
                            <span class="text-accent-blue mr-3 text-lg">•</span>
                            Complete sales performance reports
                        </li>
                    </ul>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">Freemium Plan</h3>
                        <p class="text-4xl font-bold gradient-text">Rp.0,-</p>
                        <p class="text-neutral-300">Perfect for getting started</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Community support
                        </li>
                    </ul>
                    <button class="w-full border border-neutral-400 text-neutral-200 py-3 rounded-lg font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
                        Get Started Free
                    </button>
                </div>

                <!-- Pro Plan -->
                <div class="bg-primary-elevated border-2 border-accent-blue rounded-xl p-8 card-hover relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="gradient-bg text-white px-4 py-2 rounded-full text-sm font-medium">Most Popular</span>
                    </div>
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">Premium Plan</h3>
                        <p class="text-4xl font-bold gradient-text">Rp.100.000,-</p>
                        <p class="text-neutral-300">Per month</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Everything in Free
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Unlimited products
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Custom domain
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Advanced analytics
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Priority support
                        </li>
                    </ul>
                    <button class="w-full gradient-bg text-white py-3 rounded-lg font-medium hover:brightness-110 transition-all duration-200">
                        Start Pro Plan
                    </button>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                        <p class="text-4xl font-bold gradient-text">Custom</p>
                        <p class="text-neutral-300">For large businesses</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Everything in Pro
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Custom integrations
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Dedicated support
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            White-label options
                        </li>
                        <li class="flex items-center text-neutral-300">
                            <svg class="w-5 h-5 text-accent-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            SLA guarantee
                        </li>
                    </ul>
                    <button class="w-full border border-neutral-400 text-neutral-200 py-3 rounded-lg font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
                        Contact Sales
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Services Section -->
    <section id="additional" class="py-20 bg-primary-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">Additional Services</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
                    Beyond our platform, we offer comprehensive services to help you succeed in the digital marketplace.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover text-center">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Training & Webinars</h3>
                    <p class="text-neutral-300">Online training sessions and webinars for sales optimization and digital marketing strategies.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover text-center">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Courier Integration</h3>
                    <p class="text-neutral-300">Seamless integration with local and international shipping couriers for efficient order fulfillment.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover text-center">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Marketing Automation</h3>
                    <p class="text-neutral-300">Automated marketing features via email and social media to help grow your customer base.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover text-center">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Performance Reports</h3>
                    <p class="text-neutral-300">Complete sales performance reports with actionable recommendations for business growth.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="py-20 bg-primary-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6" data-translate-key="cta_title">
                Ready to Transform Your Business?
            </h2>
            <p class="text-xl text-neutral-200 mb-8 max-w-2xl mx-auto" data-translate-key="cta_subtitle">
                With Praxis, your path to digital success is more focused, faster, and more affordable. Let's take concrete action together to build the future of your business.
            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="scrollToSection('business-model')" class="gradient-bg text-white px-8 py-4 rounded-lg font-medium text-lg hover:brightness-110 transition-all duration-200 transform hover:scale-105" data-translate-key="cta_trial_button">
                        Start Your Free Trial
                    </button>
                    <button onclick="scrollToSection('business-model')" class="border border-neutral-400 text-neutral-200 px-8 py-4 rounded-lg font-medium text-lg hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200" data-translate-key="cta_demo_button">
                        Schedule a Demo
                    </button>
                </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary-darker py-16 border-t border-neutral-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12">
                <!-- Company Info -->
                <div class="col-span-1">
                    <a href="#" class="flex items-center mb-6">
                    <img src="/images/svg-praxis.png" alt="Praxis Logo" class="h-8 w-auto">
                </a>
                    <p class="text-neutral-200 mb-4 font-medium" data-translate-key="footer_tagline">Real Action, Your Digital Business</p>
                    <p class="text-neutral-400 text-sm leading-relaxed" data-translate-key="footer_description">Empowering MSMEs to build successful online stores with ease and confidence. We believe that every business owner has great potential, and with practical technology, they can compete globally without losing their local identity.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white" data-translate-key="footer_quick_links_title">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#about" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_quick_links_about">About Us</a></li>
                        <li><a href="#features" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_quick_links_features">Features</a></li>
                        <li><a href="#how-it-works" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_quick_links_how_it_works">How It Works</a></li>
                        <li><a href="#pricing" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_quick_links_pricing">Pricing</a></li>
                        <li><a href="#contact" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_quick_links_contact">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white" data-translate-key="footer_services_title">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_services_platform">E-commerce Platform</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_services_training">Training & Webinars</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_services_courier">Courier Integration</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_services_marketing">Marketing Automation</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium" data-translate-key="footer_services_reports">Performance Reports</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white" data-translate-key="footer_connect_title">Connect With Us</h4>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-neutral-300 font-medium">kangmas@praxis.id</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <span class="text-neutral-300 font-medium">+62 81 1234 5678</span>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="mt-6">
                        <h5 class="text-sm font-semibold mb-4 text-neutral-200" data-translate-key="footer_follow_title">Follow Us</h5>
                        <div class="flex space-x-3">
                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/in/krismahendra/" target="_blank" rel="noopener noreferrer" class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center hover:brightness-110 transition-all duration-200 transform hover:scale-105 group">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">LinkedIn</span>
                            </a>
                            <!-- Instagram -->
                            <a href="https://www.instagram.com/dakode.id/" target="_blank" rel="noopener noreferrer" class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center hover:brightness-110 transition-all duration-200 transform hover:scale-105 group">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 3.25a5.25 5.25 0 1 1 0 10.5a5.25 5.25 0 0 1 0-10.5zm0 1.5a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5zm5.25.75a1 1 0 1 1-2 0a1 1 0 0 1 2 0z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Instagram</span>
                            </a>
                            <!-- Facebook -->
                            <a href="#" class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center hover:brightness-110 transition-all duration-200 transform hover:scale-105 group">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Facebook</span>
                            </a>
                            <!-- X/Twitter -->
                            <a href="#" class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center hover:brightness-110 transition-all duration-200 transform hover:scale-105 group">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">Twitter</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="mt-12 pt-8 border-t border-neutral-500">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-6">
                        <span class="text-neutral-400 text-sm" data-translate-key="footer_copyright">&copy; {{ date('Y') }} Praxis. All Rights Reserved.</span>
                        <a href="#" class="text-neutral-400 hover:text-white text-sm transition-colors duration-200" data-translate-key="footer_privacy">Privacy Policy</a>
                        <a href="#" class="text-neutral-400 hover:text-white text-sm transition-colors duration-200" data-translate-key="footer_terms">Terms of Service</a>
                        <a href="#" class="text-neutral-400 hover:text-white text-sm transition-colors duration-200" data-translate-key="footer_cookies">Cookie Policy</a>
                    </div>
                    <div class="flex items-center space-x-2">
                        <p class="text-neutral-400 text-sm"><span data-translate-key="footer_made_with">Made with</span> <b class="text-red-600 font-extrabold">Dakode</b> <span data-translate-key="footer_location">in Bandung, West Java, Indonesia.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="login-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-xl w-full max-w-lg mx-4 flex flex-col">
            <!-- Modal Header -->
            <div class="relative flex items-center border-b-2 h-16 px-6">
                <h2 id="modal-title" class="text-lg font-bold text-gray-800 w-full text-center" data-translate-key="modal_title">
                    Selamat Datang di Praxis
                </h2>
                <button onclick="closeLoginModal()" class="absolute right-4 text-gray-600 hover:text-gray-800 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="p-6">
                <form id="loginForm" action="" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <div class="flex flex-col gap-6">
                        <h1 class="text-2xl font-bold text-gray-800" data-translate-key="modal_welcome">Welcome to Praxis</h1>
                        <div class="flex flex-col gap-4">
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700" data-translate-key="modal_country">Negara/Wilayah</label>
                                <div id="country" class="dropdown bg-gray-100 p-2 text-base border border-gray-300 rounded-lg pointer-events-none mt-1 px-4 py-[10px] text-gray-800">Indonesia (+62)</div>
                            </div>
                            <div>
                                <!-- Phone Number Field -->
                                <label for="phone" class="block text-sm font-medium text-gray-700" data-translate-key="modal_phone">Nomor telepon</label>
                                <div class="flex mt-1 w-full">
                                    <span class="justify-center inline-flex items-center px-2 text-lg border border-gray-300 bg-gray-100 rounded-l-lg w-[12%] font-medium text-gray-800">+62</span>
                                    <input type="tel" id="ex_phone" name="ex_phone" class="w-[88%] border border-gray-300 rounded-r-lg focus:border-black focus:ring-0 focus:ring-black focus:outline-none px-4 py-[10px] text-lg text-gray-800" oninput="formatPhoneNumber(this)" placeholder="Masukkan nomor telepon" data-translate-key="modal_phone_placeholder">
                                    <input type="hidden" id="phone" name="phone">
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" id="check-phone-button" class="w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:brightness-110 font-bold text-lg transition-all duration-200" data-translate-key="modal_continue">Lanjutkan</button>
                            <button type="button" id="cancel-button" class="mr-2 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 hidden" data-translate-key="modal_cancel">Cancel</button>
                        </div>
                    </div>

                    {{-- boundary line --}}
                    <div class="flex flex-row justify-center items-center w-full">
                        <hr class="w-full my-0">
                        <h1 class="p-4 text-gray-500" data-translate-key="modal_or">atau</h1>
                        <hr class="w-full my-0">
                    </div>

                    {{-- Other Method Login --}}
                    <div class="flex flex-col gap-5">
                        {{-- google --}}
                        <div class="flex justify-center items-center w-full px-7 py-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 transition-all duration-200">
                            <div class="flex justify-start items-start w-fit">
                                <svg class="w-5 h-5" viewBox="0 0 24 24">
                                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                            </div>
                            <div class="flex justify-center items-center w-full">
                                <h1 class="font-bold text-gray-800" data-translate-key="modal_google">
                                    Lanjutkan dengan Google
                                </h1>
                            </div>
                            <div class=""></div>
                        </div>
                        {{-- facebook --}}
                        <div class="flex justify-center items-center w-full px-7 py-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 transition-all duration-200">
                            <div class="flex justify-start items-start w-fit">
                                <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </div>
                            <div class="flex justify-center items-center w-full">
                                <h1 class="font-bold text-gray-800" data-translate-key="modal_facebook">
                                    Lanjutkan dengan Facebook
                                </h1>
                            </div>
                            <div class=""></div>
                        </div>
                        {{-- apple --}}
                        <div class="flex justify-center items-center w-full px-7 py-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 transition-all duration-200">
                            <div class="flex justify-start items-start w-fit">
                                <svg class="w-5 h-5" fill="#000000" viewBox="0 0 24 24">
                                    <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                                </svg>
                            </div>
                            <div class="flex justify-center items-center w-full">
                                <h1 class="font-bold text-gray-800" data-translate-key="modal_apple">
                                    Lanjutkan dengan Apple
                                </h1>
                            </div>
                            <div class=""></div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Sign Up Form -->
            <div id="signup-form" class="p-6 hidden">
                <form id="signupForm" onsubmit="handleSignup(event)">
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold text-gray-800 mb-4" data-translate-key="modal_signup_title">Selesaikan pendaftaran</h1>
                        <label for="signup-name" class="block text-sm font-medium text-gray-700 mb-2" data-translate-key="modal_signup_name">Nama Lengkap</label>
                        <input type="text" id="signup-name" name="name" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Masukkan nama lengkap" data-translate-key="modal_signup_name_placeholder">
                    </div>
                    <div class="mb-4">
                        <label for="signup-phone" class="block text-sm font-medium text-gray-700 mb-2" data-translate-key="modal_signup_phone">Nomor Telepon</label>
                        <div class="flex mt-1 w-full">
                            <span class="justify-center inline-flex items-center px-2 text-lg border border-gray-300 bg-gray-100 rounded-l-lg w-[12%] font-medium">+62</span>
                            <input type="tel" id="signup-ex-phone" name="signup_ex_phone" class="w-[88%] border border-gray-300 rounded-r-lg focus:border-black focus:ring-0 focus:ring-black focus:outline-none px-4 py-[10px] text-lg" oninput="formatSignupPhoneNumber(this)" placeholder="Masukkan nomor telepon" data-translate-key="modal_signup_phone_placeholder">
                            <input type="hidden" id="signup-phone" name="phone">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="signup-email" class="block text-sm font-medium text-gray-700 mb-2" data-translate-key="modal_signup_email">Email (Opsional)</label>
                        <input type="email" id="signup-email" name="email" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Masukkan email (opsional)" data-translate-key="modal_signup_email_placeholder">
                    </div>
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-lg font-bold text-lg hover:brightness-110 transition-all duration-200" data-translate-key="modal_signup_button">
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for Mobile Menu -->
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.querySelector('.mobile-menu');
            mobileMenu.classList.toggle('active');
        }

        // Function to scroll to specific section
        function scrollToSection(sectionId) {
            const target = document.getElementById(sectionId);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.animate-fade-in, .animate-slide-up').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            observer.observe(el);
        });

        // Login Modal Functions
        function openLoginModal() {
            document.getElementById('login-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('login-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            // Reset forms
            document.getElementById('loginForm').reset();
            document.getElementById('signupForm').reset();
            // Show login form by default
            showLoginForm();
        }

        function showLoginForm() {
            document.getElementById('login-form').classList.remove('hidden');
            document.getElementById('signup-form').classList.add('hidden');
            document.getElementById('modal-title').textContent = 'Login or Sign Up';
        }

        function showSignupForm() {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('signup-form').classList.remove('hidden');
            document.getElementById('modal-title').textContent = 'Complete Registration';
        }

        function handleLogin(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const phone = formData.get('phone');

            // Simulate API call to check if user exists
            checkUserExists(phone);
        }

        function handleSignup(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const phone = formData.get('phone');
            const email = formData.get('email');

            // Simulate API call to create user
            createUser(name, phone, email);
        }

        function checkUserExists(phone) {
            // Simulate API call - in real app, this would be a fetch request
            console.log('Checking user:', phone);
            
            // For demo purposes, let's assume some phone numbers exist and others don't
            const existingPhones = ['628123456789', '628987654321', '628111222333'];
            
            if (existingPhones.includes(phone)) {
                // User exists - redirect to dashboard
                console.log('User exists, redirecting to dashboard...');
                window.location.href = '/dashboard';
            } else {
                // User doesn't exist - show signup form
                console.log('User does not exist, showing signup form...');
                showSignupForm();
                // Pre-fill the phone in signup form
                document.getElementById('signup-phone').value = phone;
            }
        }

        function createUser(name, phone, email) {
            // Simulate API call to create user
            console.log('Creating user:', { name, phone, email });
            
            // For demo purposes, simulate successful registration
            alert('Account created successfully! You can now login.');
            showLoginForm();
            // Pre-fill the phone number in login form
            const phoneWithoutPrefix = phone.replace('62', '');
            document.getElementById('ex_phone').value = phoneWithoutPrefix;
        }

        // Close modal when clicking outside
        document.getElementById('login-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLoginModal();
            }
        });

        // Language Switching Functionality
        document.addEventListener('DOMContentLoaded', () => {
            // 1. COMPREHENSIVE TRANSLATIONS DICTIONARY
            const translations = {
                id: {
                    // Page Meta
                    page_title: "Praxis - Aksi Nyata, Bisnis Digital Anda",
                    page_description: "Praxis adalah platform pembangun e-commerce yang dirancang khusus untuk membantu UMKM membangun toko online mereka sendiri.",
                    
                    // Navigation
                    nav_about: "Tentang Kami",
                    nav_features: "Fitur",
                    nav_how_it_works: "Cara Kerja",
                    nav_values: "Esensi",
                    nav_login: "Masuk",
                    nav_start_free: "Mulai Gratis",
                    
                    // Hero Section
                    hero_title_1: "Aksi Nyata,",
                    hero_title_2: "Bisnis Digital Anda",
                    hero_subtitle: "Praxis adalah platform pembangun e-commerce yang dirancang khusus untuk membantu UMKM membangun toko online mereka sendiri dengan mudah.",
                    hero_cta_1: "Buat Toko Anda",
                    hero_cta_2: "Tonton Demo",
                    
                    // About Section
                    about_title: "Tentang Praxis",
                    about_subtitle: "Praxis lebih dari sekadar alat; ini adalah mitra yang siap membantu Anda mewujudkan ide-ide Anda. Dengan antarmuka yang intuitif dan panduan langkah demi langkah, kami menyederhanakan proses digitalisasi untuk UMKM.",
                    about_challenges_title: "Tantangan Kami",
                    about_challenges_1: "• Akses teknologi yang terbatas",
                    about_challenges_2: "• Kurangnya pengetahuan teknis",
                    about_challenges_3: "• Biaya pengembangan yang tinggi",
                    about_challenges_4: "• Proses yang memakan waktu",
                    about_mission_title: "Misi Kami",
                    about_mission_1: "• Platform yang mudah digunakan",
                    about_mission_2: "• Pendidikan praktis",
                    about_mission_3: "• Solusi yang terjangkau",
                    about_mission_4: "• Dukungan pertumbuhan",
                    about_vision_title: "Visi Kami",
                    about_vision_text: "Menjadi jembatan utama bagi setiap UMKM di Indonesia untuk mengakses pasar digital secara mandiri, inklusif, dan berkelanjutan.",
                    about_values_title: "Nilai-Nilai Kami",
                    about_values_1: "• Kesederhanaan",
                    about_values_2: "• Inklusivitas",
                    about_values_3: "• Kolaborasi",
                    about_values_4: "• Keandalan",
                    
                    // Mission Section
                    mission_title: "Dari Tantangan ke Peluang",
                    mission_subtitle: "Kami memahami hambatan yang dihadapi UMKM. Misi kami adalah memberikan solusi.",
                    mission_challenges_title: "Tantangan yang Kami Atasi",
                    mission_challenges_1: "Akses teknologi dan sumber daya yang terbatas.",
                    mission_challenges_2: "Kurangnya pengetahuan teknis dan pemasaran digital.",
                    mission_challenges_3: "Biaya tinggi untuk pengembangan dan pemeliharaan situs.",
                    mission_challenges_4: "Proses bisnis manual yang memakan waktu.",
                    mission_solutions_title: "Misi Kami dalam Aksi",
                    mission_solutions_1: "Platform all-in-one tanpa kode.",
                    mission_solutions_2: "Pendidikan praktis tentang pemasaran digital.",
                    mission_solutions_3: "Paket terjangkau yang disesuaikan dengan skala Anda.",
                    mission_solutions_4: "Dukungan pertumbuhan melalui analitik dan otomatisasi.",
                    
                    // Features Section
                    features_title: "Mengapa Memilih Praxis?",
                    features_subtitle: "Platform komprehensif kami menyediakan semua yang Anda butuhkan untuk membangun, mengelola, dan mengembangkan bisnis online Anda.",
                    features_no_code_title: "Solusi Tanpa Kode",
                    features_no_code_desc: "Buat toko online Anda tanpa pengetahuan teknis. Antarmuka drag-and-drop kami memudahkan siapa saja.",
                    features_pricing_title: "Harga Terjangkau",
                    features_pricing_desc: "Paket harga fleksibel yang berkembang bersama bisnis Anda. Mulai gratis dan upgrade saat Anda siap.",
                    features_analytics_title: "Analitik & Laporan",
                    features_analytics_desc: "Dapatkan wawasan mendalam tentang kinerja bisnis Anda dengan analitik komprehensif dan laporan yang dapat ditindaklanjuti.",
                    features_mobile_title: "Responsif Mobile",
                    features_mobile_desc: "Toko Anda akan terlihat sempurna di semua perangkat. Desain mobile-first memastikan pengalaman pelanggan yang optimal.",
                    features_support_title: "Dukungan 24/7",
                    features_support_desc: "Dapatkan bantuan kapan pun Anda membutuhkannya. Tim dukungan kami selalu siap membantu Anda.",
                    features_payments_title: "Pembayaran Aman",
                    features_payments_desc: "Gateway pembayaran terintegrasi dengan keamanan tingkat bank. Terima pembayaran dari berbagai metode lokal dan internasional.",
                    
                    // How It Works Section
                    how_it_works_title: "Cara Kerja Praxis",
                    how_it_works_subtitle: "Dapatkan toko online Anda berjalan hanya dalam beberapa langkah sederhana.",
                    how_it_works_step1_title: "Daftar Akun",
                    how_it_works_step1_desc: "Daftar dan aktifkan akun Anda hanya dalam beberapa menit dengan proses pendaftaran sederhana kami.",
                    how_it_works_step2_title: "Pilih Template",
                    how_it_works_step2_desc: "Pilih dari koleksi template profesional kami yang sesuai dengan kebutuhan bisnis Anda.",
                    how_it_works_step3_title: "Tambah Produk",
                    how_it_works_step3_desc: "Upload produk Anda, atur kategori, dan integrasikan metode pembayaran dengan mudah.",
                    how_it_works_step4_title: "Sesuaikan Toko",
                    how_it_works_step4_desc: "Sesuaikan toko Anda dengan logo, warna, dan konten promosi untuk mencocokkan merek Anda.",
                    how_it_works_step5_title: "Go Live",
                    how_it_works_step5_desc: "Publikasikan toko Anda dan kelola pesanan serta inventaris dari satu dashboard terpusat.",
                    
                    // Core Values Section
                    values_title: "Nilai-Nilai Inti Kami",
                    values_subtitle: "Prinsip-prinsip yang memandu inovasi dan kemitraan kami dengan Anda.",
                    values_simplicity_title: "Kesederhanaan",
                    values_simplicity_desc: "Menyederhanakan setiap langkah tanpa jargon teknis.",
                    values_inclusivity_title: "Inklusivitas",
                    values_inclusivity_desc: "Memberdayakan bisnis dari semua ukuran dan latar belakang.",
                    values_collaboration_title: "Kolaborasi",
                    values_collaboration_desc: "Mendengarkan umpan balik pengguna untuk inovasi berkelanjutan.",
                    values_reliability_title: "Keandalan",
                    values_reliability_desc: "Uptime tinggi dan dukungan penuh untuk menjaga toko Anda tetap berjalan.",
                    
                    // Business Model Section
                    business_model_title: "Model Bisnis Kami",
                    business_model_subtitle: "Pricing SaaS fleksibel dengan paket freemium dan berbayar untuk menyesuaikan setiap ukuran dan anggaran bisnis.",
                    business_model_plans_title: "Paket Fleksibel untuk Pertumbuhan Anda",
                    business_model_plans_desc: "Model Software-as-a-Service (SaaS) kami memastikan Anda hanya membayar apa yang Anda butuhkan. Mulai gratis dan upgrade saat bisnis Anda berkembang.",
                    business_model_freemium_title: "Paket Freemium",
                    business_model_freemium_desc: "Coba fitur dasar gratis. Sempurna untuk memulai.",
                    business_model_premium_title: "Paket Premium",
                    business_model_premium_desc: "Buka domain kustom, analitik mendalam, dan dukungan prioritas.",
                    business_model_custom_title: "Layanan Kustom",
                    business_model_custom_desc: "Untuk bisnis yang memerlukan integrasi khusus dan fitur tambahan.",
                    business_model_services_title: "Layanan Tambahan",
                    business_model_services_desc: "Semua yang Anda butuhkan untuk mengoptimalkan dan menskalakan.",
                    business_model_services_1: "Pelatihan online & webinar",
                    business_model_services_2: "Integrasi kurir lokal & internasional",
                    business_model_services_3: "Pemasaran email & media sosial otomatis",
                    business_model_services_4: "Laporan kinerja penjualan lengkap",
                    business_model_free_plan_title: "Paket Freemium",
                    business_model_free_plan_price: "Rp.0,-",
                    business_model_free_plan_desc: "Sempurna untuk memulai",
                    business_model_free_plan_feature: "Dukungan komunitas",
                    business_model_free_plan_cta: "Mulai Gratis",
                    business_model_pro_plan_title: "Paket Premium",
                    business_model_pro_plan_price: "Rp.100.000,-",
                    business_model_pro_plan_period: "Per bulan",
                    business_model_pro_plan_popular: "Paling Populer",
                    business_model_pro_plan_feature1: "Semua fitur Free",
                    business_model_pro_plan_feature2: "Produk tak terbatas",
                    business_model_pro_plan_feature3: "Domain kustom",
                    business_model_pro_plan_feature4: "Analitik lanjutan",
                    business_model_pro_plan_feature5: "Dukungan prioritas",
                    business_model_pro_plan_cta: "Mulai Paket Pro",
                    business_model_enterprise_title: "Enterprise",
                    business_model_enterprise_price: "Kustom",
                    business_model_enterprise_desc: "Untuk bisnis besar",
                    business_model_enterprise_feature1: "Semua fitur Pro",
                    business_model_enterprise_feature2: "Integrasi kustom",
                    business_model_enterprise_feature3: "Dukungan khusus",
                    business_model_enterprise_feature4: "Opsi white-label",
                    business_model_enterprise_feature5: "Jaminan SLA",
                    business_model_enterprise_cta: "Hubungi Penjualan",
                    
                    // Additional Services Section
                    additional_services_title: "Layanan Tambahan",
                    additional_services_subtitle: "Di luar platform kami, kami menawarkan layanan komprehensif untuk membantu Anda sukses di pasar digital.",
                    additional_services_training_title: "Pelatihan & Webinar",
                    additional_services_training_desc: "Sesi pelatihan online dan webinar untuk optimasi penjualan dan strategi pemasaran digital.",
                    additional_services_courier_title: "Integrasi Kurir",
                    additional_services_courier_desc: "Integrasi mulus dengan kurir pengiriman lokal dan internasional untuk pemenuhan pesanan yang efisien.",
                    additional_services_marketing_title: "Otomatisasi Pemasaran",
                    additional_services_marketing_desc: "Fitur pemasaran otomatis melalui email dan media sosial untuk membantu mengembangkan basis pelanggan Anda.",
                    additional_services_reports_title: "Laporan Kinerja",
                    additional_services_reports_desc: "Laporan kinerja penjualan lengkap dengan rekomendasi yang dapat ditindaklanjuti untuk pertumbuhan bisnis.",
                    
                    // CTA Section
                    cta_title: "Siap Mengubah Bisnis Anda?",
                    cta_subtitle: "Dengan Praxis, jalan menuju kesuksesan digital Anda lebih fokus, lebih cepat, dan lebih terjangkau. Mari kita ambil aksi nyata bersama untuk membangun masa depan bisnis Anda.",
                    cta_trial_button: "Mulai Uji Coba Gratis",
                    cta_demo_button: "Jadwalkan Demo",
                    
                    // Footer Section
                    footer_tagline: "Aksi Nyata, Bisnis Digital Anda",
                    footer_description: "Memberdayakan UMKM untuk membangun toko online yang sukses dengan mudah dan percaya diri. Kami percaya bahwa setiap pemilik bisnis memiliki potensi besar, dan dengan teknologi praktis, mereka dapat bersaing secara global tanpa kehilangan identitas lokal mereka.",
                    footer_quick_links_title: "Tautan Cepat",
                    footer_quick_links_about: "Tentang Kami",
                    footer_quick_links_features: "Fitur",
                    footer_quick_links_how_it_works: "Cara Kerja",
                    footer_quick_links_pricing: "Harga",
                    footer_quick_links_contact: "Kontak",
                    footer_services_title: "Layanan",
                    footer_services_platform: "Platform E-commerce",
                    footer_services_training: "Pelatihan & Webinar",
                    footer_services_courier: "Integrasi Kurir",
                    footer_services_marketing: "Otomatisasi Pemasaran",
                    footer_services_reports: "Laporan Kinerja",
                    footer_connect_title: "Terhubung Dengan Kami",
                    footer_follow_title: "Ikuti Kami",
                    footer_copyright: "© {{ date('Y') }} Praxis. Semua Hak Dilindungi.",
                    footer_privacy: "Kebijakan Privasi",
                    footer_terms: "Ketentuan Layanan",
                    footer_cookies: "Kebijakan Cookie",
                    footer_made_with: "Dibuat dengan",
                    footer_location: "di Bandung, Jawa Barat, Indonesia.",
                    
                    // Modal Section
                    modal_title: "Selamat Datang di Praxis",
                    modal_welcome: "Selamat Datang di Praxis",
                    modal_country: "Negara/Wilayah",
                    modal_phone: "Nomor telepon",
                    modal_phone_placeholder: "Masukkan nomor telepon",
                    modal_continue: "Lanjutkan",
                    modal_or: "atau",
                    modal_google: "Lanjutkan dengan Google",
                    modal_facebook: "Lanjutkan dengan Facebook",
                    modal_apple: "Lanjutkan dengan Apple",
                    modal_signup_title: "Selesaikan pendaftaran",
                    modal_signup_name: "Nama Lengkap",
                    modal_signup_name_placeholder: "Masukkan nama lengkap",
                    modal_signup_phone: "Nomor Telepon",
                    modal_signup_phone_placeholder: "Masukkan nomor telepon",
                    modal_signup_email: "Email (Opsional)",
                    modal_signup_email_placeholder: "Masukkan email (opsional)",
                    modal_signup_button: "Daftar",
                    modal_cancel: "Batal"
                },
                en: {
                    // Page Meta
                    page_title: "Praxis - Real Action, Your Digital Business",
                    page_description: "Praxis is an e-commerce builder platform specifically designed to assist MSMEs in building their own online stores.",
                    
                    // Navigation
                    nav_about: "About",
                    nav_features: "Features",
                    nav_how_it_works: "How It Works",
                    nav_values: "Values",
                    nav_login: "Log In",
                    nav_start_free: "Start for free",
                    
                    // Hero Section
                    hero_title_1: "Real Action,",
                    hero_title_2: "Your Digital Business",
                    hero_subtitle: "Praxis is an e-commerce builder platform specifically designed to assist MSMEs in building their own online stores with ease.",
                    hero_cta_1: "Build Your Store",
                    hero_cta_2: "Watch Demo",
                    
                    // About Section
                    about_title: "About Praxis",
                    about_subtitle: "Praxis is more than just a tool; it's a partner ready to help you turn your ideas into reality. With an intuitive interface and step-by-step guides, we simplify the digitalization process for MSMEs.",
                    about_challenges_title: "Our Challenges",
                    about_challenges_1: "• Limited access to technology",
                    about_challenges_2: "• Lack of technical knowledge",
                    about_challenges_3: "• High development costs",
                    about_challenges_4: "• Time-consuming processes",
                    about_mission_title: "Our Mission",
                    about_mission_1: "• Easy-to-use platform",
                    about_mission_2: "• Practical education",
                    about_mission_3: "• Affordable solutions",
                    about_mission_4: "• Growth support",
                    about_vision_title: "Our Vision",
                    about_vision_text: "To be the primary bridge for every MSME in Indonesia to access the digital market independently, inclusively, and sustainably.",
                    about_values_title: "Our Values",
                    about_values_1: "• Simplicity",
                    about_values_2: "• Inclusivity",
                    about_values_3: "• Collaboration",
                    about_values_4: "• Reliability",
                    
                    // Mission Section
                    mission_title: "From Challenge to Opportunity",
                    mission_subtitle: "We understand the hurdles MSMEs face. Our mission is to provide the solutions.",
                    mission_challenges_title: "The Challenges We Address",
                    mission_challenges_1: "Limited access to technology and resources.",
                    mission_challenges_2: "Lack of technical and digital marketing knowledge.",
                    mission_challenges_3: "High costs for site development and maintenance.",
                    mission_challenges_4: "Time-consuming manual business processes.",
                    mission_solutions_title: "Our Mission in Action",
                    mission_solutions_1: "An all-in-one, no-code platform.",
                    mission_solutions_2: "Practical education on digital marketing.",
                    mission_solutions_3: "Affordable packages tailored to your scale.",
                    mission_solutions_4: "Growth support through analytics and automation.",
                    
                    // Features Section
                    features_title: "Why Choose Praxis?",
                    features_subtitle: "Our comprehensive platform provides everything you need to build, manage, and grow your online business.",
                    features_no_code_title: "No-Code Solution",
                    features_no_code_desc: "Build your online store without any technical knowledge. Our drag-and-drop interface makes it easy for anyone.",
                    features_pricing_title: "Affordable Pricing",
                    features_pricing_desc: "Flexible pricing plans that grow with your business. Start free and upgrade when you're ready.",
                    features_analytics_title: "Analytics & Reports",
                    features_analytics_desc: "Get detailed insights into your business performance with comprehensive analytics and actionable reports.",
                    features_mobile_title: "Mobile Responsive",
                    features_mobile_desc: "Your store will look perfect on all devices. Mobile-first design ensures optimal customer experience.",
                    features_support_title: "24/7 Support",
                    features_support_desc: "Get help whenever you need it. Our dedicated support team is always ready to assist you.",
                    features_payments_title: "Secure Payments",
                    features_payments_desc: "Integrated payment gateways with bank-level security. Accept payments from various local and international methods.",
                    
                    // How It Works Section
                    how_it_works_title: "How Praxis Works",
                    how_it_works_subtitle: "Get your online store up and running in just a few simple steps.",
                    how_it_works_step1_title: "Register Account",
                    how_it_works_step1_desc: "Sign up and activate your account in just minutes with our simple registration process.",
                    how_it_works_step2_title: "Choose Template",
                    how_it_works_step2_desc: "Select from our collection of professional templates that suit your business needs.",
                    how_it_works_step3_title: "Add Products",
                    how_it_works_step3_desc: "Upload your products, organize categories, and integrate payment methods easily.",
                    how_it_works_step4_title: "Customize Store",
                    how_it_works_step4_desc: "Customize your store with your logo, colors, and promotional content to match your brand.",
                    how_it_works_step5_title: "Go Live",
                    how_it_works_step5_desc: "Publish your store and manage orders and inventory from one centralized dashboard.",
                    
                    // Core Values Section
                    values_title: "Our Core Values",
                    values_subtitle: "The principles that guide our innovation and partnership with you.",
                    values_simplicity_title: "Simplicity",
                    values_simplicity_desc: "Simplifying every step without technical jargon.",
                    values_inclusivity_title: "Inclusivity",
                    values_inclusivity_desc: "Empowering businesses of all sizes and backgrounds.",
                    values_collaboration_title: "Collaboration",
                    values_collaboration_desc: "Listening to user feedback for continuous innovation.",
                    values_reliability_title: "Reliability",
                    values_reliability_desc: "High uptime and full support to keep your store running.",
                    
                    // Business Model Section
                    business_model_title: "Our Business Model",
                    business_model_subtitle: "Flexible SaaS pricing with freemium and paid plans to suit every business size and budget.",
                    business_model_plans_title: "Flexible Plans for Your Growth",
                    business_model_plans_desc: "Our Software-as-a-Service (SaaS) model ensures you only pay for what you need. Start for free and upgrade as your business expands.",
                    business_model_freemium_title: "Freemium Plan",
                    business_model_freemium_desc: "Try basic features for free. Perfect for getting started.",
                    business_model_premium_title: "Premium Plans",
                    business_model_premium_desc: "Unlock custom domains, in-depth analytics, and priority support.",
                    business_model_custom_title: "Custom Services",
                    business_model_custom_desc: "For businesses requiring special integrations and additional features.",
                    business_model_services_title: "Additional Services",
                    business_model_services_desc: "Everything you need to optimize and scale.",
                    business_model_services_1: "Online training & webinars",
                    business_model_services_2: "Local & international courier integration",
                    business_model_services_3: "Automated email & social media marketing",
                    business_model_services_4: "Complete sales performance reports",
                    business_model_free_plan_title: "Freemium Plan",
                    business_model_free_plan_price: "Rp.0,-",
                    business_model_free_plan_desc: "Perfect for getting started",
                    business_model_free_plan_feature: "Community support",
                    business_model_free_plan_cta: "Get Started Free",
                    business_model_pro_plan_title: "Premium Plan",
                    business_model_pro_plan_price: "Rp.100.000,-",
                    business_model_pro_plan_period: "Per month",
                    business_model_pro_plan_popular: "Most Popular",
                    business_model_pro_plan_feature1: "Everything in Free",
                    business_model_pro_plan_feature2: "Unlimited products",
                    business_model_pro_plan_feature3: "Custom domain",
                    business_model_pro_plan_feature4: "Advanced analytics",
                    business_model_pro_plan_feature5: "Priority support",
                    business_model_pro_plan_cta: "Start Pro Plan",
                    business_model_enterprise_title: "Enterprise",
                    business_model_enterprise_price: "Custom",
                    business_model_enterprise_desc: "For large businesses",
                    business_model_enterprise_feature1: "Everything in Pro",
                    business_model_enterprise_feature2: "Custom integrations",
                    business_model_enterprise_feature3: "Dedicated support",
                    business_model_enterprise_feature4: "White-label options",
                    business_model_enterprise_feature5: "SLA guarantee",
                    business_model_enterprise_cta: "Contact Sales",
                    
                    // Additional Services Section
                    additional_services_title: "Additional Services",
                    additional_services_subtitle: "Beyond our platform, we offer comprehensive services to help you succeed in the digital marketplace.",
                    additional_services_training_title: "Training & Webinars",
                    additional_services_training_desc: "Online training sessions and webinars for sales optimization and digital marketing strategies.",
                    additional_services_courier_title: "Courier Integration",
                    additional_services_courier_desc: "Seamless integration with local and international shipping couriers for efficient order fulfillment.",
                    additional_services_marketing_title: "Marketing Automation",
                    additional_services_marketing_desc: "Automated marketing features via email and social media to help grow your customer base.",
                    additional_services_reports_title: "Performance Reports",
                    additional_services_reports_desc: "Complete sales performance reports with actionable recommendations for business growth.",
                    
                    // CTA Section
                    cta_title: "Ready to Transform Your Business?",
                    cta_subtitle: "With Praxis, your path to digital success is more focused, faster, and more affordable. Let's take concrete action together to build the future of your business.",
                    cta_trial_button: "Start Your Free Trial",
                    cta_demo_button: "Schedule a Demo",
                    
                    // Footer Section
                    footer_tagline: "Real Action, Your Digital Business",
                    footer_description: "Empowering MSMEs to build successful online stores with ease and confidence. We believe that every business owner has great potential, and with practical technology, they can compete globally without losing their local identity.",
                    footer_quick_links_title: "Quick Links",
                    footer_quick_links_about: "About Us",
                    footer_quick_links_features: "Features",
                    footer_quick_links_how_it_works: "How It Works",
                    footer_quick_links_pricing: "Pricing",
                    footer_quick_links_contact: "Contact",
                    footer_services_title: "Services",
                    footer_services_platform: "E-commerce Platform",
                    footer_services_training: "Training & Webinars",
                    footer_services_courier: "Courier Integration",
                    footer_services_marketing: "Marketing Automation",
                    footer_services_reports: "Performance Reports",
                    footer_connect_title: "Connect With Us",
                    footer_follow_title: "Follow Us",
                    footer_copyright: "© {{ date('Y') }} Praxis. All Rights Reserved.",
                    footer_privacy: "Privacy Policy",
                    footer_terms: "Terms of Service",
                    footer_cookies: "Cookie Policy",
                    footer_made_with: "Made with",
                    footer_location: "in Bandung, West Java, Indonesia.",
                    
                    // Modal Section
                    modal_title: "Welcome to Praxis",
                    modal_welcome: "Welcome to Praxis",
                    modal_country: "Country/Region",
                    modal_phone: "Phone number",
                    modal_phone_placeholder: "Enter your phone number",
                    modal_continue: "Continue",
                    modal_or: "or",
                    modal_google: "Continue with Google",
                    modal_facebook: "Continue with Facebook",
                    modal_apple: "Continue with Apple",
                    modal_signup_title: "Complete registration",
                    modal_signup_name: "Full Name",
                    modal_signup_name_placeholder: "Enter your full name",
                    modal_signup_phone: "Phone Number",
                    modal_signup_phone_placeholder: "Enter your phone number",
                    modal_signup_email: "Email (Optional)",
                    modal_signup_email_placeholder: "Enter your email (optional)",
                    modal_signup_button: "Sign Up",
                    modal_cancel: "Cancel"
                }
            };

            // Get language buttons
            const langIdButton = document.getElementById('lang-id');
            const langEnButton = document.getElementById('lang-en');

            // 2. FUNCTION TO SET LANGUAGE AND UPDATE UI
            const setLanguage = (lang) => {
                // Apply translations to all elements with data-translate-key attribute
                document.querySelectorAll('[data-translate-key]').forEach(element => {
                    const key = element.getAttribute('data-translate-key');
                    const translation = translations[lang][key];

                    if (translation !== undefined) {
                        // Check if element is input and key is for placeholder
                        if (element.tagName === 'INPUT' && key.includes('placeholder')) {
                            element.placeholder = translation;
                        } else {
                            // Use innerHTML to render HTML tags like <span>
                            element.innerHTML = translation;
                        }
                    }
                });

                // Update language button styles
                if (lang === 'id') {
                    langIdButton.classList.remove('bg-primary-elevated', 'text-neutral-300', 'hover:text-white');
                    langIdButton.classList.add('gradient-bg', 'text-white');
                    langEnButton.classList.remove('gradient-bg', 'text-white');
                    langEnButton.classList.add('bg-primary-elevated', 'text-neutral-300', 'hover:text-white');
                } else {
                    langEnButton.classList.remove('bg-primary-elevated', 'text-neutral-300', 'hover:text-white');
                    langEnButton.classList.add('gradient-bg', 'text-white');
                    langIdButton.classList.remove('gradient-bg', 'text-white');
                    langIdButton.classList.add('bg-primary-elevated', 'text-neutral-300', 'hover:text-white');
                }

                // Save language preference in localStorage
                localStorage.setItem('language', lang);
                document.documentElement.lang = lang; // Update lang attribute in <html> tag
            };

            // 3. EVENT LISTENERS FOR LANGUAGE BUTTONS
            langIdButton.addEventListener('click', (e) => {
                e.preventDefault();
                setLanguage('id');
            });

            langEnButton.addEventListener('click', (e) => {
                e.preventDefault();
                setLanguage('en');
            });

            // 4. SET INITIAL LANGUAGE WHEN PAGE LOADS
            const savedLang = localStorage.getItem('language') || 'id'; // Default to 'id' if none saved
            setLanguage(savedLang);
        });

        // Phone number formatting function
        function formatPhoneNumber(input) {
            // Remove all non-digit characters
            let value = input.value.replace(/\D/g, '');
            
            // Auto-replace "08" with "628"
            if (value.startsWith('08')) {
                value = '8' + value.substring(2);
            }
            if (value.startsWith('628')) {
                value = '8' + value.substring(3);
            }
            
            // Update the input value
            input.value = value;

            const fullPhoneNumber = '62' + value;
            document.getElementById('phone').value = fullPhoneNumber;
        }

        // Signup phone number formatting function
        function formatSignupPhoneNumber(input) {
            // Remove all non-digit characters
            let value = input.value.replace(/\D/g, '');
            
            // Auto-replace "08" with "628"
            if (value.startsWith('08')) {
                value = '8' + value.substring(2);
            }
            if (value.startsWith('628')) {
                value = '8' + value.substring(3);
            }
            
            // Update the input value
            input.value = value;

            const fullPhoneNumber = '62' + value;
            document.getElementById('signup-phone').value = fullPhoneNumber;
        }
    </script>
</body>
</html>