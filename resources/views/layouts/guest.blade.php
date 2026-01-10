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

        @yield('styles')
    </style>
</head>
<body class="min-h-screen gradient-background flex items-center justify-center py-8 px-4 relative overflow-hidden">

    <!-- Particle Background -->
    <div class="particles">
        @for ($i = 0; $i < 15; $i++)
            <div class="particle" style="left: {{ rand(5, 95) }}%; animation-delay: {{ rand(0, 50) / 10 }}s; animation-duration: {{ rand(15, 25) }}s;"></div>
        @endfor
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
