<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeniController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;

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
    return view('landingpage');
});


Route::controller(BudayaController::class)->group(function () {
    Route::get('/budaya', 'index');
    Route::get('/budaya/create', 'create');
    Route::post('/budaya/store', 'store');
    Route::post('/save-marker', 'saveMarker');
    Route::get('/budaya/edit/{id}', 'edit');
    Route::post('/budaya/update/{id}', 'update');
    Route::delete('/budaya/destroy/{id}', 'destroy');

});

Route::controller(SeniController::class)->group(function () {
    Route::get('/seni', 'index');
});

Route::controller(PengajuanController::class)->group(function () {
    Route::get('/pengajuan', 'index');
});

Route::controller(KomentarController::class)->group(function () {
    Route::get('/komentar', 'index');
});

Route::controller(JadwalController::class)->group(function () {
    Route::get('/jadwal', 'index');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/users', 'index');
});
    
Route::get('/dashboard', [DashboardController::class, 'index']);