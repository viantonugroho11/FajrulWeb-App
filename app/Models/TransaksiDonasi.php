<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDonasi extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_donatur',
        'email_donatur',
        'nomor_telepon_donatur',
        'nominal',
        'kode_verif',
        'donasi_id',
        'doa',
        'image',
        'status',
        'anomin',
    ];

    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }

    public function getImageAttribute()
    {
        return asset('storage/transaksi_donasi/' . $this->image);
    }

    public function getAnonimAttribute()
    {
        if ($this->anomin == 1) {
            return 'Ya';
        } else {
            return 'Tidak';
        }
    }

    public function getFormatNominalAttribute()
    {
        return 'Rp ' . number_format($this->nominal, 0, ',', '.');
    }

    // public function getStatusAttribute()
    // {
    //     if ($this->status == 1) {
    //         return 'Pending';
    //     } elseif ($this->status == 2) {
    //         return 'Dikonfirmasi';
    //     } elseif ($this->status == 3) {
    //         return 'Ditolak';
    //     } else {
    //         return '-';
    //     }
    // }

    public function getTanggalDonasiAttribute()
    {
        return date('d F Y', strtotime($this->created_at));
    }

    public function uploadImageAttribute($file)
    {
        move_uploaded_file($file, asset('storage/transaksi_donasi/' . $file->hashName()));
    }

}
