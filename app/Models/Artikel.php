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
        if($this->gambar == null){
            return asset('assets/frontend/v1/noimage/No-image-available.png');
        }else{
            return public_path('storage/artikel/' . $this->gambar);
        }
    }

    public function getTanggalPublish()
    {
        return date('d F Y', strtotime($this->tanggal_publish));
    }

    public function getStatus()
    {
        if ($this->status == 1) {
            return '<span class="badge badge-success">Aktif</span>';
        } else {
            return '<span class="badge badge-danger">Tidak Aktif</span>';
        }
    }

    public function getPublish()
    {
        $this->hasMany(Admin::class, 'publish','id');
    }

    public function getPenulis()
    {
        // return $this->hasMany(Admin::class, 'penulis','id');
        return $this->belongsTo(Admin::class, 'penulis','id');
    }

    public function getTanggalBuat()
    {
        return date('d F Y', strtotime($this->created_at));
    }
}
