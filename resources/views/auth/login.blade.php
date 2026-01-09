<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Koperasi BRI</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom BRI Styling -->
    <style>
        * { font-family: 'Inter', sans-serif; }

        .bri-primary { background-color: #003d82; }
        .bri-secondary { background-color: #0066cc; }
        .text-bri-primary { color: #003d82; }
        .text-bri-secondary { color: #0066cc; }

        .gradient-bri {
            background: linear-gradient(135deg, #003d82 0%, #0066cc 100%);
        }

        .shadow-bri {
            box-shadow: 0 20px 40px -12px rgba(0, 61, 130, 0.25), 0 8px 16px -4px rgba(0, 61, 130, 0.1);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .animate-slideIn {
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 2s infinite;
        }

        @keyframes bounce-slow {
            0%, 20%, 53%, 80%, 100% { transform: translateY(0); }
            40%, 43% { transform: translateY(-10px); }
            70% { transform: translateY(-5px); }
        }

        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 61, 130, 0.15);
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 61, 130, 0.3);
        }

        .logo-glow {
            box-shadow: 0 0 30px rgba(0, 61, 130, 0.3), 0 0 60px rgba(0, 61, 130, 0.1);
        }

        /* Particle Background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(0, 61, 130, 0.1);
            border-radius: 50%;
            animation: particle 15s infinite linear;
        }

        @keyframes particle {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-100px) rotate(720deg); opacity: 0; }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 flex items-center justify-center py-12 px-4 relative overflow-hidden">

    <!-- Particle Background -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 4.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 1.5s;"></div>
    </div>

    <div class="max-w-md w-full space-y-8 relative z-10 animate-fadeInUp">
        <!-- Header -->
        <div class="text-center animate-slideIn">
            <div class="mx-auto h-24 w-24 gradient-bri rounded-full flex items-center justify-center shadow-bri logo-glow animate-float">
                <i class="fas fa-university text-white text-3xl animate-bounce-slow"></i>
            </div>
            <h2 class="mt-8 text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                Koperasi BRI
            </h2>
            <p class="mt-3 text-base text-gray-600 animate-slideIn" style="animation-delay: 0.2s;">
                Sistem Informasi Manajemen Koperasi
            </p>
        </div>

        <!-- Form -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-bri p-10 border border-white/20 animate-fadeInUp" style="animation-delay: 0.3s;">
            <form class="space-y-8">
                <!-- Email -->
                <div class="animate-slideIn" style="animation-delay: 0.5s;">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-envelope mr-2 text-bri-primary"></i>
                        Email Address
                    </label>
                    <input type="email"
                           class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 input-focus bg-white/50"
                           placeholder="Masukkan email Anda" value="admin@koperasi.bri">
                </div>

                <!-- Password -->
                <div class="animate-slideIn" style="animation-delay: 0.6s;">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-lock mr-2 text-bri-primary"></i>
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" id="password"
                               class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 input-focus pr-14 bg-white/50"
                               placeholder="Masukkan password Anda" value="admin123">
                        <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <i class="fas fa-eye text-lg" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between animate-slideIn" style="animation-delay: 0.7s;">
                    <label class="flex items-center group cursor-pointer">
                        <input type="checkbox" class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-transform duration-200 group-hover:scale-110">
                        <span class="ml-3 text-sm text-gray-700 group-hover:text-gray-900 transition-colors duration-200">Ingat saya</span>
                    </label>
                    <a href="#" class="text-sm font-semibold text-bri-secondary hover:text-bri-primary transition-colors duration-200 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="button" onclick="window.location.href='/dashboard'"
                        class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-semibold rounded-xl text-white gradient-bri focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 btn-hover animate-slideIn"
                        style="animation-delay: 0.8s;">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-4">
                        <i class="fas fa-sign-in-alt text-white text-lg group-hover:scale-110 transition-transform duration-200"></i>
                    </span>
                    <span class="relative">Masuk ke Dashboard</span>
                    <div class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8 animate-fadeInUp" style="animation-delay: 0.9s;">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white/80 text-gray-500">Atau</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center animate-fadeInUp" style="animation-delay: 1s;">
                <p class="text-xs text-gray-500 leading-relaxed">
                    Sistem ini hanya untuk karyawan internal BRI<br>
                    <span class="font-semibold">© 2026 Bank Rakyat Indonesia</span>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

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

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add pulse effect to logo on hover
            const logo = document.querySelector('.logo-glow');
            logo.addEventListener('mouseenter', function() {
                this.style.animation = 'float 6s ease-in-out infinite, pulse 1s ease-in-out';
            });
            logo.addEventListener('mouseleave', function() {
                this.style.animation = 'float 6s ease-in-out infinite';
            });
        });
    </script>
</body>
</html>
