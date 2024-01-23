<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'skor_total_korban' => $this->skor_total_korban,
            'skor_total_pelaku' => $this->skor_total_pelaku,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            "murid" => $this->whenLoaded("murid", function () {
                return new MuridResource($this->murid->load('sekolah:id,nama_sekolah'));
            })
        ];
    }
}
