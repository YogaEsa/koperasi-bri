@extends('layouts.app')

@section('title', 'Pengaturan')

@section('page-title', 'Pengaturan')
@section('page-subtitle', 'Konfigurasi aplikasi koperasi')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Tabs (Static) -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <a href="#" class="border-blue-500 text-blue-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Umum
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Pengguna
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Notifikasi
                </a>
            </nav>
        </div>

        <form action="#" method="POST" class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100">
            @csrf

            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="text-lg font-semibold text-gray-900">Profil Koperasi</h3>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8 space-y-6">
                <!-- Logo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo Koperasi</label>
                    <div class="flex items-center space-x-6">
                        <div class="flex-shrink-0 h-20 w-20 bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden border border-gray-200">
                            <img src="{{ asset('assets/images/Logo.png') }}" alt="Logo" class="h-12 w-12 object-contain">
                        </div>
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            Ubah Logo
                        </button>
                    </div>
                </div>

                <!-- Nama & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="app_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Koperasi</label>
                        <input type="text" name="app_name" id="app_name" value="Koperasi BRI"
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Resmi</label>
                        <input type="email" name="email" id="email" value="admin@koperasibri.co.id"
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Kantor</label>
                    <textarea name="address" id="address" rows="3"
                              class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">Jl. Jendral Sudirman Kav. 44-46, Jakarta Pusat</textarea>
                </div>

                <!-- Kontak -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                        <input type="text" name="phone" id="phone" value="(021) 5758123"
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                        <input type="text" name="website" id="website" value="https://bri.co.id"
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border transition-colors">
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection
