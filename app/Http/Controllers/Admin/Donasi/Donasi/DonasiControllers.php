<?php

namespace App\Http\Controllers\Admin\Donasi\Donasi;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\KategoriDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class DonasiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = Donasi::select('*');
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('kategori-artikel.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('kategori-artikel.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.donasi.donasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoridonasi = KategoriDonasi::all();
        return view('admin.donasi.donasi.create', compact('kategoridonasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'kategori' => 'required',
            'target' => 'required',
            'target_tanggal' => 'required',
            'status' => 'required',
            'isi_singkat' => 'required',
            'detail' => 'required',
        ]);

        $donasi = Donasi::create([
            'id'=>Uuid::uuid4(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'kategori_donasi_id' => $request->kategori,
            'target_donasi' => $request->target,
            'target_tanggal_donasi' => $request->target_tanggal,
            'status' => $request->status,
            'short_description' => $request->isi_singkat,
            'description' => $request->detail,
            'admin_id' => Auth::user()->id,
        ]);
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $file = $this->uploadImageAsset($request, 'storage/donasi/', 'goto');
            $donasi->update([
                'image' => $file->hashName(),
            ]);
        }
        if($donasi){
            //redirect dengan pesan sukses
            return redirect()->route('admin.donasi.kampanye.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.donasi.kampanye.index')->with(['error' => 'Data Gagal Disimpan!']);
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
