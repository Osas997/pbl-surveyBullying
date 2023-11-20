<?php

namespace App\Http\Controllers;

use App\Models\SurveyRespon;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        return view('sekolah.index');
    }
}
