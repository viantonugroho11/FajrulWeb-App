<?php

namespace App\Http\Controllers\Admin\Acara;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\DaftarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class AcaraControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = Acara::select('*');
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('acara.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('acara.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    //form detail
                    $formdetail = '<a href="' . route('acara.show', $row->id) . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '<br/>'
                    . $formdetail . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.acara.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.acara.create');
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
            'tgl_kegiatan'=>'required',
            'bts_pedaftaran'=>'required',
            'bts_peserta'=>'required',
            'status'=>'required',
            'status_acara'=>'required',
            'deskripsi'=>'required',
            'detail'=>'required',
        ]);
        $acara = Acara::create([
            'id'=>Uuid::uuid4()->toString(),
            "nama"=>$request->nama,
            "slug"=>Str::slug($request->nama),
            "tanggal_kegiatan"=>$request->tgl_kegiatan,
            "batas_pendaftaran"=>$request->bts_pedaftaran,
            "jumlah_peserta"=>$request->bts_peserta,
            "status"=>$request->status,
            "status_event"=>$request->status_acara,
            "deskripsi_singkat"=>$request->deskripsi,
            "deskripsi"=>$request->detail,
            "tempat"=>$request->tempat,
            "gambar"=>"null",
        ]);
        if($request->file('gambar')!=null){
            //simpan icon storage
            $image = $request->file('gambar');
            $image->storeAs('public/acara/', $image->hashName());
            //simpan icon database
            $acara->update([
                'gambar'=>$image->hashName()
            ]);
        }
        if ($acara) {
            return redirect()->route('acara.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('acara.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if ($request->ajax()) {
            $kategori = DaftarEvent::select('*')->where('event_id',$id);
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('acara.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    $btn = $formdelete . '
                        <br/>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $acara = Acara::find($id);
        return view('admin.acara.show',compact('acara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acara = Acara::findorfail($id);
        return view('admin.acara.edit',compact('acara'));
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
        $acara = Acara::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'tgl_kegiatan' => 'required',
            'bts_pedaftaran' => 'required',
            'bts_peserta' => 'required',
            'status' => 'required',
            'status_acara' => 'required',
            'deskripsi' => 'required',
            'detail' => 'required',
        ]);
        $acara->update([
            "nama" => $request->nama,
            "slug" => Str::slug($request->nama),
            "tanggal_kegiatan" => $request->tgl_kegiatan,
            "batas_pendaftaran" => $request->bts_pedaftaran,
            "jumlah_peserta" => $request->bts_peserta,
            "status" => $request->status,
            "status_event" => $request->status_acara,
            "deskripsi_singkat" => $request->deskripsi,
            "deskripsi" => $request->detail,
            "tempat" => $request->tempat,
        ]);
        if ($request->file('gambar') != null) {
            //simpan icon storage
            $image = $request->file('gambar');
            $image->storeAs('public/acara/', $image->hashName());
            //simpan icon database
            $acara->update([
                'gambar' => $image->hashName()
            ]);
        }
        if($acara){
            return redirect()->route('acara.index')->with('success','Data berhasil diubah');
        }else{
            return redirect()->route('acara.index')->with('error','Data gagal diubah');
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
        $acara = Acara::find($id);
        $acara->delete();
        if($acara){
            return redirect()->route('acara.index')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('acara.index')->with('error','Data gagal dihapus');
        }
    }

    public function createPeserta($id)
    {
        return view('admin.acara.peserta.create',compact('id'));
    }

    public function storePeserta(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
        ]);
        $acara = Acara::find($id);
        $peserta = DaftarEvent::create([
            'id'=>Uuid::uuid4()->toString(),
            "nama" => $request->nama,
            "email" => $request->email,
            "event_id" => $acara->id,
        ]);

        if($peserta){
            return redirect()->route('acara.show',$acara->id)->with('success','Data berhasil ditambahkan');
        }else{
            return redirect()->route('acara.show',$acara->id)->with('error','Data gagal ditambahkan');
        }
    }

    public function createPesertaNotif()
    {
        return view('admin.acara.peserta.create_notif');
    }
}
