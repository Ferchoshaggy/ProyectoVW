<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\InventoryController;
use App\Imports\InventoryImport;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(['middleware' => ['auth', 'admin']], function () {
//Tablero
Route::get('/dash', [DashController::class,'vista_dash'])->name('vista_dash');
//usuario
Route::get('/users', [UsuariosController::class,'vista_users'])->name('vista_users');
//Inventario
Route::get('/inventory',[InventoryController::class,'vista_inventario'])->name('vista_inven');
});

//redirect login
Route::get('/redirects',[DashController::class,'index'])->name('index_vista');

//Reporte
Route::get('/report', [ReportesController::class,'vista_report'])->name('vista_report');
Route::get('/newReport',[ReportesController::class,'vista_newReport'])->name('vista_newReport');
Route::post('/save_report',[ReportesController::class,'report_save'])->name('report_save');
Route::post('/pdf_report',[ReportesController::class,'report_pdf'])->name('report_pdf');
Route::get('/replyreport/{id}',[ReportesController::class,'reply_report'])->name('reply_report');
Route::post('/excel_report',[ReportesController::class,'report_excel'])->name('report_excel');

//tickets
Route::post('/change_status',[ReportesController::class,'cambiar_status'])->name('cambiar_status');
Route::delete('/delete_ticket',[ReportesController::class,'ticket_delete'])->name('ticket_delete');
Route::post('/ticket/{id}/download', [ReportesController::class,'descargarA'])->name('descargarA');
Route::post('/ticket_reply',[ReportesController::class,'ticket_reply'])->name('ticket_reply');


//Usuarios
Route::post('/save_user',[UsuariosController::class,'guardar_usuario'])->name('save_users');
Route::delete('/delete_user',[UsuariosController::class,'user_delete'])->name('user_delete');
Route::post('/users_cambiar', [UsuariosController::class,'cambiar_users'])->name('cambiar_users');
Route::post('/reset_password',[UsuariosController::class,'res_pass'])->name('res_pass');

//Configuracion de Usuario
Route::get('/ConfigUser', [UserController::class,'vista_edit'])->name('edit_user');
Route::post('/update_user',[UserController::class,'actualizar_user'])->name('user_update');

//buscar datos
Route::get("/search_user/{id}",[SearchController::class,'userSearch'])->name('UserSearch');
Route::get("/ticket_search/{id}",[SearchController::class,'ticketSearch'])->name('TicketSearch');

//Inventario
Route::post("/update_inventory",[InventoryController::class,"inventory_up"])->name('inventory_up');
Route::get('/download_plantilla',[InventoryController::class,"descarga_plantilla"])->name('descarga_plantilla');
Route::get("/inv_search/{id}",[SearchController::class,'inventorySearch'])->name('inventorySearch');
Route::delete('/delete_invdate',[InventoryController::class,'delete_inv'])->name('delete_inv');
Route::post("/edit_dateinv",[InventoryController::class,'edit_invdate'])->name('edit_invdate');
Route::post("/new_inventorie",[InventoryController::class,'save_inve'])->name('save_inve');
Route::post("/pdf_responsive",[InventoryController::class,'responsive_pdf'])->name('responsive_pdf');

route::get("/alv",function(){
return view("Responsiva.InventarioPDF");
});
