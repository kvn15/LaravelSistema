<?php

use App\Http\Controllers\administracion\PersonController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\configuracion\UserController;
use App\Http\Controllers\dashboard\DashboardController;
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

//Ruta de Auntenticacion
Route::controller(AuthController::class)->group( function () {
    Route::get('/', 'index')->name('auth.index');
    Route::post('/login', 'store')->name('auth.store');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

//Rutas de Personal

Route::group(['prefix'=>'administracion','as'=>'admin.'],function () {
    Route::resource('personal', PersonController::class)->middleware('auth');
});

Route::group(['prefix'=>'configuracion','as'=>'config.'],function () {
    Route::resource('user', UserController::class)->middleware('auth');
});
