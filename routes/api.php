<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiBeasiswaController;
use App\Http\Controllers\API\ApiProposalController;
use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\OrmawaController;
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

Route::get('beasiswa', [ApiBeasiswaController::class, 'index']);

Route::POST('beasiswa', [ApiBeasiswaController::class, 'store']);
Route::get('beasiswa/show/{id}', [ApiBeasiswaController::class, 'show']);
Route::post('beasiswa/update/{id}', [ApiBeasiswaController::class, 'update']);
Route::get('beasiswa/destroy/{id}', [ApiBeasiswaController::class, 'destroy']);
Route::get('jurusan', [JurusanController::class, 'list']);
//-------------------------------------------------------------------------------
Route::get('proposal', [ApiProposalController::class, 'index']);

Route::POST('proposal', [ApiProposalController::class, 'store']);
Route::get('proposal/show/{id}', [ApiProposalController::class, 'show']);
Route::get('proposal/update/{id}', [ApiProposalController::class, 'update']);
Route::get('proposal/destroy/{id}', [ApiProposalController::class, 'destroy']);
route::get('ormawa', [OrmawaController::class, 'list']);


Route::post('user/register', [UserBeasiswaController::class, 'register']);
Route::post('user/login', [UserBeasiswaController::class, 'login']);
