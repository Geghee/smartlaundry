<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order - SmartLaundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans antialiased">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="bg-blue-600 p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-blue-100 text-xs uppercase tracking-widest font-bold">Cloud SaaS Platform</p>
                    <h1 class="text-2xl font-extrabold">SmartLaundry</h1>
                </div>
                <div class="bg-blue-500 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="攜12h-4m-2 0H5a2 2 0 00-2 2v11a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2H9" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                <span class="w-1.5 h-6 bg-blue-600 rounded-full mr-3"></span>
                Tambah Order Baru
            </h2>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                    <ul class="text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/orders" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" placeholder="Masukan nama lengkap..." 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor WhatsApp</label>
                        <input type="text" name="no_hp" placeholder="0812..." 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Layanan</label>
                        <select name="jenis_laundry" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all outline-none appearance-none">
                            <option>Cuci Kering</option>
                            <option>Cuci Setrika</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Berat Cucian</label>
                    <div class="relative">
                        <input type="number" step="0.1" name="berat" placeholder="0.0" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all outline-none">
                        <span class="absolute right-4 top-3.5 text-slate-400 font-medium">kg</span>
                    </div>
                </div>

                <div class="pt-4 space-y-3">
                    <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-95">
                        Konfirmasi & Simpan Pesanan
                    </button>
                    <a href="/orders" class="block text-center text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                        ← Kembali ke Dashboard
                    </a>
                </div>
            </form>
        </div>
        
        <div class="bg-slate-50 p-4 text-center border-t border-slate-100">
            <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">
                Semarang Cloud Infrastructure • UTS 2026
            </p>
        </div>
    </div>
</div>

</body>
</html>