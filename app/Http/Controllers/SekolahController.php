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

    public function edit(Sekolah $sekolah)
    {
        $title = "Admin | Edit Sekolah";
        return view('admin.editSekolah', compact('sekolah', 'title'));
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $validate = $request->validate([
            "npsn" => "required|unique:sekolah,npsn," . $sekolah->id,
            "nama_sekolah" => "required",
            "alamat_sekolah" => "required",
            "status" => "required",
        ]);

        $sekolah->update($validate);
        return redirect("/admin/sekolah")->with('successEditSekolah', "Sekolah Berhasil Di Edit");
    }

    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->back()->with('successDeleteSekolah', "Sekolah Berhasil Di Hapus");
    }
}
