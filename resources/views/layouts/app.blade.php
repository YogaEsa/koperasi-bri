<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Koperasi BRI</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* BRI Color Palette */
        :root {
            --bri-primary: #003d82;
            --bri-secondary: #0066cc;
            --bri-accent: #0088ff;
            --bri-dark: #002147;
            --sidebar-width: 280px;
            --sidebar-mini-width: 80px;
        }

        .bri-primary { background-color: var(--bri-primary); }
        .bri-secondary { background-color: var(--bri-secondary); }
        .text-bri-primary { color: var(--bri-primary); }
        .text-bri-secondary { color: var(--bri-secondary); }

        .gradient-bri {
            background: linear-gradient(135deg, var(--bri-primary) 0%, var(--bri-secondary) 50%, var(--bri-accent) 100%);
        }

        /* Sidebar Styles */
        .sidebar-full {
            width: var(--sidebar-width);
        }

        .sidebar-mini {
            width: var(--sidebar-mini-width);
        }

        .content-full {
            margin-left: var(--sidebar-width);
        }

        .content-mini {
            margin-left: var(--sidebar-mini-width);
        }

        /* Smooth Transitions */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Modern Shadow System */
        .shadow-soft {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .shadow-medium {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .shadow-strong {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08), 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        .animate-scaleIn {
            animation: scaleIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Tooltip */
        .tooltip {
            position: relative;
        }

        .tooltip .tooltip-text {
            visibility: hidden;
            opacity: 0;
            background: linear-gradient(135deg, var(--bri-primary) 0%, var(--bri-secondary) 100%);
            color: white;
            text-align: center;
            padding: 10px 16px;
            border-radius: 10px;
            position: absolute;
            z-index: 9999;
            left: 100%;
            top: 50%;
            transform: translateY(-50%) translateX(10px);
            white-space: nowrap;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            box-shadow: 0 8px 20px rgba(0, 61, 130, 0.25), 0 4px 10px rgba(0, 61, 130, 0.15);
        }

        .tooltip .tooltip-text::before {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 7px solid transparent;
            border-right-color: var(--bri-primary);
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
            transform: translateY(-50%) translateX(15px);
        }

        /* Pastikan sidebar tidak clip tooltip */
        #sidebar nav {
            overflow-x: visible !important;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Background Pattern */
        .bg-pattern {
            background-color: #f8fafc;
            background-image:
                radial-gradient(circle at 25% 25%, rgba(0, 61, 130, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(0, 102, 204, 0.02) 0%, transparent 50%);
        }

        @yield('styles')
    </style>
</head>
<body class="bg-pattern min-h-screen">

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main Content Wrapper -->
    <div id="mainContent" class="content-full sidebar-transition">
        <!-- Topbar -->
        <x-topbar />

        <!-- Page Content -->
        <main class="p-6 lg:p-8">
            @yield('content')
        </main>
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="closeSidebar()"></div>

    @yield('scripts')

    <!-- Global Scripts -->
    <script>
        // Sidebar Toggle
        let isSidebarMini = localStorage.getItem('sidebarMini') === 'true';

        function toggleSidebarMode() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            isSidebarMini = !isSidebarMini;
            localStorage.setItem('sidebarMini', isSidebarMini);

            if (isSidebarMini) {
                sidebar.classList.remove('sidebar-full');
                sidebar.classList.add('sidebar-mini');
                mainContent.classList.remove('content-full');
                mainContent.classList.add('content-mini');
            } else {
                sidebar.classList.remove('sidebar-mini');
                sidebar.classList.add('sidebar-full');
                mainContent.classList.remove('content-mini');
                mainContent.classList.add('content-full');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        // Initialize sidebar state on load
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            if (isSidebarMini) {
                sidebar.classList.add('sidebar-mini');
                sidebar.classList.remove('sidebar-full');
                mainContent.classList.add('content-mini');
                mainContent.classList.remove('content-full');
            }
        });
    </script>
</body>
</html>
