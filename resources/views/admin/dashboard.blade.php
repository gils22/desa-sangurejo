<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Desa Wisata Sangurejo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Load Tailwind via Vite --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

</head>

<body class="bg-gray-100 flex">

    {{-- Sidebar --}}
    @include('components.admin.sidebar')

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        @include('components.admin.navbar')

        {{-- Content --}}
        <main class="p-6">
            <h1 class="text-2xl font-semibold mb-6">Selamat Datang, Admin</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-blue-600 text-2xl font-bold">6</p>
                    <p>Pengunjung Hari ini</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-blue-600 text-2xl font-bold">12</p>
                    <p>Jumlah Booking</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-blue-600 text-2xl font-bold">18</p>
                    <p>Jumlah Paket</p>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
