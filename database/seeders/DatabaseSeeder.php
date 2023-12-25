<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Pertanyaan;
use App\Models\Sekolah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            "nama" => "admin",
            "username" => "admin",
            "password" => Hash::make('admin')
        ]);

        Sekolah::create([
            "npsn" => "87654321", // Ganti dengan npsn yang belum terdaftar
            "password" => "123456",
            "nama_sekolah" => "SMP 1 Banyuwangi",
            "alamat_sekolah" => "Kebalenan",
            "status" => "Negeri",
            "pin_guru" => "232323",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dipanggil dengan nama panggilan yang jelek, diolok-olok, atau diejek sehingga saya merasa sakit hati?",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Teman-teman dengan sengaja mengabaikan saya, tidak mengajak saya bergabung dengan kelompoknya, atau menganggap saya tidak ada",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dipukul, ditendang, didorong, dipojokkan ke tembok, atau dikunci di dalam ruangan Seseorang menjambak rambutku atau mencakarku",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Murid lain berbohong atau menyebarkan desas-desus palsu tentang saya dan mencoba membuat orang lain tidak menyukai saya",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Uang atau barang saya diambil dengan paksa atau dirusak",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya diancam atau dipaksa melakukan hal-hal yang tidak saya inginkan",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya diejek tentang pekerjaan orang tua saya",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya diejek tentang bentuk tubuh atau warna kulit saya",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dibentak dengan nama, komentar, atau gerakan kasar",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya ditakut-takuti dengan nama yang kejam, komentar atau gerak tubuh yang mesum",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya diejek dengan nama atau komentar jahat tentang kemampuan/prestasi saya",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dibully dengan menggunakan ponsel",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dibully dengan penggunaan komputer/laptop",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya diganggu dengan cara lain",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "relational",
        ]);

        // Pelaku

        Pertanyaan::create([
            "pertanyaan" => "Saya memanggil siswa lain dengan nama yang buruk, mengolok-olok atau bercanda untuk menyakitinya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya menjauhkan seseorang dari teman-teman saya dengan sengaja, mengucilkannya dari kelompok saya atau sama sekali mengabaikannya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya memukul, menendang, dan mendorongnya atau menguncinya di dalam ruangan",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya menyebarkan kabar bohong tentang dia dan mencoba membuat orang lain tidak menyukainya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengambil uang atau barang darinya atau merusak barang miliknya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengancam atau memaksanya melakukan hal-hal yang tidak ingin dia lakukan",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengejeknya dengan nama atau komentar jahat tentang ras atau warna kulitnya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengejeknya dengan nama atau komentar jahat tentang agamanya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengejeknya dengan nama atau komentar jahat tentang kecacatannya",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mem-bully dia dengan kata-kata kasar, komentar atau gerak tubuh mesum/porno",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "fisik",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengejeknya dengan nama atau komentar jahat karena dia pintar/pandai",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya membully dia dengan menggunakan ponsel",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya membully dia dengan menggunakan komputer/laptop",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya mengganggunya dengan cara lain",
            "tipe_pertanyaan" => "pelaku",
            "tipe_perilaku" => "relational",
        ]);
    }
}
