<!DOCTYPE html>
<html>

<head>

    <title>Hasil Tracking</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded shadow">

    <h1 class="text-3xl font-bold mb-6">

        Status Laundry

    </h1>

    @if($order)

        <div class="space-y-3">

            <p>
                <strong>Nama:</strong>
                {{ $order->nama_pelanggan }}
            </p>

            <p>
                <strong>No HP:</strong>
                {{ $order->no_hp }}
            </p>

            <p>
                <strong>Jenis Laundry:</strong>
                {{ $order->jenis_laundry }}
            </p>

            <p>
                <strong>Status Laundry:</strong>
                {{ $order->status_order }}
            </p>

            <p>
                <strong>Status Pembayaran:</strong>
                {{ $order->payment_status }}
            </p>

        </div>

    @else

        <p class="text-red-500">

            Data tidak ditemukan

        </p>

    @endif

</div>

</body>
</html>