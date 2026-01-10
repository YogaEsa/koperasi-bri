@props(['title' => '', 'subtitle' => ''])

<div class="max-w-md w-full mx-auto space-y-8 animate-fadeInUp">
    <!-- Logo & Header -->
    <div class="text-center animate-slideIn">
        <div class="mx-auto w-24 h-24 flex items-center justify-center mb-6 animate-float">
            <img src="{{ asset('assets/images/Logo.png') }}"
                 alt="Logo Koperasi BRI"
                 class="w-full h-full object-contain drop-shadow-2xl"
                 style="filter: drop-shadow(0 10px 30px rgba(0, 61, 130, 0.2));">
        </div>

        @if($title)
            <h1 class="text-4xl font-bold text-gray-900 mb-3 tracking-tight">
                {{ $title }}
            </h1>
        @endif

        @if($subtitle)
            <p class="text-base text-gray-600 font-medium animate-slideIn" style="animation-delay: 0.2s;">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    <!-- Card Content -->
    <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-elegant-xl border border-white/50 overflow-hidden animate-fadeInUp" style="animation-delay: 0.3s;">
        <div class="p-10">
            {{ $slot }}
        </div>
    </div>
</div>
