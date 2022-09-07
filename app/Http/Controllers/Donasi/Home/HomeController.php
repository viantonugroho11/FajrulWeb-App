<?php

namespace App\Http\Controllers\Donasi\Home;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\KabarBeritaDonasi;
use App\Models\TransaksiDonasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kabarberita = KabarBeritaDonasi::orderBy('created_at', 'desc')->with('donasi')->take(3)->get();
        $kampanye = Donasi::orderBy('created_at', 'desc')->with('kategori_donasi')->take(3)->get();
        $sumtransaksi = TransaksiDonasi::sum('nominal');
        $counttransaksi = TransaksiDonasi::count();
        $countdonasi = Donasi::count();
        return view('donasi.home.index', compact('kabarberita', 'kampanye', 'sumtransaksi', 'counttransaksi', 'countdonasi'));
    }
}
