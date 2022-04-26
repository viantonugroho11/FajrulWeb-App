<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Artikel;
use App\Models\ViewerArtikel;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class BlogControllers extends Controller
{
    public function index()
    {
        $artikel=Artikel::limit(3)->orderby('created_at','desc')->where('status','=','1')->get();
        $acara = Acara::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();

        $artikels=Artikel::orderby('created_at','desc')->where('status','=','1')->paginate(18);
        return view('frontend.article.index',compact('artikels','artikel','acara'));
        // return view('frontend.article.index');
    }

    public function show($id)
    {
        $artikels=Artikel::where('slug',$id)->first();
        SEOMeta::setTitle($artikels->nama_artikel);
        SEOMeta::setDescription($artikels->isi_singkat);
        SEOMeta::addMeta('article:published_time', $artikels->tanggal_publish, 'property');
        SEOMeta::addMeta('article:section', $artikels->kategori_artikel->nama_kategory, 'property');
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
