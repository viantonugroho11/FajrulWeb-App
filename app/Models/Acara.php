<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acara extends Model
{
    use HasFactory, SoftDeletes;
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
        'link',
    ];

    public function getGambar()
    {
        return asset('storage/' . $this->gambar);
    }

    public function getTanggalKegiatan()
    {
        return date('d F Y', strtotime($this->tanggal_kegiatan));
    }

    public function getBatasPendaftaran()
    {
        return date('d F Y', strtotime($this->batas_pendaftaran));
    }

    public function getStatusEvent()
    {
        if ($this->status_event == 1) {
            return '<span class="badge badge-success">Aktif</span>';
        } else {
            return '<span class="badge badge-danger">Tidak Aktif</span>';
        }
    }

    public function getStatus()
    {
        if ($this->status == 1) {
            return '<span class="badge badge-success">Aktif</span>';
        } else {
            return '<span class="badge badge-danger">Tidak Aktif</span>';
        }
    }

    public function getHarga()
    {
        return 'Rp. ' . number_format($this->harga, 0, ',', '.');
    }

    public function peserta()
    {
        return $this->hasMany(DaftarEvent::class, 'event_id');
    }
}
