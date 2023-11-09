<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = "jawaban";
    protected $guarded = ["id"];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, "id_pertanyaan", "id");
    }
    public function surveyRespon()
    {
        return $this->belongsTo(SurveyRespon::class, "id_survey_respon", "id");
    }
}
