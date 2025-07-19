<!-- Sidebar -->
<aside class="w-64 fixed top-0 left-0 h-screen z-40 bg-background-main border-r border-border-primary flex flex-col overflow-y-auto">
    <!-- Sidebar Header -->
    <div class="h-16 px-4 border-b border-border-primary"></div>
    <!-- Sidebar Menu -->
    <nav class="flex-1 px-2 py-4 space-y-2">
        <ul class="space-y-1">
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.344 1.692a2.25 2.25 0 0 1 3.312 0l3.854 4.19c.637.691.99 1.598.99 2.538v3.33a2.75 2.75 0 0 1-2.75 2.75h-1.75a1.5 1.5 0 0 1-1.5-1.5v-2h-1v2a1.5 1.5 0 0 1-1.5 1.5h-1.75a2.75 2.75 0 0 1-2.75-2.75v-3.33c0-.94.353-1.847.99-2.539zm2.208 1.016a.75.75 0 0 0-1.104 0l-3.854 4.189a2.25 2.25 0 0 0-.594 1.523v3.33c0 .69.56 1.25 1.25 1.25h1.75v-2a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v2h1.75c.69 0 1.25-.56 1.25-1.25v-3.33a2.25 2.25 0 0 0-.594-1.523l-3.854-4.19Z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_home">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.orders.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.255 3.847a2.75 2.75 0 0 1 2.72-2.347h6.05a2.75 2.75 0 0 1 2.72 2.347l.66 4.46q.095.638.095 1.282v1.661a3.25 3.25 0 0 1-3.25 3.25h-6.5a3.25 3.25 0 0 1-3.25-3.25v-1.66q0-.645.094-1.283zm2.72-.847a1.25 1.25 0 0 0-1.236 1.067l-.583 3.933h2.484c.538 0 1.015.344 1.185.855l.159.474a.25.25 0 0 0 .237.171h1.558a.25.25 0 0 0 .237-.17l.159-.475a1.25 1.25 0 0 1 1.185-.855h2.484l-.583-3.933a1.25 1.25 0 0 0-1.236-1.067z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_orders">Orders</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.575 2.649a3.75 3.75 0 0 1 2.7-1.149h1.975a3.25 3.25 0 0 1 3.25 3.25v2.187c0 .883-.36 1.728-.996 2.34l-4.747 4.572a2.5 2.5 0 0 1-3.502-.033l-2.898-2.898a2.75 2.75 0 0 1-.036-3.852zm4.425 3.351a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_products">Products</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path d="M4.5 4.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"></path><path d="M2.516 12.227a6.273 6.273 0 0 1 10.968 0l.437.786a1.338 1.338 0 0 1-1.17 1.987h-9.502a1.338 1.338 0 0 1-1.17-1.987z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_customers">Customers</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path d="M3 8a5 5 0 0 1 10 0 1 1 0 0 0 2 0 7 7 0 1 0-7 7 1 1 0 0 0 0-2 5 5 0 0 1-5-5"></path><path d="M9.29 7.84a1 1 0 1 0 1.98-.279 3.25 3.25 0 0 0-2.16-2.62 3.25 3.25 0 1 0-1.622 6.274 1 1 0 0 0 .347-1.97 1.25 1.25 0 0 1-.978-.865 1.24 1.24 0 0 1 .327-1.265 1.25 1.25 0 0 1 1.275-.283 1.26 1.26 0 0 1 .831 1.008"></path><path d="M9.611 8.973a.5.5 0 0 0-.638.638l2.121 6.01a.502.502 0 0 0 .871.134l1.172-1.557 1.038 1.037a.5.5 0 0 0 .707 0l.353-.353a.5.5 0 0 0 0-.707l-1.037-1.038 1.557-1.172a.502.502 0 0 0-.134-.871z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_marketing">Marketing</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.527 1.327c-.6-1.306-2.455-1.306-3.054 0a1.68 1.68 0 0 1-2.112.874c-1.347-.5-2.66.813-2.16 2.16a1.68 1.68 0 0 1-.874 2.112c-1.306.6-1.306 2.455 0 3.054a1.68 1.68 0 0 1 .874 2.112c-.5 1.347.813 2.659 2.16 2.16a1.68 1.68 0 0 1 2.112.874c.6 1.306 2.455 1.306 3.054 0a1.68 1.68 0 0 1 2.112-.874c1.347.499 2.66-.813 2.16-2.16a1.68 1.68 0 0 1 .874-2.112c1.306-.6 1.306-2.455 0-3.054a1.68 1.68 0 0 1-.874-2.112c.5-1.347-.813-2.66-2.16-2.16a1.68 1.68 0 0 1-2.112-.874m-2.527 4.923a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3.53.53-4 4a.749.749 0 1 1-1.06-1.06l4-4a.749.749 0 1 1 1.06 1.06m.47 3.47a1 1 0 1 1-2 0 1 1 0 0 1 2 0"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_discounts">Discounts</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path d="M10 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path><path fill-rule="evenodd" d="M5.42 1.5h5.16c.535 0 .98 0 1.345.03.38.03.736.098 1.073.27.518.263.939.684 1.202 1.202.172.337.24.693.27 1.073.03.365.03.81.03 1.345v1.91c0 .535 0 .98-.03 1.345-.03.38-.098.736-.27 1.073a2.74 2.74 0 0 1-1.201 1.202c-.338.172-.694.24-1.074.27a6 6 0 0 1-.288.017.7.7 0 0 1-.137.013h-6.08c-.535 0-.98 0-1.345-.03-.38-.03-.736-.098-1.073-.27a2.75 2.75 0 0 1-1.047-.934.75.75 0 0 1-.176-.31c-.157-.324-.22-.667-.25-1.031-.029-.365-.029-.81-.029-1.345v-1.91c0-.535 0-.98.03-1.345.03-.38.098-.736.27-1.073a2.74 2.74 0 0 1 1.202-1.202c.337-.172.693-.24 1.073-.27.365-.03.81-.03 1.345-.03m7.58 5.8-.001.533-.135-.192a1.75 1.75 0 0 0-2.778-.116l-1.086 1.303-2.411-2.893a1.75 1.75 0 0 0-2.68-.01l-.909 1.073v-1.548c0-.572 0-.957.025-1.253.023-.287.065-.424.111-.514.12-.236.311-.427.547-.547.09-.046.227-.088.514-.111.296-.024.68-.025 1.253-.025h5.1c.572 0 .957 0 1.252.025.288.023.425.065.516.111.235.12.426.311.546.547.046.09.088.227.111.514.024.296.025.68.025 1.253z"></path><path d="M2 13.75a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75"></path><path d="M10.75 13a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_content">Content</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path d="M1 8a7 7 0 0 1 12.584-4.222 2 2 0 0 0-2.327 1.806 3.5 3.5 0 0 0-1.862 2.166h-1.395a1.255 1.255 0 0 1-.764-2.248l.462-.357a.89.89 0 0 0 .347-.707v-.04c0-.747.606-1.353 1.353-1.353h.057c.193 0 .37-.069.509-.184a5.5 5.5 0 0 0-6.945 2.804l1.89 1.89c.378.379.591.892.591 1.427v.518a1 1 0 0 0 1 1 1.5 1.5 0 0 1 1.5 1.5v1.5q.647-.002 1.253-.143c.029.546.277 1.035.658 1.379a7 7 0 0 1-8.911-6.736"></path><path d="M13.25 5a.75.75 0 0 1 .75.75v.75h.75a.75.75 0 0 1 0 1.5h-2a.75.75 0 0 0 0 1.5h.5a2.25 2.25 0 0 1 .25 4.486v.264a.75.75 0 0 1-1.5 0v-.25h-.75a.75.75 0 0 1 0-1.5h2a.75.75 0 0 0 0-1.5h-.5a2.25 2.25 0 0 1-.25-4.486v-.764a.75.75 0 0 1 .75-.75"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_markets">Markets</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path d="M7.971 2c-.204 0-.344 0-.465.024a1.25 1.25 0 0 0-.982.982c-.024.121-.024.26-.024.465v9.058c0 .204 0 .344.024.465.099.496.486.883.982.982.121.024.26.024.465.024h.058c.204 0 .344 0 .465-.024a1.25 1.25 0 0 0 .982-.982c.024-.121.024-.26.024-.465v-9.058c0-.204 0-.344-.024-.465a1.25 1.25 0 0 0-.982-.982c-.121-.024-.26-.024-.465-.024z"></path><path d="M3.471 7.5c-.204 0-.344 0-.465.024a1.25 1.25 0 0 0-.982.982c-.024.121-.024.26-.024.465v3.558c0 .204 0 .344.024.465.099.496.486.883.982.982.121.024.26.024.465.024h.058c.204 0 .344 0 .465-.024a1.25 1.25 0 0 0 .982-.982c.024-.121.024-.26.024-.465v-3.558c0-.204 0-.344-.024-.465a1.25 1.25 0 0 0-.982-.982c-.121-.024-.26-.024-.465-.024z"></path><path d="M12.471 4.5c-.204 0-.344 0-.465.024a1.25 1.25 0 0 0-.982.982c-.024.121-.024.26-.024.465v6.558c0 .204 0 .344.024.465.099.496.486.883.982.982.121.024.26.024.465.024h.058c.204 0 .344 0 .465-.024a1.25 1.25 0 0 0 .982-.982c.024-.121.024-.26.024-.465v-6.558c0-.204 0-.344-.024-.465a1.25 1.25 0 0 0-.982-.982c-.121-.024-.26-.024-.465-.024z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_analytics">Analytics</span>
                </a>
            </li>
        </ul>
        <div class="mt-6 mb-2 px-3 text-xs text-neutral-500 font-semibold" data-translate-key="sidebar_sales_channels">Sales channels</div>
        <ul class="space-y-1">
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path d="M5 11.18v4.445c0 .345.28.625.625.625h2.5v-2.5c0-.69.56-1.25 1.25-1.25h1.25c.69 0 1.25.56 1.25 1.25v2.5h2.5c.345 0 .625-.28.625-.625V11.18a2.822 2.822 0 0 1-2.813-.975A2.807 2.807 0 0 1 10 11.25a2.807 2.807 0 0 1-2.188-1.045A2.807 2.807 0 0 1 5 11.18ZM7.188 7.5v.938a1.562 1.562 0 1 1-3.125 0V7.5h3.125ZM8.438 8.438V7.5h3.124v.938a1.563 1.563 0 0 1-3.124 0ZM12.813 8.438V7.5h3.124v.938a1.563 1.563 0 0 1-3.124 0ZM4.305 6.25h11.39l-.69-2.073a.625.625 0 0 0-.593-.427H5.588a.625.625 0 0 0-.592.427L4.305 6.25Z"></path>
                        <path fill-rule="evenodd" d="M5 0a5 5 0 0 0-5 5v10a5 5 0 0 0 5 5h10a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5H5ZM3.81 3.782A1.875 1.875 0 0 1 5.588 2.5h8.824c.807 0 1.523.516 1.778 1.282l.997 2.992v1.663c0 .833-.362 1.582-.937 2.097v5.091c0 1.035-.84 1.875-1.875 1.875h-8.75a1.875 1.875 0 0 1-1.875-1.875v-5.091a2.805 2.805 0 0 1-.938-2.097V6.774l.998-2.992Z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_online_store">Online Store</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium text-text-primary hover:bg-neutral-200 transition group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 text-neutral-600 group-hover:text-primary" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5.5C6 4.67157 6.67157 4 7.5 4H16.5C17.3284 4 18 4.67157 18 5.5V18.5C18 19.3284 17.3284 20 16.5 20H7.5C6.67157 20 6 19.3284 6 18.5V5.5ZM8 6.5C8 6.22386 8.22386 6 8.5 6H15.5C15.7761 6 16 6.22386 16 6.5V11C16 11.2761 15.7761 11.5 15.5 11.5H8.5C8.22386 11.5 8 11.2761 8 11V6.5ZM8.5 17C8.22386 17 8 17.2239 8 17.5C8 17.7761 8.22386 18 8.5 18H9.5C9.77614 18 10 17.7761 10 17.5C10 17.2239 9.77614 17 9.5 17H8.5ZM14 17.5C14 17.2239 14.2239 17 14.5 17H15.5C15.7761 17 16 17.2239 16 17.5C16 17.7761 15.7761 18 15.5 18H14.5C14.2239 18 14 17.7761 14 17.5ZM11.5 17C11.2239 17 11 17.2239 11 17.5C11 17.7761 11.2239 18 11.5 18H12.5C12.7761 18 13 17.7761 13 17.5C13 17.2239 12.7761 17 12.5 17H11.5ZM8 15.5C8 15.2239 8.22386 15 8.5 15H9.5C9.77614 15 10 15.2239 10 15.5C10 15.7761 9.77614 16 9.5 16H8.5C8.22386 16 8 15.7761 8 15.5ZM14.5 15C14.2239 15 14 15.2239 14 15.5C14 15.7761 14.2239 16 14.5 16H15.5C15.7761 16 16 15.7761 16 15.5C16 15.2239 15.7761 15 15.5 15H14.5ZM11 15.5C11 15.2239 11.2239 15 11.5 15H12.5C12.7761 15 13 15.2239 13 15.5C13 15.7761 12.7761 16 12.5 16H11.5C11.2239 16 11 15.7761 11 15.5ZM8.5 13C8.22386 13 8 13.2239 8 13.5C8 13.7761 8.22386 14 8.5 14H9.5C9.77614 14 10 13.7761 10 13.5C10 13.2239 9.77614 13 9.5 13H8.5ZM14 13.5C14 13.2239 14.2239 13 14.5 13H15.5C15.7761 13 16 13.2239 16 13.5C16 13.7761 15.7761 14 15.5 14H14.5C14.2239 14 14 13.7761 14 13.5ZM11.5 13C11.2239 13 11 13.2239 11 13.5C11 13.7761 11.2239 14 11.5 14H12.5C12.7761 14 13 13.7761 13 13.5C13 13.2239 12.7761 13 12.5 13H11.5Z"></path>
                    </svg>
                    <span class="sidebar-label" data-translate-key="sidebar_pos">Point of Sale</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>