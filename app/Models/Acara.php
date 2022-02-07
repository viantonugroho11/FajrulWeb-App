<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acara extends Model
{
    use HasFactory,SoftDeletes;
    public $incrementing = false;
    protected $fillable = [
            'id',
            'nama',
            'slug',
            'gambar',
            'deskripsi',
            'deskripsi_singkat',
            'tanggal_kegiatan',
            'tempat',
            'batas_pendaftaran',
            'jumlah_peserta',
            'status',
            'status_event',
            'harga',
    ];
}
