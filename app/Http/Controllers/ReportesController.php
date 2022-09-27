<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function Ramsey\Uuid\v1;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_report(){
        $reportes=DB::table('tickets')->select('*')->get();
        $users=DB::table('users')->select('*')->get();
        return view('Reportes.reporte',compact("reportes","users"));
    }
    public function vista_newReport(){
        $usuario=DB::table("users")->where("id",Auth::user()->id)->get();
        return view('Reportes.newReport',compact("usuario"));
    }
     public function report_save(Request $request){
        $users=DB::table("users")->where("id",Auth::user()->id)->select("concesionaria")->first();
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
        "usuario"=>$request['idPerfil'],
        "fuente"=>$request['fuente'],
        "tipo"=>$request['tipo'],
        "prioridad"=>$request['prioridad'],
        "tema"=>$request['tema'],
        "descripcion"=>$request['descripcion'],
       // "archivo"=>$doc,
        "status"=>"Abierto",
        "codigo"=>$clave,

        ]);

        return redirect()->back()->with(['message' => "Ticket Levantado Con Exito", 'color' => 'success']);

    }


}
