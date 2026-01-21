<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind configuration (প্রয়োজন হলে) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'neutral': {
                            'primary-soft': '#f8fafc',
                            'secondary-medium': '#e2e8f0',
                            'default': '#cbd5e1',
                            'default-medium': '#94a3b8'
                        },
                        'body': '#475569',
                        'heading': '#1e293b',
                        'fg-brand': '#3b82f6'
                    },
                    borderRadius: {
                        'base': '0.5rem'
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
    @include('layouts.navbar')

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('sweet.alert', (event) => {
            Swal.fire({
                title: "Good job!",
                text: event.message,
                icon: "success"
            });
        });
    </script>
</body>
</html>
