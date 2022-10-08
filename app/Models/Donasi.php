<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        "id",
        "title",
        "slug",
        "image",
        "kategori_donasi_id",
        "short_description",
        "description",
        "target_donasi",
        "target_tanggal_donasi",
        "status",
        "admin_id",
    ];

    public function kategori_donasi()
    {
        return $this->belongsTo(KategoriDonasi::class, 'kategori_donasi_id','id');
    }

    public function getPercentageAttribute()
    {
        $total = $this->transaksi_donasi->where('status',1)->sum('nominal');
        $percentage = ($total / $this->target_donasi) * 100;
        return $percentage;
    }

    public function getSumDonasiAttribute()
    {
        $total = $this->transaksi_donasi->where('status',1)->sum('nominal');
        return number_format($total, 0, ',', '.');
    }

    public function getTargetDonasiAttributeModel()
    {
        return number_format($this->target_donasi, 0, ',', '.');
    }

    public function getTanggalTargetDonasiAttribute()
    {
        return date('d F Y', strtotime($this->target_tanggal_donasi));
    }


    public function transaksi_donasi()
    {
        return $this->hasMany(TransaksiDonasi::class,'donasi_id');
    }

    public function kabar_berita_donasi()
    {
        return $this->hasMany(KabarBeritaDonasi::class, 'donasi_id','id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function getImageAttribute()
    // {
    //     return asset('storage/donasi/' . $this->image);
    // }

    // public function getTargetTanggalDonasiAttribute()
    // {
    //     return date('d F Y', strtotime($this->target_tanggal_donasi));
    // }

    // public function getTargetDonasiAttribute()
    // {
    //     return number_format($this->target_target_donasi, 0, ',', '.');
    // }

    // public function getSumDonasiAttribute()
    // {
    //     return number_format($this->transaksi_donasi->sum('nominal'), 0, ',', '.');
    // }

    public function getShortDescriptionAttribute()
    {
        return strip_tags($this->description);
    }

    public function uploadImageAttribute($value)
    {
        move_uploaded_file($value, asset('storage/donasi/' . $value->hashName()));
    }
}
