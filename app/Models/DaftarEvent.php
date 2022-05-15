<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarEvent extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $fillable = [
            'id',
            'user_id',
            'email',
            'nama',
            'event_id',
            'kode_unik',
            'status',
    ];

    public function event()
    {
        return $this->belongsTo(Acara::class, 'event_id');
    }

    public function getSertifikat()
    {
        $sertif = Sertifikat::where('acara_id', $this->event_id)->where('email', $this->email)->first();
        if ($sertif) {
            return $sertif->no_sertifikat;
        } else {
            return '-';
        }
    }

    public function getSertifikatFile()
    {
        $sertif = Sertifikat::where('acara_id', $this->event_id)->where('email', $this->email)->first();
        if($sertif) {
            return storage_path('app/public/sertifikat/' . $sertif->file);
        } else {
            return '-';
        }
    }
}
