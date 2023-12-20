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
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%');
        }
    }

    public function scopeSearchFilter($query, $search, $filter)
    {
        if ($search) {
            $query->where(fn ($query) =>
            $query->where('nama_murid', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%'));
        }

        if ($filter) {
            if ($filter == "pelakuRendah") {
                $query->whereHas(
                    'surveyRespon',
                    fn ($query) =>
                    $query->whereBetween("skor_total_pelaku", [1, 23])
                );
            }

            if ($filter == "pelakuSedang") {
                $query->whereHas(
                    'surveyRespon',
                    fn ($query) =>
                    $query->whereBetween("skor_total_pelaku", [24, 34])
                );
            }

            if ($filter == "pelakuTinggi") {
                $query->whereHas(
                    'surveyRespon',
                    fn ($query) =>
                    $query->where("skor_total_pelaku", ">=", 35)
                );
            }

            if ($filter == "korbanRendah") {
                $query->whereHas(
                    'surveyRespon',
                    fn ($query) =>
                    $query->whereBetween("skor_total_korban", [1, 23])
                );
            }
            if ($filter == "korbanSedang") {
                $query->whereHas(
                    'surveyRespon',
                    fn ($query) =>
                    $query->whereBetween("skor_total_korban", [24, 34])
                );
            }
            if ($filter == "korbanTinggi") {
                $query->whereHas(
                    'surveyRespon',
                    fn ($query) =>
                    $query->where("skor_total_pelaku", ">=", 35)
                );
            }
        }
    }
}
