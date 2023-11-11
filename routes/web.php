<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\DashboardController;
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

// ! duumy route hasil 
Route::get('/hasil-pelaku',function(){
    return view('sekolah.murid.hasilPelaku');
})->name('murid.hasilpelaku');
Route::get('/hasil-korban',function(){
    return view('sekolah.murid.hasilKorban');
})->name('murid.hasilkorban');

Route::get('/hasil-pelaku/print',function(){
    return view('sekolah.murid.printPelaku');
})->name('murid.hasilpelaku.print');

Route::get('/hasil-korban/print',function(){
    return view('sekolah.murid.printKorban');
})->name('murid.hasilkorban.print');

Route::middleware("sudahLogin")->group(function () {
    Route::get("/login", [AuthContoller::class, "login"])->name("viewLogin");
    Route::get("/register", [AuthContoller::class, "viewRegister"])->name("viewRegister");
    Route::post("/login", [AuthContoller::class, "authenticate"])->name('login');
    Route::post("/register", [AuthContoller::class, "register"])->name("register");
});

Route::get("/logout", [AuthContoller::class, "logout"])->name("logout")->middleware("auth:sekolah,admin");

Route::middleware("admin")->prefix("admin")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "admin"])->name("admin.dashboard");
    Route::resource("/pertanyaan", PertanyaanController::class);
});

Route::middleware('sekolah')->group(function () {
    Route::get("/sekolah/masuk", [SekolahController::class, "index"])->name("viewSekolah");

    Route::get("/guru/masuk", [AuthContoller::class, "viewLoginGuru"])->name("viewLoginGuru");
    Route::post("/guru/masuk", [AuthContoller::class, "loginGuru"])->name("loginGuru");

    Route::middleware("guru")->group(function () {
        Route::get("/guru/dashboard", [DashboardController::class, "guru"])->name("guru.dashboard");
        Route::get("/guru/murid", [MuridController::class, "index"])->name("guru.murid");
        Route::get("/guru/laporan", [LaporanSurvey::class, "index"])->name("guru.laporan");
    });

    Route::get("/murid/welcome", [MuridController::class, "welcome"])->name("murid.dashboard");
    Route::get("/murid/signup", [MuridController::class, "signup"])->name("murid.viewSignup");
    Route::post("/murid/signup", [MuridController::class, "store"])->name("murid.signup");

    Route::middleware("murid_survey")->group(function () {
        Route::get("/murid/survey", [SurveyController::class, "index"])->name("viewSurvey");
        Route::post("/murid/survey", [SurveyController::class, "store"])->name("survey");
    });
});
