<x-app-layout>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center mb-6">

                <h1 class="text-3xl font-bold">

                    Data Laundry

                </h1>

                <a href="/orders/create"
                   class="bg-green-500 text-white px-5 py-3 rounded-lg">

                    + Tambah Order

                </a>

            </div>

            {{-- Search --}}

            <div class="bg-white p-4 rounded-xl shadow mb-6">

                <form action="/orders" method="GET"
                      class="flex gap-3">

                    <input type="text"
                           name="search"
                           placeholder="Cari nama atau no HP"
                           class="border rounded-lg px-4 py-2 w-full">

                    <button type="submit"
                            class="bg-blue-500 text-white px-5 rounded-lg">

                        Cari

                    </button>

                </form>

            </div>

            {{-- Table --}}

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-200">

                        <tr>

                            <th class="p-4 text-left">Customer</th>
                            <th class="p-4 text-left">No HP</th>
                            <th class="p-4 text-left">Jenis</th>
                            <th class="p-4 text-left">Berat</th>
                            <th class="p-4 text-left">Total</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-left">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                        <tr class="border-t">

                            <td class="p-4">

                                {{ $order->nama_pelanggan }}

                            </td>

                            <td class="p-4">

                                {{ $order->no_hp }}

                            </td>

                            <td class="p-4">

                                {{ $order->jenis_laundry }}

                            </td>

                            <td class="p-4">

                                {{ $order->berat }} Kg

                            </td>

                            <td class="p-4">

                                Rp {{ $order->total_harga }}

                            </td>

                            <td class="p-4">

                                <form action="/orders/{{ $order->id }}/status"
                                    method="POST"
                                    class="flex gap-2">

                                    @csrf
                                    @method('PUT')

                                    <select name="status_order"
                                            class="border rounded px-2 py-1">

                                        <option value="Diproses"
                                            {{ $order->status_order == 'Diproses' ? 'selected' : '' }}>

                                            Diproses

                                        </option>

                                        <option value="Dicuci"
                                            {{ $order->status_order == 'Dicuci' ? 'selected' : '' }}>

                                            Dicuci

                                        </option>

                                        <option value="Disetrika"
                                            {{ $order->status_order == 'Disetrika' ? 'selected' : '' }}>

                                            Disetrika

                                        </option>

                                        <option value="Selesai"
                                            {{ $order->status_order == 'Selesai' ? 'selected' : '' }}>

                                            Selesai

                                        </option>

                                    </select>
                                    <select name="payment_status"
                                            class="border rounded px-2 py-1">

                                        <option value="Belum Lunas"
                                            {{ $order->payment_status == 'Belum Lunas' ? 'selected' : '' }}>

                                            Belum Lunas

                                        </option>

                                        <option value="Lunas"
                                            {{ $order->payment_status == 'Lunas' ? 'selected' : '' }}>

                                            Lunas

                                        </option>

                                    </select>

                                    <button type="submit"
                                            class="bg-yellow-500 text-white px-3 rounded">

                                        Update

                                    </button>

                                </form>

                            </td>
 {{-- AKSI --}}

                            <td class="p-4 flex gap-2">

                                <a href="/orders/{{ $order->id }}"
                                    class="bg-blue-500 text-white px-3 py-2 rounded">

                                        Nota

                                    </a>

                                    @if(auth()->user()->plan == 'premium')

                                    <a href="{{ route('orders.invoice', $order->id) }}"
                                    class="bg-purple-500 text-white px-3 py-2 rounded">

                                        PDF

                                    </a>

                                    @else

                                    <button
                                        onclick="premiumAlert()"
                                        class="bg-gray-400 text-white px-3 py-2 rounded cursor-not-allowed">

                                        🔒 PDF

                                    </button>

                                    @endif
                                    @if(auth()->user()->plan == 'premium')

                                    <a href="https://wa.me/{{ $order->no_hp }}"
                                    target="_blank"
                                    class="bg-green-500 text-white px-3 py-2 rounded">

                                        WhatsApp

                                    </a>

                                    @else

                                    <button
                                        onclick="premiumAlert()"
                                        class="bg-gray-400 text-white px-3 py-2 rounded cursor-not-allowed">

                                        🔒 WhatsApp

                                    </button>

                                    @endif

                                @if(auth()->user()->role == 'admin')

                                <form action="/orders/{{ $order->id }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-2 rounded">

                                        Hapus

                                    </button>

                                </form>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>