<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        return view('sekolah.index');
    }

    public function indexAdmin()
    {
        $title = "Admin | Sekolah";
        $dataSekolah = Sekolah::search(request("search"))->paginate(10);
        return view('admin.sekolah', compact('dataSekolah', 'title'));
    }
}
