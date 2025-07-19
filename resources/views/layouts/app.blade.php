<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Praxis Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: { main: '#F1F2F4' },
                        surface: { sidebar: '#FFFFFF', card: '#FFFFFF', popover: '#FFFFFF', topbar: '#1A1C1D' },
                        text: { primary: '#1A1C1D', secondary: '#6D7175', onDark: '#E3E5E7' },
                        interactive: { primary: '#2C6ECB', primaryText: '#FFFFFF', secondary: '#E3E5E7', secondaryText: '#1A1C1D', tertiary: 'transparent', tertiaryText: '#1A1C1D' },
                        border: { primary: '#E1E3E5', interactive: '#8C9196' },
                        accent: { primary: '#47803C' }
                    },
                    fontFamily: {
                        'inter': ['Inter', '-apple-system', 'BlinkMacSystemFont', 'San Francisco', 'Segoe UI', 'Helvetica Neue', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg { background: linear-gradient(135deg, #1F6FEB 0%, #8B5CF6 100%); }
        .gradient-text { background: linear-gradient(135deg, #58A6FF 0%, #8B5CF6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .accordion-content { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; }
        .accordion-content.open { max-height: 1000px; transition: max-height 0.3s ease-in; }
        .accordion-icon { transition: transform 0.3s ease; }
        .accordion-icon.rotated { transform: rotate(180deg); }
        .dark-mode { background-color: #161B22 !important; color: white !important; }
        .dark-mode .min-h-screen { background-color: #0D1117 !important; }
        .dark-mode nav { background-color: rgba(13, 17, 23, 0.9) !important; backdrop-filter: blur(8px) !important; border-color: rgba(107, 114, 128, 0.2) !important; }
        .dark-mode .bg-surface-card { background-color: #21262D !important; border-color: #6B7280 !important; }
        .dark-mode .text-text-primary { color: white !important; }
        .dark-mode .text-text-secondary { color: #D1D5DB !important; }
        .dark-mode .border-border-primary { border-color: #6B7280 !important; }
        .dark-mode .bg-background-main { background-color: #0D1117 !important; }
        .accordion-trigger { transition: all 0.2s ease-in-out; }
        .accordion-trigger:hover { background-color: #F1F2F4 !important; transform: translateY(-1px); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        .dark-mode .accordion-trigger:hover { background-color: #2D3748 !important; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); }
        .action-btn-primary { transition: all 0.2s ease-in-out; }
        .action-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 8px rgba(44, 110, 203, 0.3); }
        .action-btn-secondary { transition: all 0.2s ease-in-out; }
        .action-btn-secondary:hover { transform: translateY(-1px); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #E5E7EB !important; }
        .dark-mode .action-btn-secondary:hover { background-color: #374151 !important; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); }
    </style>
    @stack('head')
</head>
<body class="bg-background-main text-text-primary font-inter antialiased">
    <div class="flex">
        @include('layouts.sidebar')
        <div class="flex-1 ml-64 min-h-screen pt-16">
            @include('layouts.topnav')
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
    <script>
        // Seluruh script JS dari dashboard lama (logout, language, dark mode, accordion, dsb)
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
            document.body.classList.toggle('bg-background-main');
            document.body.classList.toggle('bg-primary-dark');
            document.body.classList.toggle('text-white');
            document.body.classList.toggle('text-text-primary');
        }
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
                dashboard_setup_pos: 'Atur POS',
                // Sidebar
                sidebar_home: 'Beranda',
                sidebar_orders: 'Pesanan',
                sidebar_products: 'Produk',
                sidebar_customers: 'Pelanggan',
                sidebar_marketing: 'Pemasaran',
                sidebar_discounts: 'Diskon',
                sidebar_content: 'Konten',
                sidebar_markets: 'Pasar',
                sidebar_analytics: 'Analitik',
                sidebar_sales_channels: 'Saluran Penjualan',
                sidebar_online_store: 'Toko Online',
                sidebar_pos: 'Point of Sale',
                // Topnav
                topnav_profile: 'Profil',
                topnav_setting: 'Pengaturan',
                topnav_logout: 'Keluar',
                topnav_language: 'Bahasa',
                topnav_theme: 'Tema',
                topnav_dark_mode: 'Mode Gelap',
                greeting_morning: 'Selamat Pagi',
                greeting_afternoon: 'Selamat Siang',
                greeting_evening: 'Selamat Sore',
                greeting_night: 'Selamat Malam',
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
                dashboard_setup_pos: 'Set up POS',
                // Sidebar
                sidebar_home: 'Home',
                sidebar_orders: 'Orders',
                sidebar_products: 'Products',
                sidebar_customers: 'Customers',
                sidebar_marketing: 'Marketing',
                sidebar_discounts: 'Discounts',
                sidebar_content: 'Content',
                sidebar_markets: 'Markets',
                sidebar_analytics: 'Analytics',
                sidebar_sales_channels: 'Sales channels',
                sidebar_online_store: 'Online Store',
                sidebar_pos: 'Point of Sale',
                // Topnav
                topnav_profile: 'Profile',
                topnav_setting: 'Setting',
                topnav_logout: 'Logout',
                topnav_language: 'Language',
                topnav_theme: 'Theme',
                topnav_dark_mode: 'Dark Mode',
                greeting_morning: 'Good Morning',
                greeting_afternoon: 'Good Afternoon',
                greeting_evening: 'Good Evening',
                greeting_night: 'Good Night',
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

        function setGreetingByTime() {
            const hour = new Date().getHours();
            let key = 'greeting_morning';
            if (hour >= 0 && hour < 10) key = 'greeting_morning';
            else if (hour >= 10 && hour < 15) key = 'greeting_afternoon';
            else if (hour >= 15 && hour < 18) key = 'greeting_evening';
            else if (hour >= 18 && hour < 24) key = 'greeting_night';
            const greetingEl = document.getElementById('greeting');
            if (greetingEl) {
                greetingEl.setAttribute('data-translate-key', key);
            }
            applyTranslations();
        }

        document.addEventListener('DOMContentLoaded', function() {
            setLanguage(currentLanguage);
            const savedDarkMode = localStorage.getItem('darkMode') === 'true';
            if (savedDarkMode) {
                isDarkMode = true;
                document.body.classList.add('dark-mode');
                const toggle = document.getElementById('theme-toggle');
                const slider = document.getElementById('theme-toggle-slider');
                if (toggle && slider) {
                    toggle.classList.remove('bg-interactive-secondary');
                    toggle.classList.add('bg-accent-primary');
                    slider.classList.remove('translate-x-1');
                    slider.classList.add('translate-x-6');
                }
            }
            const firstAccordion = document.querySelector('.accordion-content');
            const firstIcon = document.querySelector('.accordion-icon');
            if (firstAccordion && firstIcon) {
                firstAccordion.classList.add('open');
                firstIcon.classList.add('rotated');
            }
            setGreetingByTime();
        });
    </script>
</body>
</html> 