<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\GadgetController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;



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
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::resource('profil', ProfilController::class)->middleware('auth');
Route::resource('pengguna', PenggunaController::class)->middleware('auth');
Route::resource('gadget', GadgetController::class)->middleware('auth');
Route::resource('partner', PartnerController::class)->middleware('auth');
Route::resource('order', OrderController::class)->middleware('auth');
Route::resource('status', StatusController::class)->middleware('auth');
