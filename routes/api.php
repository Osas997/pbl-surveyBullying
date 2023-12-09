<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PertanyaanController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/pertanyaan', [PertanyaanController::class, 'index']);

    Route::post('/signup', [SiswaController::class, 'store']);
    Route::post("/survey", [SurveyController::class, "store"]);
});

Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest:sanctum');
Route::get('/test', function () {
    return response()->json([
        'success' => true,
    ]);
});
