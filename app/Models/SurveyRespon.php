<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRespon extends Model
{
    use HasFactory;
    protected $table = "survey_respon";
    protected $guarded = ["id"];

    public function murid()
    {
        return $this->belongsTo(Murid::class, "id_murid", "id");
    }

    public function sekolah()
    {
        return $this->hasMany(Sekolah::class, "id_sekolah", "id");
    }
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, "id_survey_respon", "id");
    }

    public function scopeSekolah($query)
    {
        $query->where('id_sekolah', auth('sekolah')->user()->id);
    }

    public function scopeGuruSekolah($query)
    {
        $query->where('id_sekolah', auth('guru')->user()->id_sekolah);
    }

    // public function scopeSekolah($query, $sekolah)
    // {
    //     if ($sekolah) {
    //         $query->whereHas(
    //             "sekolah",
    //             fn ($query) => $query->where("nama_sekolah", $sekolah)
    //         );
    //     }
    // }

    public function scopeKorbanRendah($query)
    {
        return $query->whereBetween("skor_total_korban", [1, 23]);
    }

    public function scopeKorbanSedang($query)
    {
        return $query->whereBetween("skor_total_korban", [24, 34]);
    }

    public function scopeKorbanTinggi($query)
    {
        return $query->whereBetween("skor_total_korban", [35, 45]);
    }

    public function scopeKorbanSangatTinggi($query)
    {
        return $query->where("skor_total_korban", ">=", 46);
    }

    public function scopePelakuRendah($query)
    {
        return $query->whereBetween("skor_total_pelaku", [1, 23]);
    }

    public function scopePelakuSedang($query)
    {
        return $query->whereBetween("skor_total_pelaku", [24, 34]);
    }

    public function scopePelakuTinggi($query)
    {
        return $query->whereBetween("skor_total_pelaku", [35, 45]);
    }

    public function scopePelakuSangatTinggi($query)
    {
        return $query->where("skor_total_pelaku", ">=", 46);
    }
}
