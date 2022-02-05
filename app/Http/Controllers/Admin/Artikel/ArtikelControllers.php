<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ArtikelControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriArtikel::all();
        return view('admin.artikel.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'artikel'=>'required',
            'kategori'=>'required',
            'status'=>'required',
        ]);
        $artikel = Artikel::create([
            'id'=>Uuid::uuid4()->toString(),
            "nama_artikel"=>$request->judul,
            "slug"=>Str::slug($request->judul),
            "isi_artikel"=>$request->artikel,
            // "gambar",
            "kategori_artikel_id"=>$request->kategori,
            "tanggal_publish"=>'null',
            "publish"=>'null',
            "penulis"=>'null',
            "status"=>$request->status,
        ]);
        if($request->file('foto')!=null){
            //simpan icon storage
            $image = $request->file('foto');
            $image->storeAs('public/artikel/', $image->hashName());
            //simpan icon database
            $artikel->update([
                'gambar'=>$image->hashName()
            ]);
        }
        if ($artikel) {
            return redirect()->route('admin.artikel.index')->with('success','Data berhasil ditambahkan');
        }else{
            return redirect()->route('admin.artikel.index')->with('error','Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.artikel.show',compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel=Artikel::findorfail($id);
        $kategori=KategoriArtikel::all();
        return view('admin.artikel.edit',compact('artikel','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel=Artikel::find($id);
        $this->validate($request, [
            'judul' => 'required',
            'artikel' => 'required',
            'kategori' => 'required',
            'status' => 'required',
        ]);
        $artikel->update([
            // 'id' => Uuid::uuid4()->toString(),
            "nama_artikel" => $request->judul,
            "slug" => Str::slug($request->judul),
            "isi_artikel" => $request->artikel,
            // "gambar",
            "kategori_artikel_id" => $request->kategori,
            "tanggal_publish" => 'null',
            "publish" => 'null',
            "penulis" => 'null',
            "status" => $request->status,
        ]);
        if ($request->file('foto') != null) {
            //simpan icon storage
            $image = $request->file('foto');
            $image->storeAs('public/artikel/', $image->hashName());
            //simpan icon database
            $artikel->update([
                'gambar' => $image->hashName()
            ]);
        }
        if ($artikel) {
            return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('admin.artikel.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();
        if ($artikel) {
            return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('admin.artikel.index')->with('error', 'Data gagal ditambahkan');
        }
    }
}
