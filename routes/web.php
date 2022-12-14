<?php

use App\Http\Controllers\administracion\BrandController;
use App\Http\Controllers\administracion\CajaController;
use App\Http\Controllers\administracion\CategoryController;
use App\Http\Controllers\administracion\PersonController;
use App\Http\Controllers\administracion\PresentationController;
use App\Http\Controllers\administracion\ProveedorController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\configuracion\RolesController;
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
    //Crud Cliente
    Route::resource('cliente', ClientController::class)->middleware('auth');
    //Crud Proveedor
    Route::resource('proveedor', ProveedorController::class)->middleware('auth');
    //Crud Categoria
    Route::resource('categoria', CategoryController::class)->middleware('auth');
    //Crud Marca
    Route::resource('marca', BrandController::class)->middleware('auth');
    //Crud Presentacion
    Route::resource('presentacion', PresentationController::class)->middleware('auth');
    //Crud Caja
    Route::resource('caja', CajaController::class)->middleware('auth');
});

//Rutas Configuracion
Route::group(['prefix'=>'configuracion','as'=>'config.'],function () {
    Route::resource('user', UserController::class)->middleware('auth');
    Route::get('user/{user}/roleUser', [UserController::class, 'editv2'])->name('user.role');
    Route::put('user/roleUser/{user}', [UserController::class, 'updatev2'])->name('user.rolePut');
    //Crud Roles
    Route::resource('roles', RolesController::class)->middleware('auth');
});
