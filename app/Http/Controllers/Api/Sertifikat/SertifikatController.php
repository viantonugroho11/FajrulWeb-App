<?php

namespace App\Http\Controllers\Api\Sertifikat;

use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class SertifikatController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'no_sertifikat' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ],
            [
                'no_sertifikat.required' => 'No Sertifikat tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
            ]
        );
        $sertifikat = Sertifikat::create([
            'id' => Uuid::uuid4()->__toString(),
            'no_sertifikat' => $request->no_sertifikat,
            'nama' => $request->nama,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
        ]);

        return response()->json([

            "message" => "Sertifikat berhasil ditambahkan",
            "sertifikat" => $sertifikat->id
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                // 'no_sertifikat' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ],
            [
                // 'no_sertifikat.required' => 'No Sertifikat tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
            ]
        );
        $sertifikat = Sertifikat::find($id);
        $sertifikat->update([
            // 'no_sertifikat' => $request->no_sertifikat,
            'nama' => $request->nama,
            'email' => $request->email,
            // 'user_id' => $request->user_id,
            // 'event_id' => $request->event_id,
        ]);
        if ($request->file('file')) {
            $image = $request->file('file');
            // $file->storeAs();
            // if (!File::exists(public_path('storage/sertifikat/' . $request->event_id))) {
            //     File::makeDirectory(public_path('storage/sertifikat/' . $request->event_id));
            // }
            $image->storeAs('public/sertifikat/', $image->hashName());
            $sertifikat->update([
                'file' => $image->hashName(),
            ]);
        }

        return response()->json([
            'message' => 'Sertifikat berhasil diubah',
            'sertifikat' => $sertifikat
        ], 200);
    }
}
