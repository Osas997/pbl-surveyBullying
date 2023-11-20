<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "admin";
    protected $guarded = ["id"];
    protected $casts = [
        'password' => 'hashed',
    ];
}
