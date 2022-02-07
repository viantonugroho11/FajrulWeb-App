<?php

namespace App\Http\Controllers\Frontend\Landing;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Acara;
use Illuminate\Http\Request;

class LandingControllers extends Controller
{
    public function index()
    {
        $artikel=Artikel::limit(3)->orderby('created_at','desc')->where('status','=','1')->get();
        $acara = Acara::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();
        // $acara=Acara::limit(3)->orderby('created_at','desc')->get();
        return view('users.landing.index',compact('artikel','acara'));
        // return view('users.landing.index',compact('artikel'));
    }
}
