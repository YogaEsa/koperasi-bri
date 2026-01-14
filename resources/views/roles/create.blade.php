@extends('layouts.app')

@section('title', 'Tambah Role')
@section('page-title', 'Tambah Role')
@section('page-subtitle', 'Buat role baru untuk sistem')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100 p-8">
            <form action="{{ route('roles.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Role Name</label>
                    <input type="text" name="name" id="name"
                           class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           placeholder="e.g. manager" required>
                </div>

                <!-- Description Input -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                              placeholder="Describe the role responsibilities..."></textarea>
                </div>

                <!-- Menu Access Permissions -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Menu Access</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($menus as $menu)
                        <div class="relative flex items-start p-3 rounded-xl border border-gray-200 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center h-5">
                                <input id="menu_{{ $menu->id }}" name="menus[]" value="{{ $menu->id }}" type="checkbox"
                                       class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="menu_{{ $menu->id }}" class="font-medium text-gray-700 flex items-center gap-2 cursor-pointer">
                                    <i class="{{ $menu->icon }} text-blue-500 w-5"></i>
                                    {{ $menu->name }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('roles.index') }}"
                       class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                        Create Role
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
