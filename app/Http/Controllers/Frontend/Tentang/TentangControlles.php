<?php

namespace App\Http\Controllers\Frontend\Tentang;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Artikel;
use Illuminate\Http\Request;

class TentangControlles extends Controller
{
    public function index()
    {
        $acara = Acara::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();
        $artikel = Artikel::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();
        return view('frontend.tentang.index', compact('acara', 'artikel'));
    }
}
