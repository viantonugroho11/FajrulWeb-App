<?php

namespace App\Http\Controllers\Admin\Kategori;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
//str
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class KategoriArtikelControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'nama'=>'required'
        ]);
        $kategori = KategoriArtikel::create([
            'id'=>Uuid::uuid4()->toString(),
            'nama_kategori'=>$request->nama,
            'slug'=>Str::slug($request->nama),
            'icon'=>'null',
        ]);

        if($request->file('icon')!=null){
            //simpan icon storage
            $image = $request->file('icon');
            $image->storeAs('public/kategori-artikel/', $image->hashName());
            //simpan icon database
            $kategori->update([
                'icon'=>$image->hashName()
            ]);
        }
        if ($kategori) {
            return redirect()->route('admin.kategori-artikel.index')->with('success','Data berhasil ditambahkan');
        }else{
            return redirect()->route('admin.kategori-artikel.index')->with('error','Data gagal ditambahkan');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = KategoriArtikel::findorfail($id);
        return view('admin.kategori.edit',compact('kategori'));
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
        $kategori=KategoriArtikel::find($id);
        $this->validate($request, [
            'nama' => 'required'
        ]);
        // $kategori = KategoriArtikel::create([
        //     'nama' => $request->nama,
        //     'slug' => Str::slug($request->nama),
        //     'icon' => 'null',
        // ]);

        $kategori->update([
            'nama_kategori'=>$request->nama,
        ]);

        if ($request->file('icon') != null) {
            //simpan icon storage
            $image = $request->file('icon');
            $image->storeAs('public/kategori-artikel/', $image->hashName());
            //simpan icon database
            $kategori->update([
                'icon' => $image->hashName()
            ]);
        }
        if ($kategori) {
            return redirect()->route('kategori-artikel.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('kategori-artikel.index')->with('error', 'Data gagal ditambahkan');
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
        $kategori = KategoriArtikel::find($id);
        $kategori->delete();
        return redirect()->route('kategori-artikel.index')->with('success', 'Data berhasil dihapus');
    }
}
