<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Koperasi BRI')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* BRI Color Palette */
        :root {
            --bri-primary: #003d82;
            --bri-secondary: #0066cc;
            --bri-accent: #0088ff;
            --bri-dark: #002147;
        }

        .bri-primary { background-color: var(--bri-primary); }
        .bri-secondary { background-color: var(--bri-secondary); }
        .text-bri-primary { color: var(--bri-primary); }
        .text-bri-secondary { color: var(--bri-secondary); }
        .border-bri-primary { border-color: var(--bri-primary); }

        .gradient-bri {
            background: linear-gradient(135deg, var(--bri-primary) 0%, var(--bri-secondary) 50%, var(--bri-accent) 100%);
        }

        .gradient-bri-reverse {
            background: linear-gradient(135deg, var(--bri-accent) 0%, var(--bri-secondary) 50%, var(--bri-primary) 100%);
        }

        /* Elegant Shadow System */
        .shadow-elegant {
            box-shadow:
                0 2px 4px rgba(0, 61, 130, 0.04),
                0 4px 8px rgba(0, 61, 130, 0.06),
                0 8px 16px rgba(0, 61, 130, 0.08);
        }

        .shadow-elegant-lg {
            box-shadow:
                0 4px 6px rgba(0, 61, 130, 0.05),
                0 10px 20px rgba(0, 61, 130, 0.1),
                0 20px 40px rgba(0, 61, 130, 0.15);
        }

        .shadow-elegant-xl {
            box-shadow:
                0 10px 20px rgba(0, 61, 130, 0.08),
                0 20px 40px rgba(0, 61, 130, 0.12),
                0 30px 60px rgba(0, 61, 130, 0.16);
        }

        /* Smooth Animations */
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .animate-slideIn {
            animation: slideIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 30px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: rgba(0, 61, 130, 0.08);
            border-radius: 50%;
            animation: particle 20s infinite linear;
        }

        @keyframes particle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-10vh) rotate(720deg);
                opacity: 0;
            }
        }

        /* Gradient Background */
        .gradient-background {
            background:
                radial-gradient(circle at 20% 50%, rgba(0, 61, 130, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(0, 102, 204, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(0, 136, 255, 0.03) 0%, transparent 50%),
                linear-gradient(135deg, #f8fafc 0%, #e3f2fd 50%, #f5f9ff 100%);
        }

        /* Skeleton Loading */
        #skeleton-loader {
            position: fixed;
            inset: 0;
            background: #f8fafc;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }

        .skeleton-content {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .skeleton-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(90deg, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
            border-radius: 50%;
        }

        .skeleton-text {
            width: 200px;
            height: 24px;
            background: linear-gradient(90deg, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
            border-radius: 4px;
        }

        .skeleton-card {
            width: 100%;
            height: 300px;
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .skeleton-input {
            width: 100%;
            height: 48px;
            background: linear-gradient(90deg, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
            border-radius: 0.75rem;
            margin-bottom: 1rem;
        }

        @keyframes skeleton-loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        @yield('styles')
    </style>
</head>
<body class="min-h-screen gradient-background flex items-center justify-center py-8 px-4 relative overflow-hidden">

    <!-- Skeleton Loader -->
    <div id="skeleton-loader">
        <div class="skeleton-content">
            <div class="skeleton-logo"></div>
            <div class="skeleton-text"></div>
            <div class="skeleton-card">
                <div class="skeleton-input" style="margin-top: 2rem"></div>
                <div class="skeleton-input"></div>
                <div class="skeleton-input" style="width: 50%"></div>
            </div>
        </div>
    </div>

    <!-- Particle Background -->
    <div class="particles">
        @for ($i = 0; $i < 15; $i++)
            <div class="particle" style="left: {{ rand(5, 95) }}%; animation-delay: {{ rand(0, 50) / 10 }}s; animation-duration: {{ rand(15, 25) }}s;"></div>
        @endfor
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full" style="opacity: 0; transition: opacity 0.5s ease-in;" id="main-content">
        @yield('content')
    </div>

    <script>
        // Skeleton Loader Logic
        window.addEventListener('load', function() {
            const loader = document.getElementById('skeleton-loader');
            const content = document.getElementById('main-content');

            setTimeout(() => {
                loader.style.opacity = '0';
                loader.style.visibility = 'hidden';
                content.style.opacity = '1';
            }, 800); // Slight delay for smoother feel
        });

        // SweetAlert2 Configuration
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // Global Alert Handler
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#003d82',
                confirmButtonText: 'OK',
                background: '#fff',
                backdrop: `rgba(0,0,123,0.1)`,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#003d82',
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                html: '<ul style="text-align: left;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                confirmButtonColor: '#003d82',
            });
        @endif
    </script>
    @yield('scripts')
</body>
</html>
