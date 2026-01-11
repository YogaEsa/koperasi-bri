@extends('layouts.app')

@section('title', 'Setor Simpanan')

@section('page-title', 'Setor Simpanan')
@section('page-subtitle', 'Input setoran simpanan anggota')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="#" method="POST" class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100">
            @csrf

            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Detail Setoran</h3>
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

                <!-- Jenis Simpanan -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Simpanan <span class="text-red-500">*</span></label>
                    <select name="type" id="type" required
                            class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                        <option value="">Pilih Jenis Simpanan</option>
                        <option value="pokok">Simpanan Pokok</option>
                        <option value="wajib">Simpanan Wajib</option>
                        <option value="sukarela">Simpanan Sukarela</option>
                    </select>
                </div>

                <!-- Tanggal & Nominal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Setoran <span class="text-red-500">*</span></label>
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
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                    <textarea name="description" id="description" rows="3"
                              class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors"
                              placeholder="Catatan tambahan..."></textarea>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <a href="{{ route('savings.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Setoran
                </button>
            </div>
        </form>
    </div>
@endsection
