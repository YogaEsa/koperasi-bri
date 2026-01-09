<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Koperasi BRI</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * { font-family: 'Inter', sans-serif; }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-scaleIn {
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .nav-item {
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            transform: translateX(5px);
        }

        .gradient-bri {
            background: linear-gradient(135deg, #003d82 0%, #0066cc 100%);
        }

        .pulse-bg {
            animation: pulse-bg 2s infinite;
        }

        @keyframes pulse-bg {
            0%, 100% { background-color: rgba(59, 130, 246, 0.1); }
            50% { background-color: rgba(59, 130, 246, 0.2); }
        }

        .bounce-icon {
            animation: bounce-icon 1.5s infinite;
        }

        @keyframes bounce-icon {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">

    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out animate-slideInLeft" id="sidebar">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 gradient-bri">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center bounce-icon">
                    <i class="fas fa-university text-blue-900 text-lg"></i>
                </div>
                <span class="text-white font-bold text-xl">Koperasi BRI</span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 px-4">
            <div class="space-y-2">
                <!-- Dashboard -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-semibold rounded-xl bg-blue-50 text-blue-700 border-l-4 border-blue-600">
                    <i class="fas fa-tachometer-alt mr-3 text-blue-600 text-lg"></i>
                    Dashboard
                </a>

                <!-- Anggota -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-users mr-3 text-gray-500 group-hover:text-blue-600 transition duration-300"></i>
                    Manajemen Anggota
                </a>

                <!-- Simpanan -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-piggy-bank mr-3 text-gray-500 group-hover:text-green-600 transition duration-300"></i>
                    Simpanan
                </a>

                <!-- Pinjaman -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-hand-holding-usd mr-3 text-gray-500 group-hover:text-orange-600 transition duration-300"></i>
                    Pinjaman
                </a>

                <!-- Transaksi -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-exchange-alt mr-3 text-gray-500 group-hover:text-purple-600 transition duration-300"></i>
                    Transaksi
                </a>

                <!-- Laporan -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-chart-bar mr-3 text-gray-500 group-hover:text-indigo-600 transition duration-300"></i>
                    Laporan
                </a>

                <!-- Pengaturan -->
                <a href="#" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-cog mr-3 text-gray-500 group-hover:text-gray-600 transition duration-300"></i>
                    Pengaturan
                </a>
            </div>

            <!-- Bottom Menu -->
            <div class="absolute bottom-6 w-full px-4">
                <a href="/login" class="nav-item group flex items-center px-4 py-4 text-sm font-medium text-red-600 rounded-xl hover:bg-red-50 transition duration-300">
                    <i class="fas fa-sign-out-alt mr-3 group-hover:scale-110 transition duration-300"></i>
                    Logout
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Navigation -->
        <header class="bg-white/80 backdrop-blur-lg shadow-sm border-b border-gray-200 animate-fadeInUp">
            <div class="flex items-center justify-between h-20 px-8">
                <div class="flex items-center">
                    <button type="button" class="lg:hidden p-3 rounded-xl text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-200" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="ml-4 lg:ml-0 text-3xl font-bold text-gray-900">Dashboard</h1>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Notifications -->
                    <button class="relative p-3 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition duration-200">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-2 right-2 h-3 w-3 bg-red-500 rounded-full animate-pulse"></span>
                    </button>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4 bg-gray-50 rounded-xl p-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-semibold text-gray-900">Admin Koperasi</p>
                            <p class="text-xs text-gray-500">admin@koperasi.bri</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 mb-8">
                <!-- Total Anggota -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 border-l-4 border-blue-500 animate-scaleIn" style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 mb-2">Total Anggota</p>
                            <p class="text-4xl font-bold text-gray-900">1,234</p>
                            <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up mr-1"></i> +12% dari bulan lalu</p>
                        </div>
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-users text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Simpanan -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 border-l-4 border-green-500 animate-scaleIn" style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 mb-2">Total Simpanan</p>
                            <p class="text-4xl font-bold text-gray-900">Rp 2.5M</p>
                            <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up mr-1"></i> +8% dari bulan lalu</p>
                        </div>
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-piggy-bank text-green-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Pinjaman -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 border-l-4 border-orange-500 animate-scaleIn" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 mb-2">Total Pinjaman</p>
                            <p class="text-4xl font-bold text-gray-900">Rp 1.8M</p>
                            <p class="text-xs text-orange-600 mt-2"><i class="fas fa-arrow-down mr-1"></i> -3% dari bulan lalu</p>
                        </div>
                        <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-hand-holding-usd text-orange-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Transaksi Hari Ini -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 border-l-4 border-purple-500 animate-scaleIn" style="animation-delay: 0.4s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 mb-2">Transaksi Hari Ini</p>
                            <p class="text-4xl font-bold text-gray-900">56</p>
                            <p class="text-xs text-purple-600 mt-2"><i class="fas fa-arrow-up mr-1"></i> +24% dari kemarin</p>
                        </div>
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-exchange-alt text-purple-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Recent Activity -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <!-- Chart -->
                <div class="xl:col-span-2 bg-white rounded-2xl shadow-lg p-8 animate-fadeInUp" style="animation-delay: 0.5s;">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Grafik Simpanan vs Pinjaman</h3>
                    <div class="h-80 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-chart-line text-6xl text-blue-500 mb-4 bounce-icon"></i>
                            <p class="text-gray-600 text-lg font-medium">Chart akan diintegrasikan dengan Chart.js</p>
                            <p class="text-gray-500 text-sm mt-2">Real-time data visualization</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fadeInUp" style="animation-delay: 0.6s;">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Aktivitas Terbaru</h3>
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-xl">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-plus text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Simpanan Baru</p>
                                <p class="text-xs text-gray-600">John Doe - Rp 500,000</p>
                                <p class="text-xs text-gray-400">2 jam yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-blue-50 rounded-xl">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Anggota Baru</p>
                                <p class="text-xs text-gray-600">Jane Smith bergabung</p>
                                <p class="text-xs text-gray-400">4 jam yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-orange-50 rounded-xl">
                            <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-money-bill text-orange-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Pembayaran Pinjaman</p>
                                <p class="text-xs text-gray-600">Michael Johnson - Rp 200,000</p>
                                <p class="text-xs text-gray-400">6 jam yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-purple-50 rounded-xl">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-credit-card text-purple-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Transfer Berhasil</p>
                                <p class="text-xs text-gray-600">Sarah Wilson - Rp 150,000</p>
                                <p class="text-xs text-gray-400">8 jam yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Sidebar Overlay (Mobile) -->
    <div class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden transition-opacity duration-300" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <script>
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

        // Add some interactive effects on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cards sequentially
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.transition = 'all 0.6s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });
    </script>
</body>
</html>
