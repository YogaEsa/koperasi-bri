@extends('layouts.guest')

@section('title', 'Login - Koperasi BRI')

@section('styles')
    .btn-login {
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .btn-login:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow:
            0 10px 25px rgba(0, 61, 130, 0.2),
            0 20px 40px rgba(0, 61, 130, 0.15);
    }

    .btn-login:active {
        transform: translateY(-1px) scale(0.98);
    }

    .btn-login::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-login:hover::before {
        width: 300px;
        height: 300px;
    }

    .checkbox-custom {
        transition: all 0.3s ease;
    }

    .checkbox-custom:checked {
        background-color: var(--bri-primary);
        border-color: var(--bri-primary);
    }

    .divider-elegant {
        position: relative;
        text-align: center;
        margin: 2rem 0;
    }

    .divider-elegant::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(0, 61, 130, 0.1), transparent);
    }

    .divider-elegant span {
        background: white;
        padding: 0 1rem;
        position: relative;
        color: #9ca3af;
        font-size: 0.875rem;
        font-weight: 500;
    }
@endsection

@section('content')
    <x-auth-card
        title="Koperasi BRI"
        subtitle="Sistem Informasi Manajemen Koperasi">

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <x-form-input
                type="email"
                name="email"
                label="Email Address"
                icon="fas fa-envelope"
                placeholder="Masukkan email Anda"
                value=""
                required
                delay="0.5s"
            />

            <!-- Password Input -->
            <x-form-input
                type="password"
                name="password"
                label="Password"
                icon="fas fa-lock"
                placeholder="Masukkan password Anda"
                value=""
                required
                :showPasswordToggle="true"
                delay="0.6s"
            />

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between animate-slideIn" style="animation-delay: 0.7s;">
                <label class="flex items-center group cursor-pointer select-none">
                    <input type="checkbox"
                           name="remember"
                           class="h-5 w-5 text-bri-primary focus:ring-bri-primary border-gray-300 rounded checkbox-custom transition-all duration-200 cursor-pointer">
                    <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors duration-200">
                        Ingat saya
                    </span>
                </label>
                <a href="#" class="text-sm font-semibold text-bri-secondary hover:text-bri-primary transition-all duration-200 hover:underline hover:scale-105 inline-block">
                    Lupa password?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="btn-login group relative w-full flex justify-center items-center py-4 px-6 border border-transparent text-base font-bold rounded-xl text-white gradient-bri focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 animate-slideIn"
                    style="animation-delay: 0.8s;">
                <span class="absolute left-6 inset-y-0 flex items-center">
                    <i class="fas fa-sign-in-alt text-white text-lg group-hover:translate-x-1 transition-transform duration-300"></i>
                </span>
                <span class="relative font-semibold tracking-wide">Masuk ke Dashboard</span>
                <span class="absolute right-6 inset-y-0 flex items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fas fa-arrow-right text-white text-lg"></i>
                </span>
            </button>
        </form>

        <!-- Divider -->
        <div class="divider-elegant animate-fadeInUp" style="animation-delay: 0.9s;">
            <span>Informasi</span>
        </div>

        <!-- Footer Info -->
        <div class="text-center space-y-2 animate-fadeInUp" style="animation-delay: 1s;">
            <div class="flex items-center justify-center space-x-2 text-xs text-gray-500">
                <i class="fas fa-shield-alt text-bri-primary"></i>
                <span>Sistem ini hanya untuk karyawan internal BRI</span>
            </div>
            <p class="text-xs font-semibold text-gray-700">
                © 2026 Bank Rakyat Indonesia
            </p>
            <p class="text-xs text-gray-400">
                Koperasi Simpan Pinjam
            </p>
        </div>
    </x-auth-card>
@endsection

@section('scripts')
    @stack('scripts')
    <script>
        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to button
            const button = document.querySelector('.btn-login');
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;

                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });

            // Form validation styling
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value && this.checkValidity()) {
                        this.classList.add('border-green-400');
                        this.classList.remove('border-red-400');
                    } else if (this.value) {
                        this.classList.add('border-red-400');
                        this.classList.remove('border-green-400');
                    }
                });
            });
        });

        // Add ripple animation keyframe
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection
