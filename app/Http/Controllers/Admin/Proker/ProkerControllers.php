<?php

namespace App\Http\Controllers\Admin\Proker;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Proker;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ProkerControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = Proker::select('*');
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('artikel.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('artikel.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    //form detail
                    $formdetail = '<a href="' . route('artikel.show', $row->id) . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . ''
                        . $formdetail . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.proker.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = Divisi::all();
        return view('admin.proker.create',compact('divisi'));
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
            'status'=>'required',
            'divisi'=>'required',
            'detail'=>'required',
        ]);

        $proker = Proker::create([
            'id'=>Uuid::uuid4()->toString(),
            'nama'=>$request->nama,
            'slug'=>Str::slug($request->nama),
            // 'gambar',
            'deskripsi'=>$request->detail,
            'status'=>$request->status,
        ]);
        if($request->hasFile('icon')){
            $image=$request->file('icon');
            $image->storeAs('public/artikel/', $image->hashName());
            $proker->update([
                'gambar'=>$image->hashName()
            ]);
        }
        if ($proker) {
            return redirect()->route('proker.index')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->route('proker.index')->withErrors('Data gagal ditambahkan');
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
        $proker = Proker::findOrFail($id);
        return view('admin.proker.show',compact('proker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proker = Proker::findOrFail($id);
        $divisi = Divisi::all();
        return view('admin.proker.edit',compact('proker','divisi'));
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
        $proker = Proker::findOrFail($id);
        $this->validate($request,[
            'nama'=>'required',
            'status'=>'required',
            'divisi'=>'required',
            'detail'=>'required',
        ]);

        $proker->update([
            'id'=>Uuid::uuid4()->toString(),
            'nama'=>$request->nama,
            'slug'=>Str::slug($request->nama),
            // 'gambar',
            'deskripsi'=>$request->detail,
            'status'=>$request->status,
        ]);
        if($request->hasFile('icon')){
            $image=$request->file('icon');
            $image->storeAs('public/artikel/', $image->hashName());
            $proker->update([
                'gambar'=>$image->hashName()
            ]);
        }
        if ($proker) {
            return redirect()->route('proker.index')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->route('proker.index')->withErrors('Data gagal ditambahkan');
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
        $proker = Proker::findOrFail($id);
        $proker->delete();
        if($proker){
            return redirect()->route('proker.index')->withSuccess('Data berhasil dihapus');
        }else{
            return redirect()->route('proker.index')->withErrors('Data gagal dihapus');
        }
    }
}
