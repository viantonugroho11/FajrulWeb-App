<?php

namespace App\Http\Controllers\Admin\Acara;

use App\Exports\Acara\TemplatePesertaImport;
use App\Imports\Acara\PesertaImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AcaraExportImport extends Controller
{
    public function template()
    {
        return Excel::download(new TemplatePesertaImport, 'template-peserta.xlsx');
    }

    public function import(Request $request,$id)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = $file->hashName();
        // dd($nama_file);
        //temporary file
        $file->storeAs('public/ImportPeserta/', $nama_file);

        // dd($path);
        // import data
        // $import = new SiswaImport();
        // $import->onlySheets('Worksheet 1', 'Worksheet 3');
        $import = Excel::import(new PesertaImport, storage_path('app/public/ImportPeserta/' . $nama_file));
        // dd($import);

        //remove from server
        Storage::delete(storage_path('app/public/ImportPeserta/' . $nama_file));

        if ($import) {
            return redirect()->route('acara.show', $id)->with('success','Data berhasil diimport');
        } else {
            return redirect()->route('acara.show', $id)->with('error','Data gagal diimport');
        }
    }
}
