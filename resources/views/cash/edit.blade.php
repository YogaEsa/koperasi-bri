@extends('layouts.app')

@section('title', 'Edit Transaksi Kas')

@section('page-title', 'Edit Transaksi Kas')
@section('page-subtitle', 'Perbarui data transaksi')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="#" method="POST" class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100">
            @csrf
            @method('PUT')

            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Detail Transaksi #TRX-001</h3>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Pemasukan
                </span>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8 space-y-6">
                <!-- Jenis Transaksi (Disabled for Edit usually, or allowed) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Jenis Transaksi</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative flex items-center justify-center p-4 border rounded-xl cursor-pointer bg-blue-50 border-blue-200 ring-2 ring-blue-500 transition-all group">
                            <input type="radio" name="type" value="in" class="sr-only peer" checked>
                            <div class="text-center">
                                <div class="w-10 h-10 mx-auto mb-2 bg-green-100 rounded-full flex items-center justify-center text-white transition-colors">
                                    <i class="fas fa-arrow-down text-green-600"></i>
                                </div>
                                <span class="block text-sm font-medium text-gray-900">Pemasukan</span>
                            </div>
                        </label>

                        <label class="relative flex items-center justify-center p-4 border rounded-xl cursor-not-allowed opacity-50 bg-gray-50">
                            <input type="radio" name="type" value="out" class="sr-only peer" disabled>
                            <div class="text-center">
                                <div class="w-10 h-10 mx-auto mb-2 bg-gray-200 rounded-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <span class="block text-sm font-medium text-gray-500">Pengeluaran</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Tanggal & Nominal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Transaksi <span class="text-red-500">*</span></label>
                        <input type="date" name="date" id="date" required value="2024-01-10"
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Nominal (Rp) <span class="text-red-500">*</span></label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="amount" id="amount" required value="500000"
                                   class="block w-full pl-10 rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Keterangan <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="3" required
                              class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">Setoran Simpanan Pokok - John Doe</textarea>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <a href="{{ route('cash.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
