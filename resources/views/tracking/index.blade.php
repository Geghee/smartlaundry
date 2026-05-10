<!DOCTYPE html>
<html>

<head>

    <title>Tracking Laundry</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded shadow">

    <h1 class="text-3xl font-bold mb-6 text-center">

        Tracking Laundry

    </h1>

    <form action="/tracking" method="POST">

        @csrf

        <input type="text"
               name="no_hp"
               placeholder="Masukkan No HP"
               class="w-full border rounded px-4 py-3 mb-4">

        <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded">

            Cek Status

        </button>

    </form>

</div>

</body>
</html>