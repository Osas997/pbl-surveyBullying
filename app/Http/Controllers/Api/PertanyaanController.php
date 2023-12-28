<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PertanyaanResource;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::all();

        if ($pertanyaan->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data.'], 404);
        }

        return PertanyaanResource::collection($pertanyaan);
    }
}
