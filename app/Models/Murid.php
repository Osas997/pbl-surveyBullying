<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = "murid";
    protected $guarded = ["id"];
    protected $casts = [
        'password' => 'hashed',
    ];
}
