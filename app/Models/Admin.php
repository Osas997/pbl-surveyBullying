<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    protected $guarded = ["id"];
    protected $casts = [
        'password' => 'hashed',
    ];
}
