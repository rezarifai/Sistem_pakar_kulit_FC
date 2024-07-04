<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RuleController;

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
    return view('welcome');
});

Auth::routes();

Route::resource('pasiens', PasienController::class);
Route::resource('gejala', GejalaController::class);
Route::resource('penyakit', PenyakitController::class);
Route::resource('diagnosa', DiagnosaController::class);
Route::resource('rules', RuleController::class);
Route::get('/form-diagnosa', [DiagnosaController::class, 'formDiagnosa'])->name('form.diagnosa');
Route::post('/proses-diagnosa', [DiagnosaController::class, 'prosesDiagnosa'])->name('proses.diagnosa');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('admin');

