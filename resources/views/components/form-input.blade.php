@props([
    'type' => 'text',
    'name',
    'label',
    'icon' => null,
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'showPasswordToggle' => false
])

<div class="animate-slideIn" style="animation-delay: {{ $attributes->get('delay', '0s') }};">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-3 tracking-wide">
            @if($icon)
                <i class="{{ $icon }} mr-2 text-bri-primary"></i>
            @endif
            {{ $label }}
            @if($required)
                <span class="text-red-500 ml-1">*</span>
            @endif
        </label>
    @endif

    <div class="relative group">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-all duration-300 bg-white/70 backdrop-blur-sm hover:bg-white hover:border-gray-300 focus:bg-white text-gray-800 placeholder-gray-400"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->except(['delay']) }}
        >

        @if($showPasswordToggle && $type === 'password')
            <button
                type="button"
                onclick="togglePassword('{{ $name }}')"
                class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-gray-700 transition-colors duration-200 focus:outline-none"
            >
                <i class="fas fa-eye text-lg" id="{{ $name }}-eye"></i>
            </button>
        @endif

        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400 to-blue-600 opacity-0 group-focus-within:opacity-10 transition-opacity duration-300 pointer-events-none"></div>
    </div>
</div>

@if($showPasswordToggle && $type === 'password')
    @once
        @push('scripts')
        <script>
            function togglePassword(fieldName) {
                const passwordInput = document.getElementById(fieldName);
                const eyeIcon = document.getElementById(fieldName + '-eye');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            }
        </script>
        @endpush
    @endonce
@endif
