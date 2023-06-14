<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeniController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Routing\Controllers\Middleware;

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

// Route::get('/', function () {
//     return view('landingpage');
// });

// Landing Page
Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index');
});

// Budaya
Route::controller(BudayaController::class)->group(function () {
    Route::get('/budaya', 'index');
    Route::get('/budaya/create', 'create');
    Route::post('/budaya/store', 'store');
    Route::get('/budaya/show/{id}', 'show');
    Route::get('/budaya/search', 'search');
    Route::post('/save-marker', 'saveMarker');
    Route::get('/budaya/edit/{id}', 'edit');
    Route::post('/budaya/update/{id}', 'update');
    Route::delete('/budaya/destroy/{id}', 'destroy');
});

// Seni
Route::controller(SeniController::class)->group(function () {
    Route::get('/seni', 'index');
    Route::get('/seni/create', 'create');
    Route::post('/seni/store', 'store');
    Route::get('/seni/show/{id}', 'show');
    Route::get('/seni/search', 'search');
    Route::post('/save-marker', 'saveMarker');
    Route::get('/seni/edit/{id}', 'edit');
    Route::post('/seni/update/{id}', 'update');
    Route::delete('/seni/destroy/{id}', 'destroy');
});

// Penjuan Data
Route::controller(PengajuanController::class)->group(function () {
    Route::get('/pengajuan', 'index');
    Route::get('/pengajuanK', 'pengajuanK');
    Route::get('/pengajuan/create', 'create');
    Route::post('/pengajuan/store', 'store');
    Route::get('/pengajuan/show/{id}', 'show');
    Route::get('/pengajuan/search', 'search');
    Route::post('/pengajuan/{id}/approve', 'approve')->name('pengajuan.approve');
    Route::post('/pengajuan/{id}/reject', 'reject')->name('pengajuan.rejected');
});

// Komentar
Route::controller(KomentarController::class)->group(function () {
    Route::get('/komentar', 'index');
});

// Jadwal Event
Route::controller(JadwalController::class)->group(function () {
    Route::get('/jadwal', 'index');
    Route::get('/jadwal/create', 'create');
    Route::post('/jadwal/store', 'store');
    Route::get('/jadwal/show/{id}', 'show');
    Route::get('/jadwal/search', 'search');
    Route::get('/jadwal/edit/{id}', 'edit');
});

// Users
Route::controller(UsersController::class)->group(function () {
    Route::get('/users', 'index');
});


// Login & Register
// Register
Route::controller(RegistController::class)->group(function () {
    Route::get('/regist', 'index');
    Route::post('/regist/store', 'store');
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(['guest']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin'],function (){
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });