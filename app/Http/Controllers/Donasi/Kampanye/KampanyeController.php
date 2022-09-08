<?php

namespace App\Http\Controllers\Donasi\Kampanye;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\KabarBeritaDonasi;
use App\Models\KategoriDonasi;
use App\Models\TransaksiDonasi;
use Illuminate\Http\Request;

class KampanyeController extends Controller
{
    public function index(Request $request)
    {
        if($request->category ==null){
            $kampanye = Donasi::orderBy('created_at', 'DESC')->paginate(9);
        }else{
            $kampanye = Donasi::where('status', 1)->wherehas('kategori_donasi', function($query) use ($request){
                $query->where('slug', $request->category);
            })->orderBy('created_at', 'DESC')->paginate(9);
        }
        //     dd($kampanye);
        $kategori = KategoriDonasi::all();
        return view('donasi.kampanye.index', compact('kampanye', 'kategori'));
    }

    public function show($slug)
    {
        $kampanye = Donasi::where('slug', $slug)->first();
        $kabarberita=KabarBeritaDonasi::where('donasi_id', $kampanye->id)->limit(3)->latest()->get();
        $transaksi = TransaksiDonasi::where('donasi_id', $kampanye->id)->where('status',1)->limit(3)->latest()->get();
        return view('donasi.kampanye.show', compact('kampanye', 'kabarberita', 'transaksi'));
        // return view('donasi.kampanye.show', compact('kampanye'));
    }
}
