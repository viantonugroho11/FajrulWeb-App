<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class KategoriDonasi extends Model
{
    use HasFactory;

    // protected $table = 'kategori_donasis';
    protected $fillable = [
        'title', 'slug', 'image',
    ];

    public function donasi()
    {
        return $this->hasMany(Donasi::class, 'kategori_donasi_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function getImageAttribute()
    // {
    //     return asset('storage/kategori_donasi/' . $this->image);
    // }

    public function getDonasiCountAttribute()
    {
        return $this->donasi->count();
    }

    // public function uploadImageAttribute($file)
    // {
    //     move_uploaded_file($file, asset('storage/kategori_donasi/' . $file->hashName()));
    // }

    // public function deleteImageAttribute()
    // {
    //     if ($this->image != null) {
    //         $file = asset('storage/kategori_donasi/' . $this->image);
            // \File::delete($file);
    //         File::delete($file);
    //     }
    // }
}
