<?php

namespace App\Http\Controllers\Frontend\Acara;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Artikel;
use App\Models\DaftarEvent;
use Illuminate\Http\Request;

class AcaraControllers extends Controller
{
    public function index(){
        $acara = Acara::paginate(12);
        return view('frontend.event.index', compact('acara'));
        // return view('frontend.event.index');
    }
    public function show($id){
        $event = Acara::where('slug','=',$id)->first();
        $artikel = Artikel::limit(3)->orderby('created_at', 'desc')->where('status', '=', '1')->get();
        return view('frontend.event.show', compact('event','artikel'));
        // return view('frontend.event.show');
    }
    public function store(Request $request, $id){
        $event = Acara::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            // 'pesan' => 'required',
        ]);
        $daftarevent = DaftarEvent::create([
            'nama' => $request->nama,
            'email' => $request->email,
            // 'pesan' => $request->pesan,
        ]);
        // $event->peserta()->create($request->all());
        return redirect()->back()->with('success', 'Peserta berhasil ditambahkan');
    }
}
