<aside class="w-64 h-screen bg-emerald-600 text-white flex flex-col" x-data="{ wisataOpen: {{ request()->is('admin/datawisata*') ? 'true' : 'false' }} }">
    <div class="p-2 my-2 font-bold text-lg flex items-center space-x-2">
        <img src="/img/logo.png" alt="Logo" class="w-8 h-8 object-contain">
        <span>Desa Wisata Sangurejo</span>
    </div>

    <nav class="flex-1 mt-4 px-2 space-y-1">
        {{-- Dashboard --}}
        <a href="/admin/dashboard"
           class="flex items-center px-4 py-2 rounded hover:bg-emerald-500 hover:text-white transition {{ request()->is('admin/dashboard') ? 'bg-emerald-800' : '' }}">
            <i class="fas fa-home mr-3 w-5"></i> Dashboard
        </a>

        {{-- Dropdown: Data Wisata --}}
        <button
            @click="wisataOpen = !wisataOpen"
            class="w-full flex items-center justify-between px-4 py-2 rounded hover:bg-emerald-500 transition {{ request()->is('admin/datawisata*') ? 'bg-emerald-800' : '' }}">
            <span class="flex items-center">
                <i class="fas fa-database mr-3 w-5"></i> Data Wisata
            </span>
            <i :class="wisataOpen ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-sm transition-all duration-200"></i>
        </button>

        <div x-show="wisataOpen" x-transition class="ml-8 mt-1 flex flex-col space-y-1 text-sm">
            <a href="/admin/datawisata/tentang-kami"
               class="block px-2 py-1 rounded hover:bg-emerald-500 transition {{ request()->is('admin/datawisata/tentang-kami') ? 'bg-emerald-800' : '' }}">
                Tentang Kami
            </a>
            <a href="/admin/datawisata/carousel"
               class="block px-2 py-1 rounded hover:bg-emerald-500 transition {{ request()->is('admin/datawisata/carousel') ? 'bg-emerald-800' : '' }}">
                Carousel
            </a>
            <a href="/admin/datawisata/event"
               class="block px-2 py-1 rounded hover:bg-emerald-500 transition {{ request()->is('admin/datawisata/event') ? 'bg-emerald-800' : '' }}">
                Event
            </a>
        </div>

        {{-- Menu lainnya --}}
        <a href="/admin/paketdestinasi"
           class="flex items-center px-4 py-2 rounded hover:bg-emerald-500 transition {{ request()->is('admin/paketdestinasi') ? 'bg-emerald-800' : '' }}">
            <i class="fas fa-map-marked-alt mr-3 w-5"></i> Paket Destinasi
        </a>
        <a href="/admin/galeri"
           class="flex items-center px-4 py-2 rounded hover:bg-emerald-500 transition {{ request()->is('admin/galeri') ? 'bg-emerald-800' : '' }}">
            <i class="fas fa-images mr-3 w-5"></i> Galeri
        </a>
        <a href="/admin/kalender"
           class="flex items-center px-4 py-2 rounded hover:bg-emerald-500 transition {{ request()->is('admin/kalender') ? 'bg-emerald-800' : '' }}">
            <i class="fas fa-calendar-alt mr-3 w-5"></i> Kalender
        </a>
        <a href="/admin/kunjungan"
           class="flex items-center px-4 py-2 rounded hover:bg-emerald-500 transition {{ request()->is('admin/kunjungan') ? 'bg-emerald-800' : '' }}">
            <i class="fas fa-walking mr-3 w-5"></i> Kunjungan
        </a>
        <a href="/admin/booking"
           class="flex items-center px-4 py-2 rounded hover:bg-emerald-500 transition {{ request()->is('admin/booking') ? 'bg-emerald-800' : '' }}">
            <i class="fas fa-book mr-3 w-5"></i> Booking
        </a>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer></script>
</aside>
