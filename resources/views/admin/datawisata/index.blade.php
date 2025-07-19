<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Wisata</title>
    {{-- Load Tailwind via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            <h1 class="text-2xl font-semibold mb-1">Data Wisata</h1>
            <p class="text-gray-600 mb-4">Kelola seluruh informasi terkait Desa Wisata Sangurejo</p>

            {{-- Kartu Ringkasan Menu --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Tentang Kami --}}
                <a href="/admin/datawisata/tentang-kami" class="bg-white rounded-lg shadow p-4 hover:bg-blue-50 transition">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-blue-600 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-semibold text-lg">Tentang Kami</h3>
                            <p class="text-sm text-gray-500">Deskripsi dan sejarah desa wisata</p>
                        </div>
                    </div>
                </a>

                {{-- Carousel --}}
                <a href="/admin/datawisata/carousel" class="bg-white rounded-lg shadow p-4 hover:bg-blue-50 transition">
                    <div class="flex items-center">
                        <i class="fas fa-images text-blue-600 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-semibold text-lg">Carousel</h3>
                            <p class="text-sm text-gray-500">Kelola gambar slider utama</p>
                        </div>
                    </div>
                </a>

                {{-- Event --}}
                <a href="/admin/datawisata/event" class="bg-white rounded-lg shadow p-4 hover:bg-blue-50 transition">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt text-blue-600 text-2xl mr-4"></i>
                        <div>
                            <h3 class="font-semibold text-lg">Event</h3>
                            <p class="text-sm text-gray-500">Kelola acara dan kegiatan</p>
                        </div>
                    </div>
                </a>

            </div>
        </main>
    </div>

</body>
</html>
