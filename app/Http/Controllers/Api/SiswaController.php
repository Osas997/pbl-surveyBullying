<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MuridRequest;
use App\Http\Resources\MuridResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function store(MuridRequest $request)
    {
        $datas = $request->all();
        $datas["id_sekolah"] = auth()->user()->id;

        return new MuridResource($datas);
    }
}
