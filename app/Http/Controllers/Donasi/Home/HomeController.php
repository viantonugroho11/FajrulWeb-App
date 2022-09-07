<?php

namespace App\Http\Controllers\Donasi\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('donasi.home.index');
    }
}
