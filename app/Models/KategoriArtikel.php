<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriArtikel extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $fillable = ['id', 'nama_kategori', 'slug','icon'];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'kategori_artikel_id');
    }

    public function getIcon()
    {
        if($this->icon == null){
            return asset('assets/frontend/v1/noimage/No-image-available.png');
        }else{
            return asset('storage/kategori-artikel/' . $this->icon);
        }
    }
}
