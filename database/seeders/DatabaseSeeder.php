<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            "nama" => "admin",
            "username" => "admin",
            "password" => Hash::make('admin')
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dipanggil dengan nama panggilan yang jelek, diolok-olok, atau diejek sehingga saya merasa sakit hati?",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "verbal",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Teman teman dengan sengaja mengabaikan saya, tidak mengajak saya bergabung dengan kelompoknya atau menganggap saya tidak ada",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "relational",
        ]);

        Pertanyaan::create([
            "pertanyaan" => "Saya dipukul, ditendang, didorong, dipojokkan ke tembok, atau dikunci di dalam ruangan",
            "tipe_pertanyaan" => "korban",
            "tipe_perilaku" => "fisik",
        ]);
    }
}
