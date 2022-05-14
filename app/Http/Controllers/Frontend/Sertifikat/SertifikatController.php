<?php

namespace App\Http\Controllers\Frontend\Sertifikat;

use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index()
    {
        return view('frontend.certificate.index');
    }
    public function getSertifikat($id)
    {
        $sertif = Sertifikat::where('no_sertifikat', $id)->first();
        return view('frontend.certificate.show', compact('sertif'));
        // return view('frontend.certificate.sertifikat', compact('id'));
    }
    public function cari(Request $request)
    {
        $sertif = $request->id;
        return redirect()->route('landing.sertifikat.show', $sertif);
    }

}
