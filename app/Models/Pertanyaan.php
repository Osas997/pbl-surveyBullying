<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = "pertanyaan";
    protected $guarded = ["id"];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan', 'id');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('pertanyaan', 'like', '%' . $search . '%')->orWhere('tipe_pertanyaan', 'like', '%' . $search . '%')->orWhere('tipe_perilaku', 'like', '%' . $search . '%');
        }
    }
}
