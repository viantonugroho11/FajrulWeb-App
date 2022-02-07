<?php

namespace App\Http\Controllers\Admin\Divisi;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DivisiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = Divisi::select('*');
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('divisi.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('divisi.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.divisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.divisi.create');
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
            'nama'=>'required',
            'kategori'=>'required',
        ]);

        $divisi=Divisi::created([
            'nama'=>$request->nama,
            'regional'=>$request->kategori,
        ]);
        if($divisi){
            return redirect()->route('divisi.index')->with('success','Data berhasil ditambahkan');
        }else{
            return redirect()->route('divisi.index')->with('error','Data gagal ditambahkan');
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
        $divisi=Divisi::find($id);
        return view('admin.divisi.edit',compact('divisi'));
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
        $this->validate($request, [
            'nama' => 'required',
            'kategori' => 'required',
        ]);
        $divisi=Divisi::find($id);
        $divisi->update([
            'nama' => $request->nama,
            'regional' => $request->kategori,
        ]);
        if($divisi){
            return redirect()->route('divisi.index')->with('success','Data berhasil diubah');
        }else{
            return redirect()->route('divisi.index')->with('error','Data gagal diubah');
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
        $divisi=Divisi::find($id);
        $divisi->delete();
        if($divisi){
            return redirect()->route('divisi.index')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('divisi.index')->with('error','Data gagal dihapus');
        }
    }
}
