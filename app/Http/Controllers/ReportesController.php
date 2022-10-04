<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;


class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_report(){
      if(Auth::user()->tipo_user===1){  
        $reportes=DB::table('tickets')->select('*')->get();
}else if(Auth::user()->tipo_user===2){
    $reportes=DB::table('tickets')->where("usuario",Auth::user()->id)->get();
}
$users=DB::table('users')->select('*')->get();
        return view('Reportes.reporte',compact("reportes","users"));
    }
    public function vista_newReport(){
        $usuario=DB::table("users")->where("id",Auth::user()->id)->get();
        return view('Reportes.newReport',compact("usuario"));
    }
     public function report_save(Request $request){
        $users=DB::table("users")->where("id",Auth::user()->id)->select("concesionaria")->first();


        if($request['archivo']!=null){
            $file = $request->file('archivo');
            $nombre = $file->getClientOriginalName();
            $nombre2 = time()."".$nombre;
            $destinationPath = public_path().'/imgTicket';
        }else{
            $nombre2=null;
        }
        if($request['archivo']!=null){
            $file_image = $request->file('archivo');
            $file_image->move($destinationPath,$nombre2);
        }


        $fecha=date('dmy');
        $hora = now("America/Mexico_City")->isoFormat('Hmm');

        if($users->concesionaria=="Fersan"){
          $inic="FMIT-";
        }else if($users->concesionaria=="Chaixtsu"){
            $inic="CMIT-";
        }else if($users->concesionaria=="Navarra"){
            $inic="NMIT-";
        }
       $clave=$inic.$fecha.$hora.'-'.rand(000,999);


        DB::table("tickets")->insert([
        "opcion1"=>$request['op1'],
        "opcion2"=>$request['op2'],
        "opcion3"=>$request['op3'],
        "opcion4"=>$request['op4'],
        "usuario"=>$request['idPerfil'],
        "fuente"=>$request['fuente'],
        "tipo"=>$request['tipo'],
        "prioridad"=>$request['prioridad'],
        "tema"=>$request['tema'],
        "descripcion"=>$request['descripcion'],
        "archivo"=>$nombre2,
        "status"=>"Abierto",

        ]);

        $ticketId = DB::getPdo()->lastInsertId();
        $clave=$inic.$fecha.$hora.'-'.$ticketId;
        DB::table("tickets")->where("id",$ticketId)->update([
            "codigo"=>$clave,
        ]);

        return redirect()->back()->with(['message' => "Ticket Levantado Con Exito", 'color' => 'success']);


    }
function cambiar_status(Request $request){
try{
    DB::table("tickets")->where("id",$request["id_ticket"])->update([
        "status"=> "Cerrado",
    ]);
    return redirect()->back()->with(['message' => "Se Cambio el Ticket Correctamente", 'color' => 'success']);
}catch(\Throwable $th) {
    //throw $th;
}
}

function ticket_delete(Request $request){
    try {

        if($request["id_ticket"]!=0){
$archivo_delete=DB::table("tickets")->where("id",$request["id_ticket"])->first();

if($archivo_delete->archivo!=null){
    $rute_archivo=public_path('imgTicket/'.$archivo_delete->archivo);
    File::delete($rute_archivo);
}

    DB::table("tickets")->where("id",$request["id_ticket"])->delete();
            }

      return redirect()->back()->with(['message' => "Se Elimino correctamente el Ticket", 'color' => 'success']);

    } catch (\Throwable $th) {
        //throw $th;
    }
}

function reply_report(){

    return view("Reportes.replyReport");
}

}
