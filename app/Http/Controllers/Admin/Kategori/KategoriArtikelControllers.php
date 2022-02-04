<?php

namespace App\Http\Controllers\Admin\Kategori;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
//str
use Illuminate\Support\Str;
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
            'nama'=>$request->nama,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
