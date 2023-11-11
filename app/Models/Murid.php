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

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, "id_sekolah", "id");
    }
    public function surveyRespon()
    {
        return $this->hasOne(SurveyRespon::class, "id_murid", "id");
    }

    public function scopeAbjad($query)
    {
        $query->orderBy('nama_murid', 'asc');
    }
    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('nama_murid', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%');
        }
    }
}
