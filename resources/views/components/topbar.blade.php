<header class="bg-white/80 backdrop-blur-lg shadow-soft border-b border-gray-100 sticky top-0 z-40">
    <div class="flex items-center justify-between h-16 lg:h-20 px-6 lg:px-8">
        <!-- Left Section: Mobile Menu + Page Title -->
        <div class="flex items-center space-x-4">
            <button type="button"
                    onclick="toggleSidebar()"
                    class="lg:hidden p-2.5 rounded-xl text-gray-500 hover:bg-gray-100 focus:outline-none transition-all duration-200">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 tracking-tight">
                    @yield('page-title', 'Dashboard')
                </h1>
                <p class="text-sm text-gray-500 mt-0.5 hidden sm:block">
                    @yield('page-subtitle', 'Selamat datang kembali')
                </p>
            </div>
        </div>

        <!-- Right Section: Notifications + User Menu -->
        <div class="flex items-center space-x-3 lg:space-x-4">
            <!-- Notifications -->
            <button class="relative p-2.5 lg:p-3 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-200 group">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute top-2 right-2 h-2.5 w-2.5 bg-red-500 rounded-full animate-pulse"></span>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    3
                </span>
            </button>

            <!-- User Profile -->
            <!-- User Profile Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-3 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-2 lg:p-3 hover:shadow-soft transition-all duration-200 cursor-pointer group focus:outline-none">
                    <div class="w-9 h-9 lg:w-10 lg:h-10 gradient-bri rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-bold text-gray-900 leading-tight">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ auth()->user()->role->description ?? 'User' }}</p>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-xs hidden lg:block group-hover:text-gray-600 transition-colors duration-200" :class="{'rotate-180': open}"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50"
                     style="display: none;">

                    <div class="px-4 py-3 border-b border-gray-50">
                        <p class="text-sm text-gray-900 font-bold">Menu Akun</p>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-user-edit w-5"></i> Edit Profil
                    </a>

                    <a href="{{ route('profile.password') }}" class="block px-4 py-2.5 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-key w-5"></i> Ganti Password
                    </a>

                    <div class="border-t border-gray-50 my-1"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200 flex items-center">
                            <i class="fas fa-sign-out-alt w-5"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
