<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BeasiswaController;
use App\Http\Controllers\API\UserBeasiswaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

Route::get('form_pengajuan_beasiswa', [BeasiswaController::class, 'index']);

Route::POST('beasiswa', [BeasiswaController::class, 'store'])->name('tambah_data');
Route::get('beasiswa/show/{id}', [BeasiswaController::class, 'show']);
Route::post('beasiswa/update/{id}', [BeasiswaController::class, 'update']);
Route::get('beasiswa/destroy/{id}', [BeasiswaController::class, 'destroy']);


Route::get('data_alumni/search/{nim}', [BeasiswaController::class, 'search']);

//Register & Login Untuk di android
Route::post('beasiswauser/register', [UserBeasiswaController::class, 'register']);
Route::post('beasiswauser/login', [UserBeasiswaController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
