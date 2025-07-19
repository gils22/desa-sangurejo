<header class="bg-primary text-white shadow sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        {{-- Logo --}}
        <div class="flex items-center space-x-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Sangurejo" class="h-10 rounded-full">
            <span class="text-xl font-bold">Desa Wisata Sangurejo</span>
        </div>

        {{-- Hamburger Button (Mobile Only) --}}
        <button id="menu-toggle" class="md:hidden text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>

        {{-- Navigation --}}
        <nav id="nav-menu" class="hidden md:flex space-x-6 text-sm">
            <a href="/" class="hover:text-yellow-300">Home</a>
            <a href="/tentangkami" class="hover:text-yellow-300">Tentang Kami</a>
            <a href="#" class="hover:text-yellow-300">Paket Wisata</a>
            <a href="#" class="hover:text-yellow-300">Galeri</a>
            <a href="#" class="hover:text-yellow-300">Kalender</a>
        </nav>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="md:hidden hidden bg-teal-700 text-center py-4 space-y-4">
        <a href="#" class="block hover:text-yellow-300">Home</a>
        <a href="#" class="block hover:text-yellow-300">Tentang Kami</a>
        <a href="#" class="block hover:text-yellow-300">Paket Wisata</a>
        <a href="#" class="block hover:text-yellow-300">Galeri</a>
        <a href="#" class="block hover:text-yellow-300">Kalender</a>
    </div>
</header>

{{-- Tambahkan JS untuk toggle --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
@endpush
