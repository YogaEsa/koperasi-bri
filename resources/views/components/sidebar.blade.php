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
            <x-nav-item href="/dashboard" :active="request()->is('dashboard')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-tachometer-alt"></i>
                </x-slot>
                Dashboard
            </x-nav-item>

            <x-nav-item href="/members" :active="request()->is('members*')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-users"></i>
                </x-slot>
                Manajemen Anggota
            </x-nav-item>

            <x-nav-item href="/manajemen-kas" :active="request()->is('manajemen-kas*')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-exchange-alt"></i>
                </x-slot>
                Manajemen Kas
            </x-nav-item>

            <x-nav-item href="/savings" :active="request()->is('savings*')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-piggy-bank"></i>
                </x-slot>
                Simpanan
            </x-nav-item>

            <x-nav-item href="/loans" :active="request()->is('loans*')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </x-slot>
                Pinjaman
            </x-nav-item>

            <x-nav-item href="/reports" :active="request()->is('reports*')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-chart-bar"></i>
                </x-slot>
                Laporan Neraca
            </x-nav-item>

            <div class="my-4 border-t border-gray-200"></div>

            <x-nav-item href="/settings" :active="request()->is('settings*')" class="tooltip">
                <x-slot name="icon">
                    <i class="fas fa-cog"></i>
                </x-slot>
                Pengaturan
            </x-nav-item>
        </nav>

        <!-- Logout Button -->
        <div class="p-4 border-t border-gray-100 mt-auto">
            <x-nav-item href="/login" class="tooltip !text-red-600 hover:!bg-red-50 !border-transparent hover:!border-red-200">
                <x-slot name="icon">
                    <i class="fas fa-sign-out-alt !text-red-600"></i>
                </x-slot>
                Logout
            </x-nav-item>
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
