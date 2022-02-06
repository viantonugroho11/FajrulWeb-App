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
}
