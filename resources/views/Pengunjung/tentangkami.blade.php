@extends('Pengunjung.Layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('img/banner.png') }}" alt="Banner Desa" class="w-full h-[600px] object-cover">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-5xl font-bold text-white drop-shadow-lg">SELAMAT DATANG</h1>
        </div>
    </section>

    {{-- Tentang Kami --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto max-w-5xl">
            <h2 class="text-4xl font-bold mb-8 text-gray-900 text-center">Tentang Kami</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Desa wisata Sangurejo terletak di Sangurejo, Turi, Kab. Sleman, DI Yogyakarta. Sangurejo merupakan desa
                wisata yang memiliki pemandangan yang indah dengan alam yang sangat asri dan sangat cocok untuk kegiatan
                yang berbasis komunitas atau pelajar.
                <br><br>
                Dibalik terbentuknya Desa Wisata Sangurejo terdapat sejarah yang melandasi. Awalnya masyarakat di Desa
                Sangurejo tidak memiliki angan-angan untuk menjadikan desa Sangurejo menjadi desa wisata. Dulu ini merupakan
                sebuah embung atau waduk yang diberi nama Embung Kaliaji.
                <br><br>
                Pada tahun 2012, dikarenakan pengunjung banyak yang berdatangan dan perkembangan semakin maju, maka diolah
                menjadi suatu destinasi. Kemudian dilaporkan ke Dinas Pariwisata untuk menjadikan destinasi wisata. Pada
                tahun 2014, pengelolaan mulai belajar dari pendatang-pendatang selaku pengelihat wisata, dibuat struktur
                secara perlahan dan mendaftarkan diri ke Dinas Pariwisata sebagai desa wisata pada tahun 2016 dan dipadukan
                dengan Pok Darwis.
                <br><br>
                Desa Wisata Sangurejo ini awalnya merupakan satu keluarga dan kemudian keturunannya menjadi satu kampung.
                Desa wisata ini dibuat menggunakan sumbangan dari dana keistimewaan yang dikelola sehingga terciptanya Desa
                Wisata Sangurejo.
            </p>
        </div>
    </section>

    {{-- Aktivitas Carousel --}}
    <x-sections.aktivitas-carousel />
@endsection
