<!-- Navigation -->
<nav class="fixed top-0 left-0 right-0 z-40 bg-surface-topbar/90 backdrop-blur-sm border-b border-border-primary/20">
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
                        <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name ?? '', 0, 1) }}</span>
                    </div>
                    <span class="hidden md:inline text-sm font-medium text-text-onDark">{{ Auth::user()->name ?? '' }}</span>
                    <svg class="w-4 h-4 ml-1 text-text-onDark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-56 bg-surface-card border border-border-primary rounded-xl shadow-lg z-50">
                    <div class="p-4 border-b border-border-primary">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-lg">{{ substr(Auth::user()->name ?? '', 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="text-base font-semibold text-text-primary">{{ Auth::user()->name ?? '' }}</p>
                                <p class="text-xs text-text-secondary">+{{ Auth::user()->phone ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <button class="w-full text-left px-4 py-2 text-sm text-text-primary hover:bg-gray-200 hover:text-gray-700 hover:font-bold rounded transition" data-translate-key="topnav_profile">Profile</button>
                    </div>
                    <div class="pb-2">
                        <button class="w-full text-left px-4 py-2 text-sm text-text-primary hover:bg-gray-200 hover:text-gray-700 hover:font-bold rounded transition" data-translate-key="topnav_setting">Setting</button>
                    </div>
                    <div class="py-2 border-t border-border-primary">
                        <button onclick="logout()" class="w-full text-left px-4 py-2 text-sm text-text-primary hover:bg-red-500 hover:text-white hover:font-bold rounded transition" data-translate-key="topnav_logout">Logout</button>
                    </div>
                    <div class="py-2 border-t border-border-primary">
                        <!-- Language Switcher -->
                        <div class="px-4 py-2">
                            <p class="text-xs text-text-secondary mb-2" data-translate-key="topnav_language">Language</p>
                            <div class="flex items-center border border-border-primary rounded-lg overflow-hidden">
                                <button onclick="setLanguage('id')" id="lang-id" class="gradient-bg text-white font-semibold px-3 py-2 text-sm flex-1">ID</button>
                                <button onclick="setLanguage('en')" id="lang-en" class="bg-interactive-secondary text-interactive-secondaryText hover:text-text-primary font-semibold px-3 py-2 text-sm flex-1 transition-colors">EN</button>
                            </div>
                        </div>
                        <!-- Dark/Light Mode Toggle -->
                        <div class="px-4 py-2">
                            <p class="text-xs text-text-secondary mb-2" data-translate-key="topnav_theme">Theme</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-text-primary" data-translate-key="topnav_dark_mode">Dark Mode</span>
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