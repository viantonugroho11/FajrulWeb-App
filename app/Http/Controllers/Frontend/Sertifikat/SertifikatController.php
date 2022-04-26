<?php

namespace App\Http\Controllers\Frontend\Sertifikat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index()
    {
        return view('frontend.sertifikat.index');
    }
    public function getSertifikat($id)
    {
        
        return view('frontend.sertifikat.sertifikat', compact('id'));
    }
}
