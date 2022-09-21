<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UserController;


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
Route::get('/newReport',[ReportesController::class,'vista_newReport'])->name('vista_newReport');
Route::post('/save_report',[ReportesController::class,'report_save'])->name('report_save');

//Usuarios
Route::get('/users', [UsuariosController::class,'vista_users'])->name('vista_users');
Route::post('/save_user',[UsuariosController::class,'guardar_usuario'])->name('save_users');


//Configuracion de Usuario
Route::get('/ConfigUser', [UserController::class,'vista_edit'])->name('edit_user');
Route::post('/update_user',[UserController::class,'actualizar_user'])->name('user_update');

