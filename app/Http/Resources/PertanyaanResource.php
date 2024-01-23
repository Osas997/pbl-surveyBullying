<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PertanyaanResource extends JsonResource
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
            'pertanyaan' => $this->pertanyaan,
            'tipe_pertanyaan' => $this->tipe_pertanyaan,
            'tipe_perilaku' => $this->tipe_perilaku,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
