<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)

                <header class="bg-white dark:bg-gray-800 shadow">

                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                        {{ $header }}

                    </div>

                </header>

            @endisset

            <!-- Page Content -->
            <main>

                {{ $slot }}

            </main>

        </div>

        {{-- SWEET ALERT --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- PREMIUM ALERT --}}
        <script>

            function premiumAlert() {

                Swal.fire({

                    title: 'Premium Feature 🔒',

                    text: 'Upgrade ke Premium untuk membuka fitur ini.',

                    icon: 'warning',

                    confirmButtonText: 'Mengerti',

                    confirmButtonColor: '#2563eb',

                    background: '#ffffff',

                    color: '#1e293b',

                    borderRadius: '20px'

                });

            }

        </script>

        {{-- SUCCESS TOAST --}}
        @if(session('success'))

        <script>

            Swal.fire({

                icon: 'success',

                title: 'Berhasil',

                text: '{{ session('success') }}',

                timer: 2000,

                showConfirmButton: false,

                toast: true,

                position: 'top-end'

            });

        </script>

        @endif

    </body>
</html>