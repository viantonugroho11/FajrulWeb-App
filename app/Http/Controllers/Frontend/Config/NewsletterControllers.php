<?php

namespace App\Http\Controllers\Frontend\Config;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterControllers extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $url = url()->previous();
        $newsletter = Newsletter::where('email', $request->email)->first();
        if ($newsletter == null) {
            $newsletter = Newsletter::create([
                'email' => $request->email,
            ]);
            if (Auth::check() != null) {
                $newsletter->update([
                    'user_id' => Auth::user()->id,
                    'nama' => Auth::user()->nama,
                ]);
            }
        } else {
            $newsletter->update([
                'email' => $request->email,
            ]);
            if (Auth::check() != null) {
                $newsletter->update([
                    'user_id' => Auth::user()->id,
                    'nama' => Auth::user()->nama,
                ]);
            }
        }
        if ($newsletter) {
            return redirect($url)->with('success', 'Berhasil menambahkan email');
        } else {
            return redirect($url)->with('error', 'Gagal menambahkan email');
        }
    }
}
