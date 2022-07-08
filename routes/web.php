<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Beasiswa
//Route::get('/beasiswa/dashboard', function () {
  //  return view('Beasiswa/dashboard');
//});

route::get('/beasiswa/create', [App\Http\Controllers\BeasiswaController::class, 'create']);

route::post('/beasiswa/store ' , [App\Http\Controllers\BeasiswaController::class, 'store']);

//AdminBeasiswa

route::get('/beasiswa',  [App\Http\Controllers\BeasiswaController::class, 'index']);

route::get('/beasiswa/{id}', [App\Http\Controllers\BeasiswaController::class, 'show']);

route::get('/beasiswa/{id}/edit', 'BeasiswaController@edit');
route::put('/beasiswa/{id}', 'BeasiswaController@update');
route::delete('/beasiswa/{beasiswaid}', 'BeasiswaController@destroy');

