<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{

    public function index()
    {
        $title = "Admin | Pertanyaan";
        $dataPertanyaan = Pertanyaan::search(request('search'))->get();
        return view('admin.pertanyaan', compact('dataPertanyaan', 'title'));
    }

    public function create()
    {
        return view('admin.addPertanyaan', [
            "title" => "Tambah Pertanyaan",
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "pertanyaan" => "required",
            "tipe_pertanyaan" => "required|in:korban,pelaku",
            "tipe_perilaku" => "required|in:verbal,fisik,relational",
        ]);

        Pertanyaan::create($validate);
        return redirect("/admin/pertanyaan")->with('successAdd', "Pertanyaan Berhasil Di Tambah");
    }

    public function edit(Pertanyaan $pertanyaan)
    {
        return view('admin.editPertanyaan', [
            "title" => "Edit Pertanyaan | " . $pertanyaan->pertanyaan,
            "pertanyaan" => $pertanyaan
        ]);
    }

    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $validate = $request->validate([
            "pertanyaan" => "required",
            "tipe_pertanyaan" => "required",
            "tipe_perilaku" => "required",
        ]);

        $pertanyaan->update($validate);

        return redirect("/admin/pertanyaan")->with('successEdit', "Pertanyaan Berhasil Di Edit");
    }

    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        return redirect()->back()->with('successDelete', "Pertanyaan Berhasil Di Hapus");
    }
}
