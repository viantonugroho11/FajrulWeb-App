<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use HasFactory,SoftDeletes;
    public $incrementing = false;
    protected $fillable = [
    'id',
    "nama_artikel",
    "slug",
    "isi_artikel",
    "gambar",
    "kategori_artikel_id",
    "tanggal_publish",
    "publish",
    "penulis",
    "status",
    ];
}
