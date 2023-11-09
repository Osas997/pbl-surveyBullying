<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SurveyController;
use App\Models\Pertanyaan;
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
    // $responden = S::count();
    // return view('index', compact('responden'));
    return "hello";
})->name('index');

Route::middleware("sudahLogin")->group(function () {
    Route::get("/login", [AuthContoller::class, "login"])->name("viewLogin");
    Route::get("/register", [AuthContoller::class, "viewRegister"])->name("viewRegister");
    Route::post("/login", [AuthContoller::class, "authenticate"])->name('login');
    Route::post("/register", [AuthContoller::class, "register"])->name("register");
});

Route::middleware('sekolah')->group(function () {
    Route::get("/logout", [AuthContoller::class, "logout"])->name("logout");
    Route::get("/sekolah/masuk", [SekolahController::class, "index"])->name("viewSekolah");

    Route::get("/guru/masuk", [AuthContoller::class, "viewLoginGuru"])->name("viewLoginGuru");
    Route::post("/guru/masuk", [AuthContoller::class, "loginGuru"])->name("loginGuru");

    Route::middleware("guru")->group(function () {
        Route::get("/guru/dashboard", [GuruController::class, "dashboard"])->name("guru.dashboard");
        Route::get("/guru/pertanyaan", [Pertanyaan::class, "index"])->name("guru.pertanyaan");
    });

    Route::get("/murid/dashboard", [MuridController::class, "dashboard"])->name("murid.dashboard");
    Route::get("/murid/signup", [MuridController::class, "index"])->name("murid.viewSignup");
    Route::post("/murid/signup", [MuridController::class, "store"])->name("murid.signup");

    Route::middleware("murid_survey")->group(function () {
        Route::get("/murid/survey", [SurveyController::class, "index"])->name("viewSurvey");
        Route::post("/murid/survey", [SurveyController::class, "store"])->name("survey");
    });
});
