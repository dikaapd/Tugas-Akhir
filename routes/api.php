<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiBeasiswaController;
use App\Http\Controllers\API\UserBeasiswaController;
use App\Http\Controllers\BeasiswaController;
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

Route::prefix('api/v1')->group(function () {
  Route::get('beasiswa', [ApiBeasiswaController::class, 'index']);

Route::POST('beasiswa', [ApiBeasiswaController::class, 'store'])->name('tambah_data');
Route::get('beasiswa/show/{id}', [ApiBeasiswaController::class, 'show']);
Route::post('beasiswa/update/{id}', [ApiBeasiswaController::class, 'update']);
Route::get('beasiswa/destroy/{id}', [ApiBeasiswaController::class, 'destroy']);

//Register & Login Untuk di android
Route::post('beasiswauser/register', [UserBeasiswaController::class, 'register']);
Route::post('beasiswauser/login', [UserBeasiswaController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

});
