<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Nota Laundry #{{ $order->id }} - SmartLaundry
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        @media print {

            .print\:hidden {
                display: none;
            }

            body {
                background: white;
            }

        }

    </style>

</head>

<body class="bg-gray-100 font-sans p-4 sm:p-8">

<div class="max-w-2xl mx-auto bg-white shadow-2xl rounded-sm overflow-hidden border-t-8 border-blue-600">

    {{-- HEADER --}}

    <div class="p-6 border-b border-gray-100 flex justify-between items-start">

        <div>

            <h1 class="text-3xl font-black text-blue-600 tracking-tighter">
                SMARTLAUNDRY
            </h1>

            <p class="text-gray-500 text-xs mt-1">
                Solusi Laundry Digital Berbasis Cloud
            </p>

            <p class="text-gray-400 text-[10px]">
                Jl. Pedurungan Raya No. 12, Semarang
            </p>

        </div>

        <div class="text-right">

            <h2 class="text-xl font-bold text-gray-800">
                INVOICE
            </h2>

            <p class="text-gray-500 text-sm">
                #ORD-{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}
            </p>

            <p class="text-gray-500 text-sm">
                Tanggal:
                {{ $order->created_at->format('d/m/Y') }}
            </p>

        </div>

    </div>

    {{-- CUSTOMER --}}

    <div class="p-6 grid grid-cols-2 gap-4">

        <div>

            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">
                Penerima:
            </h3>

            <p class="font-bold text-gray-800">
                {{ $order->nama_pelanggan }}
            </p>

            <p class="text-gray-600 text-sm">
                {{ $order->no_hp }}
            </p>

        </div>

        <div class="text-right">

            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">
                Status Pembayaran:
            </h3>

            @if($order->payment_status == 'Lunas')

            <span class="inline-block bg-green-100 text-green-700 text-[10px] font-bold px-3 py-1 rounded-full">

                LUNAS

            </span>

            @else

            <span class="inline-block bg-red-100 text-red-700 text-[10px] font-bold px-3 py-1 rounded-full">

                BELUM LUNAS

            </span>

            @endif

        </div>

    </div>

    {{-- TABLE --}}

    <div class="px-6 py-2">

        <table class="w-full text-left border-collapse">

            <thead>

                <tr class="bg-gray-50 text-gray-600 text-xs uppercase">

                    <th class="p-3 border">
                        Deskripsi Layanan
                    </th>

                    <th class="p-3 border text-center">
                        Berat
                    </th>

                    <th class="p-3 border text-right">
                        Subtotal
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr class="text-gray-700">

                    <td class="p-3 border font-medium">
                        {{ $order->jenis_laundry }}
                    </td>

                    <td class="p-3 border text-center">
                        {{ $order->berat }} Kg
                    </td>

                    <td class="p-3 border text-right font-semibold">
                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                    </td>

                </tr>

            </tbody>

            <tfoot>

                <tr class="bg-blue-50">

                    <td colspan="2"
                        class="p-3 text-right font-bold text-gray-700">

                        TOTAL PEMBAYARAN

                    </td>

                    <td class="p-3 text-right font-black text-blue-600 text-xl">

                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}

                    </td>

                </tr>

            </tfoot>

        </table>

    </div>

    {{-- STATUS + PREMIUM QR --}}

    <div class="p-8 text-center bg-white">

        <p class="text-sm text-gray-600">

            Status Pengerjaan:

            <span class="font-bold text-blue-600">

                {{ $order->status_order }}

            </span>

        </p>

        @if(auth()->user()->plan == 'premium')

        <div class="mt-6">

            <div class="inline-block p-4 border-2 border-dashed border-gray-200 rounded-xl">

                <p class="text-xs font-bold text-gray-400 uppercase mb-2 tracking-widest">

                    Scan Tracking

                </p>

                <div class="p-4 bg-white inline-block border border-gray-100 rounded-lg shadow-inner">

                    @php

                        $trackingUrl =
                        "http://10.130.13.32:8000/tracking/" .
                        ($order->invoice_number ?? $order->id);

                    @endphp

                    {!! QrCode::size(120)->generate($trackingUrl) !!}

                </div>

            </div>

        </div>

        @else

        <p class="text-xs text-gray-400 mt-4">

            Upgrade ke Premium untuk fitur QR Tracking Customer

        </p>

        @endif

        <p class="text-[10px] text-gray-400 mt-6">

            * Harap simpan nota ini sebagai bukti pengambilan cucian.

        </p>

    </div>

</div>

{{-- BUTTON ACTION --}}

<div class="max-w-2xl mx-auto mt-4">

    <div class="p-6 bg-gray-50 rounded-xl flex gap-3 print:hidden shadow">

        <a href="/orders"
           class="flex-1 text-center bg-white border border-gray-300 text-gray-700 py-3 rounded-lg font-bold hover:bg-gray-100 transition">

            Kembali

        </a>

        <button onclick="window.print()"
                class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 shadow-lg transition">

            🖨 Cetak Struk

        </button>

    </div>

</div>

<p class="text-center text-gray-400 text-[10px] mt-8 uppercase tracking-widest">

    Cloud Infrastructure System • UTS Informatika 2026

</p>

</body>
</html>