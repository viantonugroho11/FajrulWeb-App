<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory,SoftDeletes;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'role_id',
        'remember_token',
        'created_at',
        'updated_at',
    ];
}
