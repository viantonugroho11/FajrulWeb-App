<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'image',
        'kategori_donasi_id',
        'short_description',
        'description',
        'target_donasi',
        'target_tanggal_donasi',
        'status',
        'admin_id',
    ];

    public function kategori_donasi()
    {
        return $this->belongsTo(KategoriDonasi::class, 'kategori_donasi_id');
    }

    public function transaksi_donasi()
    {
        return $this->hasMany(TransaksiDonasi::class, 'donasi_id');
    }

    public function kabar_berita_donasi()
    {
        return $this->hasMany(KabarBeritaDonasi::class, 'donasi_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageAttribute()
    {
        return asset('storage/donasi/' . $this->image);
    }

    public function getTargetTanggalDonasiAttribute()
    {
        return date('d F Y', strtotime($this->target_tanggal_donasi));
    }

    public function getTargetDonasiAttribute()
    {
        return number_format($this->target_target_donasi, 0, ',', '.');
    }

    public function getSumDonasiAttribute()
    {
        return number_format($this->transaksi_donasi->sum('nominal'), 0, ',', '.');
    }

    public function getShortDescriptionAttribute()
    {
        return strip_tags($this->description);
    }
}