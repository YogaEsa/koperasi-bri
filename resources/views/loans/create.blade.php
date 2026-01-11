@extends('layouts.app')

@section('title', 'Ajukan Pinjaman')

@section('page-title', 'Ajukan Pinjaman')
@section('page-subtitle', 'Isi formulir pengajuan pinjaman')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="#" method="POST" class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100">
            @csrf

            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Detail Pengajuan</h3>
                <span class="text-xs text-gray-500">* Wajib diisi</span>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8 space-y-6">
                <!-- Pilih Anggota -->
                <div>
                    <label for="member_id" class="block text-sm font-medium text-gray-700 mb-2">Anggota <span class="text-red-500">*</span></label>
                    <select name="member_id" id="member_id" required
                            class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                        <option value="">Pilih Anggota</option>
                        <option value="1">John Doe - 3201234567890001</option>
                        <option value="2">Jane Smith - 3201234567890002</option>
                    </select>
                </div>

                <!-- Jumlah Pinjaman -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Pinjaman (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="amount" id="amount" required
                               class="block w-full pl-10 rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors"
                               placeholder="0">
                    </div>
                </div>

                <!-- Bunga & Tenor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="interest" class="block text-sm font-medium text-gray-700 mb-2">Bunga (%) <span class="text-red-500">*</span></label>
                        <input type="number" step="0.1" name="interest" id="interest" required value="1.5"
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Tenor (Bulan) <span class="text-red-500">*</span></label>
                        <input type="number" name="duration" id="duration" required
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors"
                               placeholder="Contoh: 12">
                    </div>
                </div>

                <!-- Keterangan -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Keperluan Pinjaman</label>
                    <textarea name="description" id="description" rows="3"
                              class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors"
                              placeholder="Jelaskan tujuan pinjaman..."></textarea>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <a href="{{ route('loans.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Ajukan Pinjaman
                </button>
            </div>
        </form>
    </div>
@endsection
