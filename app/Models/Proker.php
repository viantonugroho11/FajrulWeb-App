<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proker extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nama',
        'slug',
        'gambar',
        'deskripsi',
        'status',
        'divisi_id',
    ];
}
