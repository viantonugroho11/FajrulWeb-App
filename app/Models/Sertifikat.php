<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable =
    [
        'id',
        'user_id',
        'no_sertifikat',
        'nama',
        'tahun',
        'email',
        'acara_id',
        'jenis_sertifikat',
        'file',
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }

    public function getFile()
    {
        return asset('storage/sertifikat/' . $this->file);
    }

    public function uploadFileAttribute($file)
    {
        move_uploaded_file($file, asset('storage/sertifikat/' . $file->hashName()));
    }
}
