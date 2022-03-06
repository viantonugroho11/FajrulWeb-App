<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Artikel;
use App\Models\ViewerArtikel;
use Illuminate\Http\Request;

class BlogControllers extends Controller
{
    public function index()
    {
        $artikel=Artikel::limit(3)->orderby('created_at','desc')->where('status','=','1')->get();
        $acara = Acara::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();

        $artikels=Artikel::orderby('created_at','desc')->where('status','=','1')->paginate(20);
        return view('frontend.article.index',compact('artikels','artikel','acara'));
        // return view('frontend.article.index');
    }

    public function show($id)
    {
        $artikels=Artikel::where('slug',$id)->first();
        $artikel=Artikel::limit(3)->orderby('created_at','desc')->where('status','=','1')->get();
        $acara = Acara::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();
        ViewerArtikel::create([
            'artikel_id' => $artikels->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return view('frontend.article.show',compact('artikels','artikel','acara'));
        // return view('frontend.article.show',compact('artikel','acara'));
    }
}
