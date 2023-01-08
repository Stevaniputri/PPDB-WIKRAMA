<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbsController;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\Guest;
use App\Http\Middleware\Login;



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
Route::middleware('Guest')->group(function() {
    Route::get('/', [PpdbsController::class, 'landing']);
    Route::get('/daftar', [PpdbsController::class, 'daftar']);
    Route::get('/daftar', [ApiController::class, 'index']);
    Route::get('/login',[PpdbsController::class, 'login']);
    Route::post('/login', [PpdbsController::class, 'auth'])->name('login.auth');
    Route::post('/store', [PpdbsController::class, 'store']);

});

Route::middleware('Login', 'CekRole:admin,user')->group(function() {
    Route::get('/dashboard',[PpdbsController::class, 'dashboard']);
    Route::post('/uploadBukti', [PpdbsController::class, 'pembayaran'])->name('uploadPembayaran');
    Route::get('/payment',[PpdbsController::class, 'payment']);

});

Route::middleware('Login', 'CekRole:admin')->group(function() {
    Route::get('/proof/{id}',[PpdbsController::class, 'proof']);
    Route::get('/detail',[PpdbsController::class, 'detail']);

});

Route::get('/logout', [PpdbsController::class, 'logout']);
Route::get('/result', [PpdbsController::class, 'result']);

