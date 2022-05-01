<?php

namespace App\Http\Controllers\Frontend\Config;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class NewsletterControllers extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newssave(Request $request)
    {
        // $url = url()->previous();
        $newsletter = Newsletter::where('email', $request->email)->first();
        if ($newsletter == null) {
            $newsletter = Newsletter::create([
                'id' => Uuid::uuid4()->toString(),
                'email' => $request->email,
            ]);
            if (Auth::check() != null) {
                $newsletter->update([
                    'user_id' => Auth::user()->id,
                    'nama' => Auth::user()->nama,
                ]);
            }
        } else {
            if (Auth::check() != null) {
                $newsletter->update([
                    'user_id' => Auth::user()->id,
                    'nama' => Auth::user()->nama,
                ]);
            }
        }
        if ($newsletter) {
            return redirect()->back()->with('success', 'Berhasil menambahkan email');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan email');
        }
    }

    public function __invoke(Request $request)
    {
        // dd($request->all());
        $url = url()->previous();
        $newsletter = Newsletter::where('email', $request->email)->first();
        if ($newsletter == null) {
            $newsletter = Newsletter::create([
                'id' => Uuid::uuid4()->toString(),
                'email' => $request->email,
            ]);
        } else {
            $newsletter->delete();
        }
        if ($newsletter) {
            return redirect($url)->with('success', 'Berhasil menambahkan email');
        } else {
            return redirect($url)->with('error', 'Gagal menambahkan email');
        }
    }
}
