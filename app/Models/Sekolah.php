<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Laravel\Sanctum\HasApiTokens;

class Sekolah extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = "sekolah";
    protected $guarded = ["id"];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('nama_sekolah', 'like', '%' . $search . '%');
        }
    }
}
