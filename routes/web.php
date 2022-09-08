<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuariosController;


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
    return view('auth.login');
});

//Tablero
Route::get('/dash', [DashController::class,'vista_dash'])->name('vista_dash');

//Reporte
Route::get('/report', [ReportesController::class,'vista_report'])->name('vista_report');

//Usuarios
Route::get('/users', [UsuariosController::class,'vista_users'])->name('vista_users');

