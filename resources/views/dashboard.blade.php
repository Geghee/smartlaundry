<x-app-layout>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <h1 class="text-4xl font-bold mb-8">

                SmartLaundry Dashboard

            </h1>
            @if(auth()->user()->plan == 'premium')

            <span class="bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow">

                PREMIUM

            </span>

            @else

            <span class="bg-gray-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow">

                FREE

            </span>

            @endif

            {{-- Statistik --}}

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-xl shadow">

                    <h2 class="text-gray-500">

                        Total Order

                    </h2>

                    <p class="text-3xl font-bold">

                        {{ $totalOrder }}

                    </p>

                </div>

                <div class="bg-white p-6 rounded-xl shadow">

                    <h2 class="text-gray-500">

                        Diproses

                    </h2>

                    <p class="text-3xl font-bold">

                        {{ $diproses }}

                    </p>

                </div>

                <div class="bg-white p-6 rounded-xl shadow">

                    <h2 class="text-gray-500">

                        Selesai

                    </h2>

                    <p class="text-3xl font-bold">

                        {{ $selesai }}

                    </p>

                </div>

                <div class="bg-white p-6 rounded-xl shadow">

                    <h2 class="text-gray-500">

                        Pendapatan

                    </h2>

                    <p class="text-3xl font-bold">

                        Rp {{ $pendapatan }}

                    </p>

                </div>

            </div>
           @if(auth()->user()->plan == 'premium')

            <div class="bg-white p-6 rounded shadow mt-6">

                <h2 class="text-xl font-bold mb-4">
                    Grafik Laundry
                </h2>

                <canvas id="laundryChart"></canvas>

            </div>

            @else

            <div class="bg-white p-6 rounded shadow mt-6 relative">

                <div class="absolute inset-0 bg-white/70 backdrop-blur-sm flex items-center justify-center rounded">

                    <div class="text-center">

                        <h2 class="text-2xl font-bold mb-2">
                            🔒 Premium Feature
                        </h2>

                        <p class="text-gray-600 mb-4">
                            Upgrade untuk membuka Analytics Dashboard
                        </p>

                        <button
                            onclick="premiumAlert()"
                            class="bg-yellow-500 text-white px-5 py-2 rounded">

                            Upgrade Premium

                        </button>

                    </div>

                </div>

                <h2 class="text-xl font-bold mb-4">
                    Grafik Laundry
                </h2>

                <canvas></canvas>

            </div>

            @endif

            {{-- Menu Cepat --}}

            <div class="mt-10 bg-white p-6 rounded-xl shadow">

                <h2 class="text-2xl font-bold mb-5">

                    Menu Cepat

                </h2>

                <div class="flex gap-4 flex-wrap">

                    <a href="/orders"
                       class="bg-blue-500 text-white px-5 py-3 rounded-lg">

                        Data Laundry

                    </a>

                    <a href="/orders/create"
                       class="bg-green-500 text-white px-5 py-3 rounded-lg">

                        Tambah Order

                    </a>

                </div>

            </div>

        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
@if(auth()->user()->plan == 'premium')

<script>

const ctx = document
    .getElementById('laundryChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Diproses',
            'Selesai'
        ],

        datasets: [{

            label: 'Jumlah Order',

            data: [
                {{ $diproses }},
                {{ $selesai }}
            ],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {
                beginAtZero: true
            }

        }

    }

});

</script>

@endif
</x-app-layout>