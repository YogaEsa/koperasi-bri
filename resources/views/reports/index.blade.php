@extends('layouts.app')

@section('title', 'Laporan Neraca')

@section('page-title', 'Laporan Neraca')
@section('page-subtitle', 'Ringkasan keuangan koperasi')

@section('content')
    <!-- Action Bar -->
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-4 mb-8">
        <!-- Date Range Filter -->
        <div class="flex items-center gap-2 bg-white p-1 rounded-xl border border-gray-200 shadow-sm">
            <div class="relative">
                <input type="date" class="block w-32 pl-3 pr-2 py-1.5 border-none rounded-lg text-sm text-gray-600 focus:ring-0" placeholder="Start">
            </div>
            <span class="text-gray-400">-</span>
            <div class="relative">
                <input type="date" class="block w-32 pl-3 pr-2 py-1.5 border-none rounded-lg text-sm text-gray-600 focus:ring-0" placeholder="End">
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center gap-3">
            <button class="inline-flex items-center px-4 py-2.5 border border-gray-200 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                <i class="fas fa-filter mr-2 text-gray-400"></i>
                Terapkan Filter
            </button>

            <button class="inline-flex items-center px-4 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:-translate-y-0.5">
                <i class="fas fa-file-pdf mr-2"></i>
                Export PDF
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-soft p-6 border border-blue-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-500 text-sm font-medium">Total Aset</h3>
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                    <i class="fas fa-wallet"></i>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">Rp 1,250,000,000</p>
            <p class="text-sm text-green-600 mt-2 flex items-center">
                <i class="fas fa-arrow-up mr-1"></i> +5.2% dari bulan lalu
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-soft p-6 border border-red-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-500 text-sm font-medium">Total Kewajiban</h3>
                <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center text-red-600">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">Rp 450,000,000</p>
            <p class="text-sm text-red-600 mt-2 flex items-center">
                <i class="fas fa-arrow-up mr-1"></i> +2.1% dari bulan lalu
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-soft p-6 border border-green-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-500 text-sm font-medium">Total Modal</h3>
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">Rp 800,000,000</p>
            <p class="text-sm text-green-600 mt-2 flex items-center">
                <i class="fas fa-arrow-up mr-1"></i> +8.4% dari bulan lalu
            </p>
        </div>
    </div>

    <!-- Detailed Report Table -->
    <div class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="text-lg font-semibold text-gray-900">Rincian Neraca</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Debit
                        </th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Kredit
                        </th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Saldo Akhir
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Aset Lancar -->
                    <tr class="bg-gray-50">
                        <td colspan="4" class="px-6 py-3 text-sm font-bold text-gray-900">A. ASET LANCAR</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Kas</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 150,000,000</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 150,000,000</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Bank</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 500,000,000</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 500,000,000</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Piutang Anggota</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 600,000,000</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 600,000,000</td>
                    </tr>

                    <!-- Kewajiban -->
                    <tr class="bg-gray-50">
                        <td colspan="4" class="px-6 py-3 text-sm font-bold text-gray-900">B. KEWAJIBAN</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Simpanan Sukarela</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 200,000,000</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 200,000,000</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Hutang Bank</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 250,000,000</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 250,000,000</td>
                    </tr>

                    <!-- Modal -->
                    <tr class="bg-gray-50">
                        <td colspan="4" class="px-6 py-3 text-sm font-bold text-gray-900">C. MODAL</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Simpanan Pokok</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 300,000,000</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 300,000,000</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Simpanan Wajib</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 400,000,000</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 400,000,000</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 pl-10">Cadangan SHU</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">-</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-right">Rp 100,000,000</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-right">Rp 100,000,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
