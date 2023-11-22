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

    public function scopeCountPerilaku($query)
    {
        return $query->withCount([
            'jawaban as count_tidak_pernah' => function ($query) {
                $query->where('skor', '=', 1)
                    ->whereHas('surveyRespon', function ($query) {
                        $query->whereHas("murid", function ($query) {
                            $query->where("id_sekolah", auth("sekolah")->user()->id);
                        });
                    });
            },
            'jawaban as count_jarang' => function ($query) {
                $query->where('skor', '=', 2)
                    ->whereHas('surveyRespon', function ($query) {
                        $query->whereHas("murid", function ($query) {
                            $query->where("id_sekolah", auth("sekolah")->user()->id);
                        });
                    });
            },
            'jawaban as count_sering' => function ($query) {
                $query->where('skor', '=', 3)
                    ->whereHas('surveyRespon', function ($query) {
                        $query->whereHas("murid", function ($query) {
                            $query->where("id_sekolah", auth("sekolah")->user()->id);
                        });
                    });
            },
            'jawaban as count_selalu' => function ($query) {
                $query->where('skor', '=', 4)
                    ->whereHas('surveyRespon', function ($query) {
                        $query->whereHas("murid", function ($query) {
                            $query->where("id_sekolah", auth("sekolah")->user()->id);
                        });
                    });
            },
        ]);
    }
}
