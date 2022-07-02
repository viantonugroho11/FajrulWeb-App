<?php

namespace App\Http\Controllers\Admin\Donasi\Kategori;

use App\Http\Controllers\Controller;
use App\Models\KategoriDonasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class KategoriControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = KategoriDonasi::select('*');
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('donasi.kategori-donasi.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('donasi.kategori-donasi.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.donasi.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donasi.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_donasi,title',
        ]);

        $kategori = KategoriDonasi::create([
            'title' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);
        if($request->file('icon')){
            $file = $request->file('icon');
            $kategori->uploadImageAttribute($file);
            $kategori->update([
                'icon' => $file->hashName(),
            ]);
        }

        return redirect()->route('admin.donasi.kategori-donasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $kategoridonasi = KategoriDonasi::findOrFail($id);
        // return view('admin.donasi.kategori.show', compact('kategoridonasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoridonasi = KategoriDonasi::findOrFail($id);
        return view('admin.donasi.kategori.edit', compact('kategoridonasi'));
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
        $request->validate([
            'nama' => 'required|unique:kategori_donasi,title,' . $id,
        ]);

        $kategoridonasi = KategoriDonasi::findOrFail($id);
        $kategoridonasi->update([
            'title' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);
        if($request->file('icon')){
            $file = $request->file('icon');
            $kategoridonasi->uploadImageAttribute($file);
            $kategoridonasi->update([
                'icon' => $file->hashName(),
            ]);
        }

        return redirect()->route('admin.donasi.kategori-donasi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoridonasi = KategoriDonasi::findOrFail($id);
        if($kategoridonasi->icon){
            $kategoridonasi->deleteImageAttribute();
        }
        $kategoridonasi->delete();
        if($kategoridonasi){
            return redirect()->route('admin.donasi.kategori-donasi.index')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('admin.donasi.kategori-donasi.index')->with('error', 'Data gagal dihapus');
        }
    }
}
