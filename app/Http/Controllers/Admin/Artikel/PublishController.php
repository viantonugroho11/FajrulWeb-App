<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PublishController extends Controller
{
    public function indexPublish($id)
    {
        $artikel = Artikel::FindOrFail($id);
        if($artikel->penulis == Auth::user()->id)
        {
            return redirect()->route('artikel.index')->withErrors('Anda tidak dapat Publish tulisan sendiri');
        }
        return view('admin.artikel.publish',compact('artikel'));
    }
    public function publish(Request $request,$id)
    {
        $artikel = Artikel::FindOrFail($id);
        $artikel->update([
            "nama_artikel" => $request->judul,
            "slug" => Str::slug($request->judul),
            "isi_singkat" => $request->isi_singkat,
            "isi_artikel" => $request->detail,
            // "gambar",
            "kategori_artikel_id" => $request->kategori,
            // "tanggal_publish" => 'null',
            "publish" => Auth::user()->id,
            // "penulis" => 'null',
            "status" => $request->status,
        ]);
        if ($artikel) {
            return redirect()->route('artikel.index')->withSuccess('Data berhasil ditambahkan');
        } else {
            return redirect()->route('artikel.index')->withErrors('Data gagal ditambahkan');
        }
    }
}
