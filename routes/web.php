<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilSurveyController;
use App\Http\Controllers\LaporanSurvey;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SurveyController;
use App\Models\SurveyRespon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $responden = SurveyRespon::count();
    return view('welcome', compact('responden'));
})->name('index');

Route::middleware("sudahLogin")->group(function () {
    Route::get("/login", [AuthContoller::class, "login"])->name("viewLogin");
    Route::get("/register", [AuthContoller::class, "viewRegister"])->name("viewRegister");
    Route::post("/login", [AuthContoller::class, "authenticate"])->name('login');
    Route::post("/register", [AuthContoller::class, "register"])->name("register");
});

Route::post("/logout", [AuthContoller::class, "logout"])->name("logout")->middleware("auth:sekolah,admin");

Route::middleware("admin")->prefix("admin")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "admin"])->name("admin.dashboard");
    Route::resource("/pertanyaan", PertanyaanController::class);
    Route::get("/sekolah", [SekolahController::class, "indexAdmin"])->name("admin.sekolah");
    Route::get("/sekolah/{sekolah}", [SekolahController::class, "edit"])->name("admin.editSekolah");
    Route::patch("/sekolah/{sekolah}", [SekolahController::class, "update"])->name("admin.updateSekolah");
    Route::delete("/sekolah/{sekolah}", [SekolahController::class, "destroy"])->name("admin.deleteSekolah");
});

Route::middleware('sekolah')->group(function () {
    Route::get("/sekolah/masuk", [SekolahController::class, "index"])->name("viewSekolah");

    Route::middleware("login_guru")->group(function () {
        Route::get("/guru/masuk", [AuthContoller::class, "viewLoginGuru"])->name("viewLoginGuru");
        Route::post("/guru/masuk", [AuthContoller::class, "loginGuru"])->name("loginGuru");
    });

    Route::middleware("guru")->prefix("guru")->group(function () {
        Route::get("/dashboard", [DashboardController::class, "guru"])->name("guru.dashboard");
        Route::get("/murid", [MuridController::class, "index"])->name("guru.murid");
        Route::get("/laporan", [LaporanSurvey::class, "index"])->name("guru.laporan");
        Route::get("/print-laporan", [LaporanSurvey::class, "print"])->name("guru.printLaporan");
        Route::get("/hasil-korban/{murid}", [HasilSurveyController::class, "guruKorban"])->name("guru.hasilKorban");
        Route::get("/hasil-pelaku/{murid}", [HasilSurveyController::class, "guruPelaku"])->name("guru.hasilPelaku");
        Route::get("/print-hasil-survey/{murid}", [HasilSurveyController::class, "printGuru"])->name("guru.printHasil");
        Route::get("/print-chart", [DashboardController::class, "printChart"])->name('guru.print-chart');
    });

    Route::prefix("murid")->group(function () {
        Route::get("/welcome", [MuridController::class, "welcome"])->name("murid.welcome");
        Route::get("/signup", [MuridController::class, "signup"])->name("murid.viewSignup");
        Route::post("/signup", [MuridController::class, "store"])->name("murid.signup");
        Route::get('/hasil-korban', [HasilSurveyController::class, 'korban'])->name('murid.hasilkorban');
        Route::get('/hasil-pelaku', [HasilSurveyController::class, 'pelaku'])->name('murid.hasilpelaku');
        Route::get('/print-hasil', [HasilSurveyController::class, 'print'])->name('murid.hasil.print');
        Route::get('/download-hasil', [HasilSurveyController::class, 'downloadPdf'])->name('murid.downloadPdf');

        Route::middleware("murid_survey")->group(function () {
            Route::get("/survey", [SurveyController::class, "index"])->name("viewSurvey");
            Route::post("/survey", [SurveyController::class, "store"])->name("survey");
        });
    });
});
