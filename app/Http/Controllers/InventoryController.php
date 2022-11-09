<?php

namespace App\Http\Controllers;

use App\Imports\InventoryImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class InventoryController extends Controller
{


    function vista_inventario(){

    $datos=DB::table('inventories')->select("*")->get();
    return view("Inventario.inventory",compact('datos'));
    }

    public function inventory_up(Request $request){
        try{

            Excel::Import(new InventoryImport,$request->file('archivo'));
            return redirect()->back()->with(['message' => "Se Importo el Excel con exito", 'color' => 'success']);

        }catch (\Exception $e) {
          return $e;
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

public function save_inve(Request $request){
    try{

DB::table('inventories')->insert([
    "Nombre_de_Usuario"=>$request['nombre_user'] ?? "N/A",
    "Puesto"=>$request['puesto'] ?? "N/A",
    "Departamento"=>$request['departamento'] ?? "N/A",
    "Marca"=>$request['marca_cpu'] ?? "N/A",
    "Modelo"=>$request['modelo_cpu'] ?? "N/A",
    "No_de_serie"=>$request['no_serie'] ?? "N/A",
    "Procesador"=>$request['procesador'] ?? "N/A",
    "Ghz"=>$request['ghz'] ?? "N/A",
    "Disco"=>$request['disco'] ?? "N/A",
    "Mem_Ram"=>$request['memo_ram'] ?? "N/A",
    "Sistema_Operativo"=>$request['sistema_op'] ?? "N/A",
    "Monitor"=>$request['monitor'] ?? "N/A",
    "Marca_Monitor"=>$request['monitor_marca'] ?? "N/A",
    "Modelo_Monitor"=>$request['monitor_modelo'] ?? "N/A",
    "ADICIONAL"=>$request['adicional'] ?? "N/A",
    "Nomenclatura"=>$request['nomenclatura'] ?? "N/A",
    "I_Portal"=>$request['iportal'] ?? "N/A",
    "Correo_de_Planta"=>$request['correo_plant'] ?? "N/A",
    "Correo_Institucional"=>$request['correo_inst'] ?? "N/A",
    "Portal_de_Distribuidores"=>$request['portal_dist'] ?? "N/A",
    "GEKO"=>$request['geko'] ?? "N/A",
    "Clave_Telefonica"=>$request['clave_tel'] ?? "N/A",
    "IP"=>$request['ip'] ?? "N/A",
    "SIF"=>$request['sif'] ?? "N/A",
    "POC"=>$request['poc'] ?? "N/A",
    "NADCON"=>$request['nadcon'] ?? "N/A",
    "SAGA"=>$request['saga'] ?? "N/A",
    "Modelo_de_impresora"=>$request['modelo_imp'] ?? "N/A",
    "FECHA_COMPRA"=>$request['fec_compra'] ?? "N/A",
    "FACTURA"=>$request['factura'] ?? "N/A",
    "GARANTIA"=>$request['garantia'] ?? "N/A",
    "GRUPO_FORTINET"=>$request['grup_forti'] ?? "N/A",
    "CPU_O_LAPTOP"=>$request['cpu_lap'] ?? "N/A",
    "USUARIO_DE_RED"=>$request['usuario_red'] ?? "N/A",
    "Programas_Instalados"=>$request['pro_inst'] ?? "N/A",
    "VNC"=>$request['vnc'] ?? "N/A",
    "Adobe"=>$request['adobe'] ?? "N/A",
    "GDS"=>$request['gds'] ?? "N/A",
    "Antivirus"=>$request['antivirus'] ?? "N/A",
    "OFFICE"=>$request['office'] ?? "N/A",
    "MANTENIMIENTO"=>$request['mantenimiento'] ?? "N/A",
    "USUARIO_DE_GDS"=>$request['user_gds'] ?? "N/A",
    "REGULADOR"=>$request['regulador'] ?? "N/A",
    "MARCA_MODELO"=>$request['marca_modelo'] ?? "N/A",
]);

return redirect()->back()->with(['message' => "Registro Guardado con Exito", 'color' => 'success']);

    }catch(\Throwable $th){
return $th;
    }
}


public function edit_invdate(Request $request){
try{

    DB::table('inventories')->where("id",$request['id_invE'])->update([
        "Nombre_de_Usuario"=>$request['nombre_user'] ?? "N/A",
        "Puesto"=>$request['puesto'] ?? "N/A",
        "Departamento"=>$request['departamento'] ?? "N/A",
        "Marca"=>$request['marca_cpu'] ?? "N/A",
        "Modelo"=>$request['modelo_cpu'] ?? "N/A",
        "No_de_serie"=>$request['no_serie'] ?? "N/A",
        "Procesador"=>$request['procesador'] ?? "N/A",
        "Ghz"=>$request['ghz'] ?? "N/A",
        "Disco"=>$request['disco'] ?? "N/A",
        "Mem_Ram"=>$request['memo_ram'] ?? "N/A",
        "Sistema_Operativo"=>$request['sistema_op'] ?? "N/A",
        "Monitor"=>$request['monitor'] ?? "N/A",
        "Marca_Monitor"=>$request['monitor_marca'] ?? "N/A",
        "Modelo_Monitor"=>$request['monitor_modelo'] ?? "N/A",
        "ADICIONAL"=>$request['adicional'] ?? "N/A",
        "Nomenclatura"=>$request['nomenclatura'] ?? "N/A",
        "I_Portal"=>$request['iportal'] ?? "N/A",
        "Correo_de_Planta"=>$request['correo_plant'] ?? "N/A",
        "Correo_Institucional"=>$request['correo_inst'] ?? "N/A",
        "Portal_de_Distribuidores"=>$request['portal_dist'] ?? "N/A",
        "GEKO"=>$request['geko'] ?? "N/A",
        "Clave_Telefonica"=>$request['clave_tel'] ?? "N/A",
        "IP"=>$request['ip'] ?? "N/A",
        "SIF"=>$request['sif'] ?? "N/A",
        "POC"=>$request['poc'] ?? "N/A",
        "NADCON"=>$request['nadcon'] ?? "N/A",
        "SAGA"=>$request['saga'] ?? "N/A",
        "Modelo_de_impresora"=>$request['modelo_imp'] ?? "N/A",
        "FECHA_COMPRA"=>$request['fec_compra'] ?? "N/A",
        "FACTURA"=>$request['factura'] ?? "N/A",
        "GARANTIA"=>$request['garantia'] ?? "N/A",
        "GRUPO_FORTINET"=>$request['grup_forti'] ?? "N/A",
        "CPU_O_LAPTOP"=>$request['cpu_lap'] ?? "N/A",
        "USUARIO_DE_RED"=>$request['usuario_red'] ?? "N/A",
        "Programas_Instalados"=>$request['pro_inst'] ?? "N/A",
        "VNC"=>$request['vnc'] ?? "N/A",
        "Adobe"=>$request['adobe'] ?? "N/A",
        "GDS"=>$request['gds'] ?? "N/A",
        "Antivirus"=>$request['antivirus'] ?? "N/A",
        "OFFICE"=>$request['office'] ?? "N/A",
        "MANTENIMIENTO"=>$request['mantenimiento'] ?? "N/A",
        "USUARIO_DE_GDS"=>$request['user_gds'] ?? "N/A",
        "REGULADOR"=>$request['regulador'] ?? "N/A",
        "MARCA_MODELO"=>$request['marca_modelo'] ?? "N/A",

        ]);

 return redirect()->back()->with(['message' => "Registro Editado con Exito", 'color' => 'success']);

}catch(\Throwable $th){

}
}

public function responsive_pdf(Request $request){
$fecha=date('d-m-y');
    $diseno=$request['diseño'];
    $inventario=DB::table('inventories')->where("id",$request['id_userI'])->first();
    $pdf = PDF::loadView('Responsiva.InventarioPDF',compact('inventario','diseno','fecha'))->setPaper(array(0,0,1910,2450));
    return $pdf->stream("PDF_".$diseno.'.pdf');
}



}
