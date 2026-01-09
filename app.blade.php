<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Koperasi BRI')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS via CDN (for shared hosting) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bri-primary': '#003d82',
                        'bri-secondary': '#0066cc',
                        'bri-accent': '#f8f9fa',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                }
            }
        }
    </script>

    <style>
        :root {
            --bri-primary: #003d82;
            --bri-secondary: #0066cc;
            --bri-accent: #f8f9fa;
            --bri-success: #28a745;
            --bri-warning: #ffc107;
            --bri-danger: #dc3545;
            --bri-gray: #6c757d;
            --bri-light-gray: #f5f5f5;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bri-accent);
        }

        .bri-primary {
            background-color: var(--bri-primary) !important;
        }

        .bri-secondary {
            background-color: var(--bri-secondary) !important;
        }

        .text-bri-primary {
            color: var(--bri-primary) !important;
        }

        .text-bri-secondary {
            color: var(--bri-secondary) !important;
        }

        .border-bri-primary {
            border-color: var(--bri-primary) !important;
        }

        .shadow-bri {
            box-shadow: 0 10px 25px -3px rgba(0, 61, 130, 0.1), 0 4px 6px -2px rgba(0, 61, 130, 0.05);
        }

        .gradient-bri {
            background: linear-gradient(135deg, var(--bri-primary) 0%, var(--bri-secondary) 100%);
        }

        .border-l-3 {
            border-left-width: 3px;
