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

Route::get('/daftar', function () {
  return view('welcome');
})-> name('welcome');

Route::get('/login', function () {
    return view('auth.login');
})-> name('login');
route::post('/postlogin', [App\Http\Controllers\LoginController::class, 'postLogin'])->name('postlogin');
route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
route::get('/registrasi', [App\Http\Controllers\LoginController::class, 'registrasi'])->name('registrasi');
route::post('/postregistrasi', [App\Http\Controllers\LoginController::class, 'postregistrasi'])->name('postregistrasi');

//Dashboard
Route::group(['middleware' => ['auth', 'ceklevel:admin,mahasiswa,prodi,bem,ormawa,admin_mhs']], function() {
    route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);
  });



//Beasiswa


Route::group(['middleware' => ['auth', 'ceklevel:admin,prodi']], function() { 
  route::get('/beasiswa',  [App\Http\Controllers\BeasiswaController::class, 'index']);
  route::get('/persetujuan',  [App\Http\Controllers\BeasiswaController::class, 'index1']);
  route::get('/pengumuman',  [App\Http\Controllers\BeasiswaController::class, 'index2']);
  route::post('/ajukan/{id}',  [App\Http\Controllers\BeasiswaController::class, 'ajukan'])->name('ajukan.beasiswa');
  route::post('/terima/{id}',  [App\Http\Controllers\BeasiswaController::class, 'terima'])->name('terima.beasiswa');
  route::post('/tolak/{id}',  [App\Http\Controllers\BeasiswaController::class, 'tolak'])->name('tolak.beasiswa');
  route::get('/beasiswa/{id}/edit', [App\Http\Controllers\BeasiswaController::class, 'edit']);
  route::put('/beasiswa/{id}', [App\Http\Controllers\BeasiswaController::class, 'update'])->name('update_data');
  route::delete('/beasiswa/{id}', [App\Http\Controllers\BeasiswaController::class,'destroy']);
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,mahasiswa,prodi,']], function() {
   route::get('/beasiswa/create', [App\Http\Controllers\BeasiswaController::class, 'create']);
  route::post('/beasiswa/store ' , [App\Http\Controllers\BeasiswaController::class, 'store']);
  route::get('/beasiswa/{id}', [App\Http\Controllers\BeasiswaController::class, 'show']);

});

//Proposal 

//
    
route::get('/proposal',  [App\Http\Controllers\ProposalController::class, 'index']);

route::get('/proposal/create', [App\Http\Controllers\ProposalController::class, 'create']);
route::post('/proposal/store', [App\Http\Controllers\ProposalController::class, 'store']);
route::get('/proposal/{id}/edit', [App\Http\Controllers\ProposalController::class, 'edit']);
route::put('/proposal/{id}', [App\Http\Controllers\ProposalController::class, 'update'])->name('ubah_data');
route::delete('/proposal/{id}', [App\Http\Controllers\ProposalController::class,'destroy']);