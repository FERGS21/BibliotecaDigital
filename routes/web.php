<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EdicioneController;
use App\Http\Controllers\EditorialeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AutoreController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AsignaautoreController;
use App\Http\Controllers\EjemplareController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware'=>['auth']],function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('ediciones', EdicioneController::class);
    Route::resource('editoriales', EditorialeController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('autores', AutoreController::class);
    Route::resource('libros', LibroController::class);
    Route::resource('asignaautores', AsignaautoreController::class);
    Route::resource('ejemplares', EjemplareController::class);
});
