@extends('Pengunjung.Layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('img/banner.png') }}" alt="Banner"
            class="w-full py-6 px-12 h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] rounded-3xl">

        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white drop-shadow-lg text-center px-4">
                SELAMAT DATANG
            </h1>
        </div>
    </section>


    {{-- About --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-6xl font-bold mb-6 text-gray-900">Desa Wisata Sangurejo</h2>
                <p class="text-xl text-justify text-gray-700 leading-relaxed">
                    Desa wisata Sanngurejo terletak di Sangurejo, Turi, Kab. Sleman, DI Yogyakarta. Sangurejo merupakan
                    desa wisata yang memiliki pemandangan yang indah  dengan alam yang sangat asri dan sangat cocok untuk
                    kegiatan yang berbasis komunitas atau pelajar. Dibalik terbentuknya Desa Wisata Sangurejo terdapat
                    Sejarah  yang melandasi. Adapun Sejarah anatar lain : pada awalnya masyarakat di Desa Sangurejo tidak
                    memiliki angan-angan untuk menjadikan Desa Sangurejo menjadi desa wisata. Dulu ini merupakan sebuah
                    embung atau waduk  yang di beri nama Embung Kaliaji.
                </p>
                <a href="#"
                    class="mt-5 inline-block bg-button text-white px-12 py-1 rounded-full text-[15px] font-semibold hover:bg-hover-button transition">Selengkapnya</a>
            </div>
            <div>
                <img src="{{ asset('img/about.png') }}" class="w-full rounded-2xl">
            </div>
        </div>
    </section>

    {{-- Paket Wisata --}}
    <section class="py-24 bg-teal-700 text-white">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16">Paket Wisata</h2>
            <div class="grid md:grid-cols-3 gap-12">
                @foreach ([['title' => 'PAKET 1', 'image' => 'makrab.png', 'desc' => 'Malam Keakraban'], ['title' => 'PAKET 2', 'image' => 'paket2.png', 'desc' => 'Kegiatan Pramuka'], ['title' => 'PAKET 3', 'image' => 'paket3.png', 'desc' => 'Pernikahan']] as $paket)
                    <div class="bg-white text-gray-900 rounded-2xl p-8 text-center shadow-xl transition hover:scale-105">
                        <h3 class="text-2xl font-bold mb-4">{{ $paket['title'] }}</h3>
                        <img src="{{ asset('img/' . $paket['image']) }}"
                            class="h-56 w-full object-cover rounded-xl mb-6 shadow">
                        <p class="mb-6 text-lg">{{ $paket['desc'] }}</p>
                        <a href="#"
                            class="bg-button text-white px-6 py-3 rounded-xl text-lg hover:bg-hover-button transition">Selengkapnya</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Kegiatan Carousel --}}
    <x-sections.aktivitas-carousel />

    {{-- Review --}}
    <section class="py-24 bg-gray-100">
        <div class="container mx-auto grid md:grid-cols-2 gap-16">
            <div class="bg-white p-10 rounded-2xl shadow-xl">
                <h3 class="text-2xl font-bold mb-4">Beri Ulasan</h3>
                <p class="mb-6 text-gray-600 text-lg">Bagikan pengalaman kamu di Desa Wisata Sangurejo</p>
                <div class="flex space-x-2 mb-6 rating-form">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa-solid fa-star text-gray-300 text-3xl cursor-pointer hover:text-yellow-400"></i>
                    @endfor
                </div>
                <textarea class="w-full border rounded-lg p-4 text-lg mb-6" rows="4" placeholder="Tulis ulasan kamu..."></textarea>
                <button
                    class="bg-teal-600 text-white px-8 py-3 rounded-xl text-lg hover:bg-teal-700 transition">Kirim</button>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-6">Ulasan</h3>
                @foreach ([['name' => 'HappyTraveler', 'review' => 'Wonderful experience! Highly recommend.'], ['name' => 'NatureLover19', 'review' => 'Incredible views and friendly staff.']] as $r)
                    <div class="bg-white p-6 mb-6 rounded-2xl shadow-xl">
                        <div class="flex justify-between items-center mb-3">
                            <div class="font-bold text-lg">{{ $r['name'] }}</div>
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fa-solid fa-star text-xl"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $r['review'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Map --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto text-center">
            <div class="flex justify-center">
                <div class="w-full md:w-[1100px] h-[500px] rounded-2xl overflow-hidden shadow-xl">
                    <div id="map" class="w-full h-full"></div>
                </div>
            </div>
        </div>
    </section>



    {{-- Swiper Script --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const swiper = new Swiper('.mySwiper', {
                    loop: true,
                    centeredSlides: true,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    initialSlide: 2, // <- Mulai dari gambar tengah
                    effect: 'coverflow',
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 300,
                        modifier: 1,
                        slideShadows: false,
                        scale: 1,
                    },
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                        },
                        640: {
                            slidesPerView: 1.5,
                        },
                        1024: {
                            slidesPerView: 3,
                        }
                    }
                });

                const stars = document.querySelector('.rating-form').querySelectorAll('.fa-star');
                stars.forEach((star, index) => {
                    star.addEventListener('click', () => {
                        stars.forEach((s, i) => {
                            s.classList.toggle('text-yellow-400', i <= index);
                            s.classList.toggle('text-gray-300', i > index);
                        });
                    });
                });

                // Map (Leaflet)
                const mapContainer = document.getElementById('map');
                if (mapContainer) {
                    const map = L.map(mapContainer).setView([-7.647887, 110.376182], 17);

                    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                        attribution: '&copy; OpenStreetMap contributors &copy; CartoDB',
                        subdomains: 'abcd',
                        maxZoom: 19
                    }).addTo(map);

                    L.marker([-7.647887, 110.376182])
                        .addTo(map)
                        .bindPopup(`
            <b>Desa Wisata Sangurejo</b><br>Sangurejo, Turi, Sleman.<br>
            <a href="https://www.google.com/maps/search/?api=1&query=-7.647887,110.376182" target="_blank" 
               style="color: #008080; text-decoration: underline; font-weight: bold;">
               Buka di Google Maps
            </a>
        `)
                        .openPopup();
                }
            });
        </script>
    @endpush
@endsection
