<?php

namespace App\Http\Controllers;

use App\Imports\InventoryImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function vista_inventario(){

    $datos=DB::table('inventories')->select("*")->get();
    return view("Inventario.inventory",compact('datos'));
    }

public function inventory_up(Request $request){
try{
    Excel::import(new InventoryImport,$request->file('archivo'));
    return redirect()->back()->with(['message' => "Se Importo el Excel con exito", 'color' => 'success']);

}catch (\Exception $e) {

    return redirect()->back()->with(['message' => "Algo salio mal, Revisa tu excel con las reglas", 'color' => 'warning']);
}
}

public function descarga_plantilla(){
    $pahtToFile=public_path("Plantilla.rar");
    return response()->download($pahtToFile);
}

public function delete_inv(Request $request){
try{
DB::table('inventories')->where("id",$request['id_inv'])->delete();

return redirect()->back()->with(['message' => "Registro Eliminado con Exito", 'color' => 'success']);

} catch (\Throwable $th) {
    //throw $th;
}
}

public function edit_invdate(){

}


}
