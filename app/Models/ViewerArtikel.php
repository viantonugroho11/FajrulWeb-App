<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewerArtikel extends Model
{
    use HasFactory;
    protected $fillable = ['artikel_id', 'ip_address', 'user_agent'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
