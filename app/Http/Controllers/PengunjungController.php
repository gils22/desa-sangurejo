<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function home()
    {
        return view('pengunjung.home');
    }

    public function tentang()
    {
        return view('pengunjung.tentangkami');
    }

    public function paket()
{
    $pakets = [
        (object)[ 'kode' => 'paket 1', 'judul' => 'Makrab', 'gambar' => 'makrab.png' ],
        (object)[ 'kode' => 'paket 2', 'judul' => 'Sikrab', 'gambar' => 'sikrab.png' ],
        (object)[ 'kode' => 'paket 3', 'judul' => 'Wedding', 'gambar' => 'wedding.png' ],
        (object)[ 'kode' => 'paket 4', 'judul' => 'Camping', 'gambar' => 'camping.png' ],
        (object)[ 'kode' => 'paket 5', 'judul' => 'Pramuka', 'gambar' => 'pramuka.png' ],
        (object)[ 'kode' => 'paket 6', 'judul' => 'Homestay', 'gambar' => 'homestay.png' ],
    ];

    return view('pengunjung.paketwisata', compact('pakets'));
}


    public function galeri()
    {
        return view('pengunjung.galeri');
    }

    public function kalender()
    {
        return view('pengunjung.kalender');
    }
}
