<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $fillable = [
        'id',
        "nama_artikel",
        "slug",
        "isi_singkat",
        "isi_artikel",
        "gambar",
        "kategori_artikel_id",
        "tanggal_publish",
        "publish",
        "penulis",
        "status",
    ];

    public function kategori_artikel()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_artikel_id');
    }

    //viewer artikel
    public function viewer()
    {
        return $this->hasMany(ViewerArtikel::class, 'artikel_id');
    }
    public function getGambar()
    {
        return asset('storage/' . $this->gambar);
    }
}
