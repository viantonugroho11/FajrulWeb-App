<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabarBeritaDonasi extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'id',
        'title',
        'donasi_id',
        'description',
    ];

    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }
}
