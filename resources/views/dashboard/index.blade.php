@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang kembali, Admin!')

@section('styles')
    .activity-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .activity-card:hover {
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .chart-placeholder {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
    }
@endsection

@section('content')
    <!-- Main Dashboard Content -->
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 800)">

        <!-- Loading Skeleton -->
        <div x-show="loading" class="animate-pulse space-y-8">
            <!-- Stats Grid Skeleton -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                @for($i = 0; $i < 4; $i++)
                    <div class="bg-white rounded-2xl p-6 h-40">
                        <div class="h-8 w-8 bg-gray-200 rounded-lg mb-4"></div>
                        <div class="h-6 w-32 bg-gray-200 rounded mb-2"></div>
                        <div class="h-8 w-24 bg-gray-200 rounded"></div>
                    </div>
                @endfor
            </div>

            <!-- Chart & Activity Skeleton -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
                <div class="xl:col-span-2 bg-white rounded-2xl h-96 p-6">
                    <div class="h-6 w-48 bg-gray-200 rounded mb-6"></div>
                    <div class="h-64 bg-gray-100 rounded-xl"></div>
                </div>
                <div class="bg-white rounded-2xl h-96 p-6">
                    <div class="h-6 w-32 bg-gray-200 rounded mb-6"></div>
                    <div class="space-y-4">
                        @for($i = 0; $i < 4; $i++)
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-200 rounded-xl"></div>
                                <div class="flex-1 space-y-2">
                                    <div class="h-4 w-24 bg-gray-200 rounded"></div>
                                    <div class="h-3 w-32 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Real Content -->
        <div x-show="!loading"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             style="display: none;">

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <x-stat-card
                    title="Total Anggota"
                    value="1,234"
                    icon="fas fa-users"
                    trend="+12% dari bulan lalu"
                    trendDirection="up"
                    color="blue"
                    delay="0s"
                />

                <x-stat-card
                    title="Total Simpanan"
                    value="Rp 2.5M"
                    icon="fas fa-piggy-bank"
                    trend="+8% dari bulan lalu"
                    trendDirection="up"
                    color="green"
                    delay="0.1s"
                />

                <x-stat-card
                    title="Total Pinjaman"
                    value="Rp 1.8M"
                    icon="fas fa-hand-holding-usd"
                    trend="-3% dari bulan lalu"
                    trendDirection="down"
                    color="orange"
                    delay="0.2s"
                />

                <x-stat-card
                    title="Transaksi Hari Ini"
                    value="56"
                    icon="fas fa-exchange-alt"
                    trend="+24% dari kemarin"
                    trendDirection="up"
                    color="purple"
                    delay="0.3s"
                />
            </div>

            <!-- Charts and Activity -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
                <!-- Chart Section -->
                <div class="xl:col-span-2 bg-white rounded-2xl shadow-soft p-6 lg:p-8 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Grafik Simpanan vs Pinjaman</h3>
                            <p class="text-sm text-gray-500 mt-1">Data 6 bulan terakhir</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-lg shadow-blue-500/30">
                                Export
                            </button>
                        </div>
                    </div>

                    <div class="h-80 chart-placeholder rounded-xl flex items-center justify-center border border-blue-100 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-50/50 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="text-center z-10 transform group-hover:scale-105 transition-transform duration-500">
                            <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-2xl flex items-center justify-center shadow-md">
                                <i class="fas fa-chart-line text-4xl text-blue-600"></i>
                            </div>
                            <p class="text-gray-700 text-lg font-semibold mb-2">Chart Visualization</p>
                            <p class="text-gray-500 text-sm">Akan diintegrasikan dengan Chart.js</p>
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="flex items-center justify-center space-x-6 mt-6">
                        <div class="flex items-center space-x-2">
                            <span class="flex w-3 h-3 bg-blue-600 rounded-full shadow-sm"></span>
                            <span class="text-sm text-gray-600 font-medium">Simpanan</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="flex w-3 h-3 bg-orange-600 rounded-full shadow-sm"></span>
                            <span class="text-sm text-gray-600 font-medium">Pinjaman</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-soft p-6 lg:p-8 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Aktivitas Terbaru</h3>
                        <button class="text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                            Lihat Semua
                        </button>
                    </div>

                    <div class="space-y-4 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                        <div class="activity-card flex items-start space-x-4 p-4 bg-gray-50/50 rounded-xl hover:bg-white border border-transparent hover:border-gray-100 transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                                <i class="fas fa-plus text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-1">Simpanan Baru</p>
                                <p class="text-sm text-gray-600">John Doe - Rp 500,000</p>
                                <p class="text-xs text-gray-400 mt-1 flex items-center">
                                    <i class="far fa-clock mr-1"></i>2 jam yang lalu
                                </p>
                            </div>
                        </div>

                        <div class="activity-card flex items-start space-x-4 p-4 bg-gray-50/50 rounded-xl hover:bg-white border border-transparent hover:border-gray-100 transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                                <i class="fas fa-user text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-1">Anggota Baru</p>
                                <p class="text-sm text-gray-600">Jane Smith bergabung</p>
                                <p class="text-xs text-gray-400 mt-1 flex items-center">
                                    <i class="far fa-clock mr-1"></i>4 jam yang lalu
                                </p>
                            </div>
                        </div>

                        <div class="activity-card flex items-start space-x-4 p-4 bg-gray-50/50 rounded-xl hover:bg-white border border-transparent hover:border-gray-100 transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600">
                                <i class="fas fa-money-bill text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-1">Pembayaran Pinjaman</p>
                                <p class="text-sm text-gray-600">Michael Johnson - Rp 200,000</p>
                                <p class="text-xs text-gray-400 mt-1 flex items-center">
                                    <i class="far fa-clock mr-1"></i>6 jam yang lalu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach([
                    ['icon' => 'user-plus', 'color' => 'blue', 'title' => 'Tambah Anggota', 'desc' => 'Daftar anggota baru'],
                    ['icon' => 'plus-circle', 'color' => 'green', 'title' => 'Input Simpanan', 'desc' => 'Catat simpanan baru'],
                    ['icon' => 'hand-holding-usd', 'color' => 'orange', 'title' => 'Ajukan Pinjaman', 'desc' => 'Proses pinjaman'],
                    ['icon' => 'file-download', 'color' => 'purple', 'title' => 'Unduh Laporan', 'desc' => 'Export data']
                ] as $action)
                <button class="bg-white p-6 rounded-xl shadow-soft hover:shadow-lg border border-transparent hover:border-{{ $action['color'] }}-100 transition-all duration-300 group text-left relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-{{ $action['color'] }}-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 flex items-center space-x-4">
                        <div class="w-12 h-12 bg-{{ $action['color'] }}-100 text-{{ $action['color'] }}-600 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <i class="fas fa-{{ $action['icon'] }} text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900 group-hover:text-{{ $action['color'] }}-700 transition-colors">{{ $action['title'] }}</p>
                            <p class="text-xs text-gray-500">{{ $action['desc'] }}</p>
                        </div>
                    </div>
                </button>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Stats animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stat-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            observer.observe(card);
        });
    </script>
@endsection
