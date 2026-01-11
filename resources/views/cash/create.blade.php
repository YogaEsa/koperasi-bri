@extends('layouts.app')

@section('title', 'Catat Transaksi Kas')

@section('page-title', 'Catat Transaksi Kas')
@section('page-subtitle', 'Input transaksi kas masuk atau keluar')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="#" method="POST" class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100">
            @csrf

            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Detail Transaksi</h3>
                <span class="text-xs text-gray-500">* Wajib diisi</span>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8 space-y-6">
                <!-- Jenis Transaksi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Jenis Transaksi <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative flex items-center justify-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 focus-within:ring-2 focus-within:ring-blue-500 transition-all group">
                            <input type="radio" name="type" value="in" class="sr-only peer" checked>
                            <div class="text-center">
                                <div class="w-10 h-10 mx-auto mb-2 bg-green-100 rounded-full flex items-center justify-center peer-checked:bg-green-600 peer-checked:text-white transition-colors">
                                    <i class="fas fa-arrow-down text-green-600 peer-checked:text-white"></i>
                                </div>
                                <span class="block text-sm font-medium text-gray-900">Pemasukan</span>
                            </div>
                            <div class="absolute inset-0 border-2 border-transparent peer-checked:border-green-600 rounded-xl pointer-events-none"></div>
                        </label>

                        <label class="relative flex items-center justify-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 focus-within:ring-2 focus-within:ring-blue-500 transition-all group">
                            <input type="radio" name="type" value="out" class="sr-only peer">
                            <div class="text-center">
                                <div class="w-10 h-10 mx-auto mb-2 bg-red-100 rounded-full flex items-center justify-center peer-checked:bg-red-600 peer-checked:text-white transition-colors">
                                    <i class="fas fa-arrow-up text-red-600 peer-checked:text-white"></i>
                                </div>
                                <span class="block text-sm font-medium text-gray-900">Pengeluaran</span>
                            </div>
                            <div class="absolute inset-0 border-2 border-transparent peer-checked:border-red-600 rounded-xl pointer-events-none"></div>
                        </label>
                    </div>
                </div>

                <!-- Tanggal & Nominal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Transaksi <span class="text-red-500">*</span></label>
                        <input type="date" name="date" id="date" required
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Nominal (Rp) <span class="text-red-500">*</span></label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="amount" id="amount" required
                                   class="block w-full pl-10 rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors"
                                   placeholder="0">
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Keterangan <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="3" required
                              class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors"
                              placeholder="Deskripsi transaksi..."></textarea>
                </div>

                <!-- Lampiran (Optional) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Transaksi (Opsional)</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:bg-gray-50 transition-colors cursor-pointer">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-image text-gray-400 text-3xl mb-3"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, PDF up to 5MB
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <a href="{{ route('cash.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
@endsection
