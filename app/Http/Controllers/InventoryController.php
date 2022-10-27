<?php

namespace App\Http\Controllers;

use App\Imports\InventoryImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    function vista_inventario(){

    $datos=DB::table('inventories')->select("*")->get();
    return view("Inventario.inventory",compact('datos'));
    }

public function inventory_up(Request $request){


Excel::import(new InventoryImport,$request->file('archivo'));
return redirect()->back()->with(['message' => "Se Importo el Excel con exito", 'color' => 'success']);

}
}
