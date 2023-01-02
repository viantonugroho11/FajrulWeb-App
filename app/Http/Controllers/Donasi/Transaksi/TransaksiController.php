<?php

namespace App\Http\Controllers\Donasi\Transaksi;

use App\Http\Controllers\Controller;
use App\Mail\SendTransaksiDonasi;
use App\Models\TransaksiDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;

class TransaksiController extends Controller
{
    public function store(Request $request,$id)
    {
        $this->validate($request,[
            'nama'=>'required',
            'email'=>'required',
            'nominal'=>'required',
        ]);

        // random kode verifikasi
        $kode_verif = rand(100000, 999999);
        // random huruf
        $huruf = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
        $transaksi = TransaksiDonasi::create([
            'id'=>Uuid::uuid4(),
            'donasi_id'=>$id,
            'nama_donatur'=>$request->nama,
            'email_donatur'=>$request->email,
            'nomor_telepon_donatur'=>$request->nohp,
            'doa'=>$request->doa,
            'nominal'=>$request->nominal,
            'status'=>0,
            //random kode verifikasi
            'kode_verif'=> $huruf.$kode_verif,
        ]);

        //kirim email
        // $data = [
            //     'nama'=>$request->nama,
            //     'nominal'=>$request->nominal,
            // 'kode_verif'=>$huruf.$kode_verif,
        // ];
        $kalimat = "Terima kasih telah berdonasi di fajrulislam.or.id sebesar
        Rp. ".number_format($request->nominal,0,',','.').". Kode verifikasi anda adalah ".$huruf.$kode_verif.".
        Silahkan masukkan kode verifikasi tersebut pada halaman konfirmasi donasi. Terima kasih.";

        $response = Http::post(env('URL_NOTIF_ENGINE_TRANSAKSI'), [
            'Title' => env('APP_NAME').' - Transaksi Donasi',
            'Body' => $kalimat,
            'Type' => 'email'
        ]);
        // Mail::to($request->email)->send(new SendTransaksiDonasi($data));
        return redirect()->back()->with('success','Terima kasih telah berdonasi, silahkan cek email anda untuk melanjutkan proses donasi');
    }
}
