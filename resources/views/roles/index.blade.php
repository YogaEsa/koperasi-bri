@extends('layouts.app')

@section('title', 'Manajemen Role')
@section('page-title', 'Manajemen Role')
@section('page-subtitle', 'Kelola hak akses pengguna')

@section('content')
    <!-- Action Bar -->
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-4 mb-8">
        <!-- Search & Filter -->
        <form method="GET" action="{{ route('roles.index') }}" class="flex flex-col md:flex-row gap-4 flex-1">
            <!-- Search -->
            <div class="relative w-full md:w-64 group">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400 group-focus-within:text-blue-500 transition-colors"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 sm:text-sm shadow-sm"
                    placeholder="Cari role...">
            </div>

            <!-- Date Range Filter -->
            <div class="flex items-center gap-2 bg-white p-1 rounded-xl border border-gray-200 shadow-sm">
                <div class="relative">
                    <input type="date" name="start_date" value="{{ request('start_date') }}"
                        class="block w-32 pl-3 pr-2 py-1.5 border-none rounded-lg text-sm text-gray-600 focus:ring-0"
                        placeholder="Start">
                </div>
                <span class="text-gray-400">-</span>
                <div class="relative">
                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                        class="block w-32 pl-3 pr-2 py-1.5 border-none rounded-lg text-sm text-gray-600 focus:ring-0"
                        placeholder="End">
                </div>
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2.5 border border-gray-200 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                <i class="fas fa-filter mr-2 text-gray-400"></i>
                Filter
            </button>
        </form>

        <!-- Buttons -->
        <div class="flex items-center gap-3">
            <a href="{{ route('roles.create') }}"
                class="inline-flex items-center px-4 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:-translate-y-0.5">
                <i class="fas fa-plus mr-2"></i>
                Tambah Role
            </a>
        </div>
    </div>

    <!-- Roles Table -->
    <div class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100" x-data="{ loading: true }"
        x-init="setTimeout(() => loading = false, 800)">

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Role
                            Name</th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Description</th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Created
                            At</th>
                        <th scope="col"
                            class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" x-show="loading">
                    @for ($i = 0; $i < 5; $i++)
                        <tr class="animate-pulse">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="h-4 bg-gray-200 rounded w-24"></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="h-4 bg-gray-200 rounded w-48"></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="h-4 bg-gray-200 rounded w-32"></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex justify-end space-x-2">
                                    <div class="h-8 w-8 bg-gray-200 rounded-lg"></div>
                                    <div class="h-8 w-8 bg-gray-200 rounded-lg"></div>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>

                <tbody class="bg-white divide-y divide-gray-200" x-show="!loading" style="display: none;">
                    @foreach ($roles as $role)
                        <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">{{ $role->name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $role->description ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $role->created_at->format('d M Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                        class="p-2 text-blue-600 hover:text-blue-900 hover:bg-blue-50 rounded-lg transition-colors"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($role->name !== 'superadmin')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 hover:text-red-900 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
