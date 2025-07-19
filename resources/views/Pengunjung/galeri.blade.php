@extends('Pengunjung.Layouts.app')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="banner">
                <img src="{{ asset('img/banner.png') }}" alt="Banner Desa" class="gambarbanner">
                <div class="selamat-datang">SELAMAT DATANG</div>
            </div>
        </div>
    </section>

    <section class="tentangkami">
        <div class="box">
          <div class="judul-box">Tentang Kami</div>
          <div class="deskripsi">
              Desa wisata Sanngurejo terletak di Sangurejo, Turi, Kab. Sleman, DI
        Yogyakarta. Sangurejo merupakan desa wisata yang memiliki pemandangan
        yang indah  dengan alam yang sangat asri dan sangat cocok untuk kegiatan
        yang berbasis komunitas atau pelajar. Dibalik terbentuknya Desa Wisata
        Sangurejo terdapat Sejarah  yang melandasi. Adapun Sejarah anatar lain :
        pada awalnya masyarakat di Desa Sangurejo tidak memiliki angan-angan
        untuk menjadikan Desa Sangurejo menjadi desa wisata. Dulu ini merupakan
        sebuah embung atau waduk  yang di beri nama Embung Kaliaji.
        <br />
        <br />
        Kemudian pada tahun 2012 dikarenakan pengunjung banyak yang berdatangan
        dan perkembangan yang semakin maju maka diolahlah menjadi suatu
        destinasi. Kemudian dari pihak destinasi Sangurejo melaporkan ke Dinas
        Pariwisata untuk menjadikan destinasi wisata. Dan pada tahun 2014
        destinasi wisata baru bealajar mengenai tata pengelolaan dari
        pendatang-pendatang selaku pengelihat wisata, dan akhirnya dibikin
        struktur secara perlahan lahan dan kemudian mendaftarkan diri ke Dinas
        Pariwisata sebagai desa wisata pada tahun 2016  dan dipadukan dengan Pok
        Darwis.
        <br />
        <br />
        Di Desa Wisata Sangurejo ini awalnya merupakan satu keluarga dan
        kemudian keturunannya  menjadi satu kampung. Desa wisata ini dibuat
        menggunakan sumbangan dari dana keistimewan yang dikelola sehingga
        terciptanya Desa Wisata Sangurejo.
          </div> 
        </div>
    </section>

    

<section class="social-posts">
  <div class="container">
    <div class="title">Aktivitas</div>
    <svg class="vector-200" height="1" xmlns="http://www.w3.org/2000/svg"><line x1="0" y1="0" x2="100%" y2="0" stroke="#ccc" /></svg>
  </div>

  <div class="carousel">
    <div class="swiper aktivitasSwiper slides-box">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('img/aktivitas1.jpg') }}" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('img/aktivitas2.jpg') }}" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('img/aktivitas3.jpg') }}" />
        </div>
      </div>
    </div>

    <div class="slides-navigation">
      <div class="click-area" id="prevBtn">
        <img class="arrow-left" src="{{ asset('img/panah-kiri.svg') }}" alt="prev">
      </div>

      <div class="slide-indicator">
        <div class="dot-indictaor-1"><div class="dot-indictaor"></div></div>
        <div class="dot-indictaor-2"><div class="dot-indictaor2"></div></div>
        <div class="dot-indictaor-3"><div class="dot-indictaor2"></div></div>
        <div class="dot-indictaor-4"><div class="dot-indictaor2"></div></div>
        <div class="dot-indictaor-5"><div class="dot-indictaor2"></div></div>
      </div>

      <div class="click-area" id="nextBtn">
        <img class="arrow-right" src="{{ asset('img/panah-kanan.svg') }}" alt="next">
      </div>
    </div>
  </div>
</section>
@endsection
