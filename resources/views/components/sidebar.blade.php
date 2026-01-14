<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 bg-white shadow-strong transform -translate-x-full lg:translate-x-0 sidebar-transition sidebar-full">
    <div class="flex flex-col h-full">
        <!-- Logo & Toggle Button -->
        <div class="flex items-center justify-between h-20 gradient-bri px-6 flex-shrink-0 overflow-hidden">
            <div class="flex items-center space-x-3 min-w-0">
                <div class="logo-container flex-shrink-0 w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-medium cursor-pointer transition-transform hover:scale-105" onclick="toggleSidebarMode()">
                    <img src="{{ asset('assets/images/Logo.png') }}"
                         alt="Logo BRI"
                         class="w-8 h-8 object-contain">
                </div>
                <div class="logo-text overflow-hidden">
                    <span class="text-white font-bold text-lg whitespace-nowrap">Koperasi BRI</span>
                </div>
            </div>
            <button onclick="toggleSidebarMode()"
                    class="toggle-btn hidden lg:flex items-center justify-center w-8 h-8 rounded-lg bg-white/20 hover:bg-white/30 text-white transition-all duration-200 flex-shrink-0">
                <i class="fas fa-bars text-sm"></i>
            </button>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 py-6 px-4 space-y-1 overflow-y-auto overflow-x-visible">
            @foreach(auth()->user()->role->menus->sortBy('order') as $menu)
            <x-nav-item href="{{ route($menu->route) }}" :active="request()->routeIs($menu->route) || request()->url() == route($menu->route).'*'" class="tooltip">
                <x-slot name="icon">
                    <i class="{{ $menu->icon }}"></i>
                </x-slot>
                {{ $menu->name }}
            </x-nav-item>
            @endforeach
        </nav>

        <!-- Logout Button -->
        <div class="p-4 border-t border-gray-100 mt-auto">
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group text-red-600 hover:bg-red-50 hover:text-red-700 navigation-item relative">
                    <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center mr-3 sidebar-icon nav-icon transition-colors">
                        <i class="fas fa-sign-out-alt text-lg group-hover:scale-110 transition-transform"></i>
                    </span>
                    <span class="nav-text truncate font-semibold tracking-wide">Logout</span>

                    <!-- Tooltip -->
                    <span class="tooltip-text">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<style>
    /* Sidebar mini mode styles */
    .sidebar-mini .logo-text,
    .sidebar-mini .nav-text {
        opacity: 0;
        width: 0;
        overflow: hidden;
    }

    .sidebar-mini .logo-container {
        margin: 0 auto;
    }

    /* Toggle button visible in mini mode */
    .sidebar-mini .toggle-btn {
        display: none;
    }

    .sidebar-mini .toggle-btn:hover {
        opacity: 1;
    }

    .sidebar-mini .nav-item {
        justify-content: center;
        padding-left: 0;
        padding-right: 0;
    }

    .sidebar-mini .nav-icon {
        margin-left: 0;
        margin-right: 0;
    }

    /* Show tooltip only in mini mode */
    .sidebar-full .tooltip .tooltip-text {
        display: none;
    }

    .sidebar-mini .nav-item {
        position: relative;
    }

    /* Mobile adjustments */
    @media (max-width: 1023px) {
        #sidebar {
            width: var(--sidebar-width) !important;
        }

        .sidebar-mini .logo-text,
        .sidebar-mini .nav-text {
            opacity: 1;
            width: auto;
        }

        .sidebar-full .toggle-btn,
        .sidebar-mini .toggle-btn {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tooltip positioning logic
        const navItems = document.querySelectorAll('.nav-item.tooltip');
        let activeTooltip = null;

        navItems.forEach(item => {
            const tooltipText = item.querySelector('.tooltip-text');
            if (!tooltipText) return;

            // Move tooltip to body to escape overflow:hidden
            document.body.appendChild(tooltipText);

            item.addEventListener('mouseenter', function() {
                const sidebar = document.getElementById('sidebar');
                if (!sidebar.classList.contains('sidebar-mini')) return;

                const rect = item.getBoundingClientRect();

                // Show and position tooltip
                tooltipText.style.visibility = 'visible';
                tooltipText.style.opacity = '1';
                tooltipText.style.position = 'fixed';
                tooltipText.style.top = (rect.top + (rect.height / 2) - (tooltipText.offsetHeight / 2)) + 'px';
                tooltipText.style.left = (rect.right + 10) + 'px'; // 10px gap
                tooltipText.style.zIndex = '9999';
                tooltipText.style.transform = 'none'; // Reset any transform
            });

            item.addEventListener('mouseleave', function() {
                tooltipText.style.visibility = 'hidden';
                tooltipText.style.opacity = '0';
            });
        });
    });
</script>
