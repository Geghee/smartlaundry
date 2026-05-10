<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartLaundry - Cloud Laundry SaaS</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen">

    {{-- NAVBAR --}}
    <header class="w-full border-b bg-white sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center gap-3">

                <div class="bg-blue-600 p-2 rounded-xl shadow-lg">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>

                    </svg>

                </div>

                <div>

                    <h1 class="font-black text-xl">
                        SmartLaundry
                    </h1>

                    <p class="text-xs text-slate-400">
                        Laundry SaaS Platform
                    </p>

                </div>

            </div>

            <div class="flex items-center gap-3">

                @auth

                    <a href="{{ url('/dashboard') }}"
                       class="bg-blue-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-blue-700 transition">

                        Dashboard

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="text-slate-600 hover:text-blue-600 font-medium transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="border border-slate-300 px-5 py-2 rounded-xl font-medium hover:bg-slate-100 transition">

                        Register

                    </a>

                @endauth

            </div>

        </div>

    </header>

    {{-- HERO --}}
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- LEFT --}}
            <div>

                <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-bold mb-6">

                    🚀 Cloud Based SaaS System

                </div>

                <h1 class="text-5xl font-black leading-tight mb-6">

                    Kelola Laundry
                    Lebih Cepat,
                    Modern,
                    dan Digital.

                </h1>

                <p class="text-slate-500 text-lg leading-relaxed mb-8">

                    SmartLaundry membantu UMKM laundry mengelola order,
                    invoice PDF, QR tracking, dashboard statistik,
                    dan monitoring pelanggan secara real-time.

                </p>

                <div class="flex flex-col sm:flex-row gap-4">

                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold text-center hover:bg-blue-700 transition hover:scale-105">

                        Mulai Sekarang

                    </a>

                    <a href="#fitur"
                       class="bg-white border border-slate-300 px-8 py-4 rounded-2xl font-bold text-center hover:bg-slate-100 transition hover:scale-105">

                        Pelajari Fitur

                    </a>

                </div>

            </div>

            {{-- RIGHT --}}
        
        </div>

    </section>

    {{-- FITUR --}}
    <section id="fitur"
             class="bg-white py-20 border-t">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-black mb-4">

                    Fitur SmartLaundry

                </h2>

                <p class="text-slate-500">

                    Sistem laundry modern berbasis cloud infrastructure.

                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- CARD --}}
                <div class="bg-slate-50 p-6 rounded-2xl shadow hover:scale-105 transition">

                    <div class="text-4xl mb-4">📄</div>

                    <h3 class="font-bold text-xl mb-2">
                        Invoice PDF
                    </h3>

                    <p class="text-slate-500 text-sm">
                        Generate nota otomatis dan siap print.
                    </p>

                </div>

                <div class="bg-slate-50 p-6 rounded-2xl shadow hover:scale-105 transition">

                    <div class="text-4xl mb-4">📊</div>

                    <h3 class="font-bold text-xl mb-2">
                        Dashboard Statistik
                    </h3>

                    <p class="text-slate-500 text-sm">
                        Monitoring order dan pendapatan laundry.
                    </p>

                </div>

                <div class="bg-slate-50 p-6 rounded-2xl shadow hover:scale-105 transition">

                    <div class="text-4xl mb-4">🔎</div>

                    <h3 class="font-bold text-xl mb-2">
                        Customer Tracking
                    </h3>

                    <p class="text-slate-500 text-sm">
                        Pelanggan bisa tracking laundry real-time.
                    </p>

                </div>

                <div class="bg-slate-50 p-6 rounded-2xl shadow hover:scale-105 transition">

                    <div class="text-4xl mb-4">📱</div>

                    <h3 class="font-bold text-xl mb-2">
                        QR Code Tracking
                    </h3>

                    <p class="text-slate-500 text-sm">
                        Scan QR untuk melihat status laundry.
                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- FLOW --}}
    <section class="py-20">

        <div class="max-w-6xl mx-auto px-6">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-black mb-4">

                    Alur Sistem

                </h2>

                <p class="text-slate-500">

                    Sistem berjalan otomatis dan real-time.

                </p>

            </div>

            <div class="grid md:grid-cols-5 gap-6 text-center">

                <div class="bg-white p-6 rounded-2xl shadow">
                    Customer
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    Input Order
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    Generate Invoice
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    QR Tracking
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    Laundry Selesai
                </div>

            </div>

        </div>

    </section>

    {{-- PRICING --}}
    <section class="bg-white py-20 border-t">

        <div class="max-w-6xl mx-auto px-6">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-black mb-4">

                    Paket SmartLaundry

                </h2>

                <p class="text-slate-500">

                    Pilih paket sesuai kebutuhan bisnis laundry.

                </p>

            </div>

            <div class="grid md:grid-cols-2 gap-8">

                {{-- BASIC --}}
                <div class="border p-8 rounded-3xl shadow">

                    <h3 class="text-3xl font-black mb-2">
                        Basic
                    </h3>

                    <p class="text-slate-500 mb-8">
                        Gratis untuk UMKM kecil.
                    </p>

                    <ul class="space-y-4">

                        <li>✅ CRUD Order</li>
                        <li>✅ Dashboard</li>
                        <li>✅ Status Laundry</li>
                        <li>❌ PDF Invoice</li>
                        <li>❌ QR Code</li>

                    </ul>

                </div>

                {{-- PREMIUM --}}
                <div class="bg-blue-600 text-white p-8 rounded-3xl shadow-2xl hover:scale-105 transition">

                    <div class="flex items-center gap-3 mb-4">

                        <h3 class="text-3xl font-black">
                            Premium
                        </h3>

                        <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-xs font-bold">

                            PREMIUM

                        </span>

                    </div>

                    <p class="opacity-80 mb-8">
                        Untuk laundry modern berbasis cloud.
                    </p>

                    <ul class="space-y-4">

                        <li>✅ Semua fitur Basic</li>
                        <li>✅ PDF Invoice</li>
                        <li>✅ QR Tracking</li>
                        <li>✅ Dashboard Grafik</li>
                        <li>✅ WhatsApp Notification</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    {{-- TECHNOLOGY --}}
    <section class="py-20">

        <div class="max-w-6xl mx-auto px-6 text-center">

            <h2 class="text-4xl font-black mb-10">

                Teknologi yang Digunakan

            </h2>

            <div class="flex flex-wrap justify-center gap-4">

                <span class="bg-white px-6 py-3 rounded-full shadow">
                    Laravel 12
                </span>

                <span class="bg-white px-6 py-3 rounded-full shadow">
                    Tailwind CSS
                </span>

                <span class="bg-white px-6 py-3 rounded-full shadow">
                    MySQL
                </span>

                <span class="bg-white px-6 py-3 rounded-full shadow">
                    DomPDF
                </span>

                <span class="bg-white px-6 py-3 rounded-full shadow">
                    QR Code
                </span>

                <span class="bg-white px-6 py-3 rounded-full shadow">
                    Cloud Infrastructure
                </span>

            </div>

        </div>

    </section>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-white py-10">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-2xl font-black mb-2">

                SmartLaundry

            </h2>

            <p class="text-slate-400 mb-4">

                Cloud Laundry Management System

            </p>

            <p class="text-xs text-slate-500 uppercase tracking-widest">

                Built with Laravel • Tailwind CSS • Cloud Infrastructure

            </p>

        </div>

    </footer>

</body>
</html>