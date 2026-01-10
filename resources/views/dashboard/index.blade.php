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
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        <x-stat-card
            title="Total Anggota"
            value="1,234"
            icon="fas fa-users"
            trend="+12% dari bulan lalu"
            trendDirection="up"
            color="blue"
            delay="0.1s"
        />

        <x-stat-card
            title="Total Simpanan"
            value="Rp 2.5M"
            icon="fas fa-piggy-bank"
            trend="+8% dari bulan lalu"
            trendDirection="up"
            color="green"
            delay="0.2s"
        />

        <x-stat-card
            title="Total Pinjaman"
            value="Rp 1.8M"
            icon="fas fa-hand-holding-usd"
            trend="-3% dari bulan lalu"
            trendDirection="down"
            color="orange"
            delay="0.3s"
        />

        <x-stat-card
            title="Transaksi Hari Ini"
            value="56"
            icon="fas fa-exchange-alt"
            trend="+24% dari kemarin"
            trendDirection="up"
            color="purple"
            delay="0.4s"
        />
    </div>

    <!-- Charts and Activity -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
        <!-- Chart Section -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-soft p-6 lg:p-8 animate-scaleIn" style="animation-delay: 0.5s;">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Grafik Simpanan vs Pinjaman</h3>
                    <p class="text-sm text-gray-500 mt-1">Data 6 bulan terakhir</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-4 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        Export
                    </button>
                </div>
            </div>

            <div class="h-80 chart-placeholder rounded-xl flex items-center justify-center border border-blue-100">
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-4 bg-blue-100 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-chart-line text-4xl text-blue-600"></i>
                    </div>
                    <p class="text-gray-700 text-lg font-semibold mb-2">Chart Visualization</p>
                    <p class="text-gray-500 text-sm">Akan diintegrasikan dengan Chart.js</p>
                </div>
            </div>

            <!-- Legend -->
            <div class="flex items-center justify-center space-x-6 mt-6">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-blue-600 rounded-full"></div>
                    <span class="text-sm text-gray-600 font-medium">Simpanan</span>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-orange-600 rounded-full"></div>
                    <span class="text-sm text-gray-600 font-medium">Pinjaman</span>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-soft p-6 lg:p-8 animate-scaleIn" style="animation-delay: 0.6s;">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Aktivitas Terbaru</h3>
                <button class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                    Lihat Semua
                </button>
            </div>

            <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                <div class="activity-card flex items-start space-x-4 p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-plus text-green-600 text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 mb-1">Simpanan Baru</p>
                        <p class="text-sm text-gray-600">John Doe - Rp 500,000</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>2 jam yang lalu
                        </p>
                    </div>
                </div>

                <div class="activity-card flex items-start space-x-4 p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 mb-1">Anggota Baru</p>
                        <p class="text-sm text-gray-600">Jane Smith bergabung</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>4 jam yang lalu
                        </p>
                    </div>
                </div>

                <div class="activity-card flex items-start space-x-4 p-4 bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl border border-orange-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-money-bill text-orange-600 text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 mb-1">Pembayaran Pinjaman</p>
                        <p class="text-sm text-gray-600">Michael Johnson - Rp 200,000</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>6 jam yang lalu
                        </p>
                    </div>
                </div>

                <div class="activity-card flex items-start space-x-4 p-4 bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl border border-purple-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-credit-card text-purple-600 text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 mb-1">Transfer Berhasil</p>
                        <p class="text-sm text-gray-600">Sarah Wilson - Rp 150,000</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>8 jam yang lalu
                        </p>
                    </div>
                </div>

                <div class="activity-card flex items-start space-x-4 p-4 bg-gradient-to-br from-pink-50 to-rose-50 rounded-xl border border-pink-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-file-alt text-pink-600 text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 mb-1">Laporan Dibuat</p>
                        <p class="text-sm text-gray-600">Laporan Bulanan Januari</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>1 hari yang lalu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <button class="quick-action-btn bg-white hover:bg-blue-50 p-6 rounded-xl shadow-soft hover:shadow-medium border-2 border-transparent hover:border-blue-200 transition-all duration-200 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="text-sm font-bold text-gray-900">Tambah Anggota</p>
                    <p class="text-xs text-gray-500">Daftar anggota baru</p>
                </div>
            </div>
        </button>

        <button class="quick-action-btn bg-white hover:bg-green-50 p-6 rounded-xl shadow-soft hover:shadow-medium border-2 border-transparent hover:border-green-200 transition-all duration-200 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-plus-circle text-green-600 text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="text-sm font-bold text-gray-900">Input Simpanan</p>
                    <p class="text-xs text-gray-500">Catat simpanan baru</p>
                </div>
            </div>
        </button>

        <button class="quick-action-btn bg-white hover:bg-orange-50 p-6 rounded-xl shadow-soft hover:shadow-medium border-2 border-transparent hover:border-orange-200 transition-all duration-200 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-hand-holding-usd text-orange-600 text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="text-sm font-bold text-gray-900">Ajukan Pinjaman</p>
                    <p class="text-xs text-gray-500">Proses pinjaman</p>
                </div>
            </div>
        </button>

        <button class="quick-action-btn bg-white hover:bg-purple-50 p-6 rounded-xl shadow-soft hover:shadow-medium border-2 border-transparent hover:border-purple-200 transition-all duration-200 group">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-file-download text-purple-600 text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="text-sm font-bold text-gray-900">Unduh Laporan</p>
                    <p class="text-xs text-gray-500">Export data</p>
                </div>
            </div>
        </button>
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
