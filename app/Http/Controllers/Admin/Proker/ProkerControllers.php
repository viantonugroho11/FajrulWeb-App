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
class ProkerControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
