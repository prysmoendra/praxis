<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praxis - Real Action, Your Digital Business</title>
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

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    {{-- <a href="#home" class="nav-link text-neutral-200 hover:text-white">Home</a> --}}
                    <a href="#about" class="nav-link text-neutral-200 hover:text-white">About</a>
                    <a href="#features" class="nav-link text-neutral-200 hover:text-white">Features</a>
                    <a href="#how-it-works" class="nav-link text-neutral-200 hover:text-white">How It Works</a>
                    <a href="#values" class="nav-link text-neutral-200 hover:text-white">Values</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center space-x-4">
                    <button onclick="openLoginModal()" class="border border-neutral-400 text-neutral-200 px-6 py-2 rounded-lg font-medium hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
                        Log In
                    </button>
                    <button class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:brightness-110 transition-all duration-200 transform hover:scale-105">
                        Start for free
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
                    <span class="gradient-text">Real Action,</span><br>
                    <span class="text-white">Your Digital Business</span>
                </h1>
                <p class="text-xl md:text-2xl text-neutral-200 mb-8 max-w-3xl mx-auto">
                    Praxis is an e-commerce builder platform specifically designed to assist MSMEs in building their own online stores with ease.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="scrollToSection('business-model')" class="gradient-bg text-white px-8 py-4 rounded-lg font-medium text-lg hover:brightness-110 transition-all duration-200 transform hover:scale-105">
                        Build Your Store
                    </button>
                    <button class="border border-neutral-400 text-neutral-200 px-8 py-4 rounded-lg font-medium text-lg hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
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
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">About Praxis</h2>
                <p class="text-xl text-neutral-200 max-w-4xl mx-auto">
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
                    <h3 class="text-xl font-semibold mb-4">Our Challenges</h3>
                    <ul class="text-neutral-300 space-y-2">
                        <li>• Limited access to technology</li>
                        <li>• Lack of technical knowledge</li>
                        <li>• High development costs</li>
                        <li>• Time-consuming processes</li>
                    </ul>
                </div>

                <!-- Mission Card -->
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Our Mission</h3>
                    <ul class="text-neutral-300 space-y-2">
                        <li>• Easy-to-use platform</li>
                        <li>• Practical education</li>
                        <li>• Affordable solutions</li>
                        <li>• Growth support</li>
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
                    <h3 class="text-xl font-semibold mb-4">Our Vision</h3>
                    <p class="text-neutral-300">
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
                    <h3 class="text-xl font-semibold mb-4">Our Values</h3>
                    <ul class="text-neutral-300 space-y-2">
                        <li>• Simplicity</li>
                        <li>• Inclusivity</li>
                        <li>• Collaboration</li>
                        <li>• Reliability</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section id="mission" class="py-20 bg-primary-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">From Challenge to Opportunity</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
                    We understand the hurdles MSMEs face. Our mission is to provide the solutions.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <h3 class="text-2xl font-semibold mb-6 text-white">The Challenges We Address</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300">Limited access to technology and resources.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300">Lack of technical and digital marketing knowledge.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300">High costs for site development and maintenance.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-orange mr-3 mt-1 text-xl">✗</span>
                            <span class="text-neutral-300">Time-consuming manual business processes.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <h3 class="text-2xl font-semibold mb-6 text-white">Our Mission in Action</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300">An all-in-one, no-code platform.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300">Practical education on digital marketing.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300">Affordable packages tailored to your scale.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-accent-green mr-3 mt-1 text-xl">✓</span>
                            <span class="text-neutral-300">Growth support through analytics and automation.</span>
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
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">Why Choose Praxis?</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
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
                    <h3 class="text-xl font-semibold mb-4">No-Code Solution</h3>
                    <p class="text-neutral-300">Build your online store without any technical knowledge. Our drag-and-drop interface makes it easy for anyone.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Affordable Pricing</h3>
                    <p class="text-neutral-300">Flexible pricing plans that grow with your business. Start free and upgrade when you're ready.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Analytics & Reports</h3>
                    <p class="text-neutral-300">Get detailed insights into your business performance with comprehensive analytics and actionable reports.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Mobile Responsive</h3>
                    <p class="text-neutral-300">Your store will look perfect on all devices. Mobile-first design ensures optimal customer experience.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">24/7 Support</h3>
                    <p class="text-neutral-300">Get help whenever you need it. Our dedicated support team is always ready to assist you.</p>
                </div>

                <div class="bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Secure Payments</h3>
                    <p class="text-neutral-300">Integrated payment gateways with bank-level security. Accept payments from various local and international methods.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-primary-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">How Praxis Works</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
                    Get your online store up and running in just a few simple steps.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">1</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">Register Account</h3>
                    <p class="text-neutral-300">Sign up and activate your account in just minutes with our simple registration process.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">2</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">Choose Template</h3>
                    <p class="text-neutral-300">Select from our collection of professional templates that suit your business needs.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">3</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">Add Products</h3>
                    <p class="text-neutral-300">Upload your products, organize categories, and integrate payment methods easily.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">4</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">Customize Store</h3>
                    <p class="text-neutral-300">Customize your store with your logo, colors, and promotional content to match your brand.</p>
                </div>

                <!-- Step 5 -->
                <div class="text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white font-bold text-xl">5</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">Go Live</h3>
                    <p class="text-neutral-300">Publish your store and manage orders and inventory from one centralized dashboard.</p>
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
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">Our Core Values</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
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
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-blue transition-colors duration-300">Simplicity</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300">Simplifying every step without technical jargon.</p>
                </div>

                <!-- Inclusivity -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-purple transition-colors duration-300">Inclusivity</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300">Empowering businesses of all sizes and backgrounds.</p>
                </div>

                <!-- Collaboration -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.3s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-green transition-colors duration-300">Collaboration</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300">Listening to user feedback for continuous innovation.</p>
                </div>

                <!-- Reliability -->
                <div class="value-card bg-primary-elevated border border-neutral-500 rounded-xl p-8 card-hover group animate-slide-up" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4 group-hover:text-accent-orange transition-colors duration-300">Reliability</h4>
                    <p class="text-neutral-300 group-hover:text-neutral-200 transition-colors duration-300">High uptime and full support to keep your store running.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Model Section -->
    <section id="business-model" class="py-20 bg-primary-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">Our Business Model</h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
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
            <h2 class="text-3xl md:text-5xl font-bold mb-6">
                Ready to Transform Your Business?
            </h2>
            <p class="text-xl text-neutral-200 mb-8 max-w-2xl mx-auto">
                With Praxis, your path to digital success is more focused, faster, and more affordable. Let's take concrete action together to build the future of your business.
            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="scrollToSection('business-model')" class="gradient-bg text-white px-8 py-4 rounded-lg font-medium text-lg hover:brightness-110 transition-all duration-200 transform hover:scale-105">
                        Start Your Free Trial
                    </button>
                    <button onclick="scrollToSection('business-model')" class="border border-neutral-400 text-neutral-200 px-8 py-4 rounded-lg font-medium text-lg hover:bg-neutral-400 hover:text-primary-dark transition-all duration-200">
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
                    <p class="text-neutral-200 mb-4 font-medium">Real Action, Your Digital Business</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">Empowering MSMEs to build successful online stores with ease and confidence. We believe that every business owner has great potential, and with practical technology, they can compete globally without losing their local identity.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#about" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">About Us</a></li>
                        <li><a href="#features" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Features</a></li>
                        <li><a href="#how-it-works" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">How It Works</a></li>
                        <li><a href="#pricing" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Pricing</a></li>
                        <li><a href="#contact" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">E-commerce Platform</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Training & Webinars</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Courier Integration</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Marketing Automation</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200 font-medium">Performance Reports</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Connect With Us</h4>
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
                        <h5 class="text-sm font-semibold mb-4 text-neutral-200">Follow Us</h5>
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
                        <span class="text-neutral-400 text-sm">&copy; {{ date('Y') }} Praxis. All Rights Reserved.</span>
                        <a href="#" class="text-neutral-400 hover:text-white text-sm transition-colors duration-200">Privacy Policy</a>
                        <a href="#" class="text-neutral-400 hover:text-white text-sm transition-colors duration-200">Terms of Service</a>
                        <a href="#" class="text-neutral-400 hover:text-white text-sm transition-colors duration-200">Cookie Policy</a>
                    </div>
                    <div class="flex items-center space-x-2">
                        <p class="text-neutral-400 text-sm">Made with <b class="text-red-600 font-extrabold">Dakode</b> in Bandung, West Java, Indonesia.</p>
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
                <h2 id="modal-title" class="text-lg font-bold text-gray-800 w-full text-center">
                    Login or Sign Up
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
                        <h1 class="text-2xl font-bold text-gray-800">Welcome to Praxis</h1>
                        <div class="flex flex-col gap-4">
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country/Region</label>
                                <div id="country" class="dropdown bg-gray-100 p-2 text-base border border-gray-300 rounded-lg pointer-events-none mt-1 px-4 py-[10px] text-gray-800">Indonesia (+62)</div>
                            </div>
                            <div>
                                <!-- Phone Number Field -->
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                                <div class="flex mt-1 w-full">
                                    <span class="justify-center inline-flex items-center px-2 text-lg border border-gray-300 bg-gray-100 rounded-l-lg w-[12%] font-medium text-gray-800">+62</span>
                                    <input type="tel" id="ex_phone" name="ex_phone" class="w-[88%] border border-gray-300 rounded-r-lg focus:border-black focus:ring-0 focus:ring-black focus:outline-none px-4 py-[10px] text-lg text-gray-800" oninput="formatPhoneNumber(this)" placeholder="Enter your phone number">
                                    <input type="hidden" id="phone" name="phone">
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" id="check-phone-button" class="w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:brightness-110 font-bold text-lg transition-all duration-200">Continue</button>
                            <button type="button" id="cancel-button" class="mr-2 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 hidden">Cancel</button>
                        </div>
                    </div>

                    {{-- boundary line --}}
                    <div class="flex flex-row justify-center items-center w-full">
                        <hr class="w-full my-0">
                        <h1 class="p-4 text-gray-500">or</h1>
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
                                <h1 class="font-bold text-gray-800">
                                    Continue with Google
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
                                <h1 class="font-bold text-gray-800">
                                    Continue with Facebook
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
                                <h1 class="font-bold text-gray-800">
                                    Continue with Apple
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
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">Selesaikan pendaftaran</h1>
                        <label for="signup-name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="signup-name" name="name" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="mb-4">
                        <label for="signup-phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <div class="flex mt-1 w-full">
                            <span class="justify-center inline-flex items-center px-2 text-lg border border-gray-300 bg-gray-100 rounded-l-lg w-[12%] font-medium">+62</span>
                            <input type="tel" id="signup-ex-phone" name="signup_ex_phone" class="w-[88%] border border-gray-300 rounded-r-lg focus:border-black focus:ring-0 focus:ring-black focus:outline-none px-4 py-[10px] text-lg" oninput="formatSignupPhoneNumber(this)" placeholder="Masukkan nomor telepon">
                            <input type="hidden" id="signup-phone" name="phone">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="signup-email" class="block text-sm font-medium text-gray-700 mb-2">Email (Opsional)</label>
                        <input type="email" id="signup-email" name="email" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Masukkan email (opsional)">
                    </div>
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-lg font-bold text-lg hover:brightness-110 transition-all duration-200">
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