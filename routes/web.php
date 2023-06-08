<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeniController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RegistController;

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

// Route::group(['Middleware' => ['auth']], function(){
//     Route::group(['Middleware' => ['cekLogin=Admin']], function(){
//         Route::controller(DashboardController::class)->group(function () {
//             Route::get('/dashboard', 'index');
//         });
//     });
// });

Route::controller(RegistController::class)->group(function () {
    Route::get('/regist', 'index');
    Route::post('/regist/store', 'store');

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
    Route::get('/seni/create', 'create');
    Route::post('/seni/store', 'store');
    Route::post('/save-marker', 'saveMarker');
    Route::get('/seni/edit/{id}', 'edit');
    Route::post('/seni/update/{id}', 'update');
    Route::delete('/seni/destroy/{id}', 'destroy');
});

Route::controller(PengajuanController::class)->group(function () {
    Route::get('/pengajuan', 'index');
});

Route::controller(KomentarController::class)->group(function () {
    Route::get('/komentar', 'index');
});

// Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin'],function (){
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });

// Route::middleware(['web','guest'])->group(function () {
//     Route::get('/login', [LoginController::class, 'index'])->name('login');
//     Route::post('/login', [LoginController::class, 'authenticate']);
//     Route::post('/logout', [LoginController::class, 'logout']);
// });

// dimas
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(['guest']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);