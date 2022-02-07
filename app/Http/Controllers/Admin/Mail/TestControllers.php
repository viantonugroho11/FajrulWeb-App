<?php

namespace App\Http\Controllers\Admin\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SendAcaraMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class TestControllers extends Controller
{
    public function index()
    {

        // Mail::to("viantotech@gmail.com")->send(new SendAcaraMail());

        // return "Email telah dikirim";
    }
}
