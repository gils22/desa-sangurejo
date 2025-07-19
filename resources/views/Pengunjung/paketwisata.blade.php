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

<section class="products" id="paket-wisata">
  <h2>Paket Wisata</h2>

  <div class="paketall">
    @foreach ($pakets as $index => $paket)
      <div class="paket-1">
        <h3>PAKET {{ $index + 1 }}</h3>
        <img src="{{ asset('img/' . $paket->gambar) }}" alt="{{ $paket->judul }}" class="paket-img">
        <div class="paket-nama">{{ $paket->judul }}</div>
        <a href="#" class="btn-selengkapnya">Selengkapnya</a>
      </div>
    @endforeach
  </div>
</section>
@endsection
