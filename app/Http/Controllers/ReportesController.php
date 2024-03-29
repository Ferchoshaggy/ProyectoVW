<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;
use PDF;

use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

use App\Exports\TicketsExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Storage;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_report(Request $request){
      if(Auth::user()->tipo_user===1){

        if($request['fechaMin'] && $request['fechaMax']){
            $reportes=DB::table('tickets')->whereDate("created_at",">=",$request['fechaMin'])->whereDate("created_at","<=",$request['fechaMax'])->select("*")->get();
           }else{

       $mes=date("m");
       $año=date("Y");
       $ultimo_dia = cal_days_in_month(CAL_GREGORIAN, $mes, $año);

       $reportes=DB::table('tickets')->whereDate("created_at",">=","$año/$mes/1")->whereDate("created_at","<=","$año/$mes/$ultimo_dia")->select("*")->get();
               }

}else if(Auth::user()->tipo_user===2){

    if($request['fechaMin'] && $request['fechaMax']){
        $reportes=DB::table('tickets')->whereDate("created_at",">=",$request['fechaMin'])->whereDate("created_at","<=",$request['fechaMax'])->where("usuario",Auth::user()->id)->select("*")->get();
       }else{

   $mes=date("m");
   $año=date("Y");
   $ultimo_dia = cal_days_in_month(CAL_GREGORIAN, $mes, $año);

   $reportes=DB::table('tickets')->whereDate("created_at",">=","$año/$mes/1")->whereDate("created_at","<=","$año/$mes/$ultimo_dia")->where("usuario",Auth::user()->id)->select("*")->get();
           }
}
$users=DB::table('users')->select('*')->get();
        return view('Reportes.reporte',compact("reportes","users"));
    }


    public function vista_newReport(){
        $usuario=DB::table("users")->where("id",Auth::user()->id)->get();
        $datos=DB::table('users')->select('*')->get();
        return view('Reportes.newReport',compact("usuario","datos"));
    }
     public function report_save(Request $request){
try{

$usuario=DB::table("users")->where("id",$request['idPerfil'])->select("*")->first();

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

        $rand=rand(0000000,9999999);
       // $hora = now("America/Mexico_City")->isoFormat('Hmm');

        if($request["concesionaria"]=="Fersan"){
          $inic="FMIT-";
        }else if($request["concesionaria"]=="Chaixtsu"){
            $inic="CMIT-";
        }else if($request["concesionaria"]=="Navarra"){
            $inic="NMIT-";
        }else if($request["concesionaria"]=="SEV"){
            $inic="SEVIT-";
        }else if($request["concesionaria"]=="Harley"){
            $inic="HDIT-";
        }

if(Auth::user()->tipo_user==1){
$asignado=Auth::user()->name;
}else{
$asignado="Esperando Asignacion";
}


$max = DB::table('tickets')->max('id') + 1;
DB::statement("ALTER TABLE tickets AUTO_INCREMENT =  $max");


        DB::table("tickets")->insert([
        "opcion1"=>$request['op1'],
        "opcion2"=>$request['op2'],
        "opcion3"=>$request['op3'],
        "opcion4"=>$request['op4'],
        "usuario"=>$request['idPerfil'],
        "fuente"=>$asignado,
        "tipo"=>$request['tipo'],
        "prioridad"=>$request['prioridad'],
        "tema"=>$request['tema'],
        "descripcion"=>$request['descripcion'],
        "archivo"=>$nombre2,
        "status"=>"Abierto",

        ]);

        $ticketId = DB::getPdo()->lastInsertId();
        $clave=$inic.$rand.'-'.$ticketId;
        DB::table("tickets")->where("id",$ticketId)->update([
            "codigo"=>$clave,
        ]);

        $fec=DB::table("tickets")->where("id",$ticketId)->select("created_at")->first();

    if($request["enviar"]=="SI"){
        $data=["name"=>$usuario->name,"tema"=>$request["tema"],"fecha"=>$fec->created_at,"empresa"=>$request["concesionaria"],"codigo"=>$clave];
        Mail::to(env('MAIL_USERNAME'))->send(new MessageReceived("Ticket Creado",$data,"ticket"));

        Mail::to($usuario->email)->send(new MessageReceived("Ticket Levantado",$data,"ticketlevantado"));

    }
        return redirect()->back()->with(['message' => "Ticket Levantado Con Exito", 'color' => 'success']);
    }catch(\Throwable $th) {
        return redirect()->back()->with(['message' => "Error", 'color' => 'danger']);
    }

    }
public function cambiar_status(Request $request){
try{

    $email=DB::table("users")->where("id",$request["id_usuario"])->first();
    $datos=DB::table("tickets")->where("id",$request["id_ticket"])->first();
    $fecha=Carbon::now();
    DB::table("tickets")->where("id",$request["id_ticket"])->update([
        "status"=> "Cerrado",
    ]);
    if($request["enviar"]=="SI"){
    $data=["name"=>$email->name,"codigo"=>$datos->codigo,"tema"=>$datos->tema,"descripcion"=>$datos->descripcion,"fechaF"=>$fecha->toDateTimeString(),"empresa"=>$email->concesionaria,"solucion"=>$request['soluciones']];
    Mail::to($email->email)->send(new MessageReceived("Ticket Cerrado",$data,"Cerrado"));
}
    return redirect()->back()->with(['message' => "Se Cambio el Ticket Correctamente", 'color' => 'success']);
}catch(\Throwable $th) {
    return redirect()->back()->with(['message' => "Error", 'color' => 'danger']);
}
}

public function ticket_delete(Request $request){
    try {

        if($request["id_ticket"]!=0){
$archivo_delete=DB::table("tickets")->where("id",$request["id_ticket"])->first();
$reply_delete=DB::table('replytickets')->where("id_ticket",$request["id_ticket"])->get();

if($archivo_delete->archivo!=null){
    $rute_archivo=public_path('imgTicket/'.$archivo_delete->archivo);
    File::delete($rute_archivo);
}

foreach($reply_delete as $replys_delete){
if($replys_delete->image_url!=null){
    $rute_archivo=public_path('imgTicket/'.$replys_delete->image_url);
    File::delete($rute_archivo);
}
}

    DB::table("tickets")->where("id",$request["id_ticket"])->delete();
            }

      return redirect()->back()->with(['message' => "Se Elimino correctamente el Ticket", 'color' => 'success']);

    } catch (\Throwable $th) {
        return redirect()->back()->with(['message' => "Error", 'color' => 'danger']);
    }
}

public function reply_report($id){
    $ticket=DB::table('tickets')->where("id",$id)->first();
    $users=DB::table('users')->select("*")->get();
    $replys=DB::table('replytickets')->where("id_ticket",$id)->get();


  return view('Reportes.replyReport',compact('ticket','users','replys'));
}

public function ticket_reply(Request $request){
try{

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

DB::table('replytickets')->insert([
'replica'=>$request['descripcion'],
'image_url'=>$nombre2,
'id_ticket'=>$request['tickid'],
'id_user'=>$request['userid']
]);

DB::table('tickets')->where('id',$request['tickid'])->update([
    "status"=> "Contestado",
]);

return redirect()->back()->with(['message' => "Se Mando la Contestacion con Exito", 'color' => 'success']);

}catch(\Throwable $th) {
    return redirect()->back()->with(['message' => "Error", 'color' => 'danger']);
}
}

public function descargarA($id){
    $doc=DB::table("tickets")->where('id',$id)->first();
    $pahtToFile=public_path("imgTicket/". $doc->archivo);
    return response()->download($pahtToFile);
}

public function report_pdf(Request $request){

    if($request["filtracion"]=="todos"){
        $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->get();
    }elseif($request["filtracion"]=="CMIT"){
         $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'CMIT'.'%')->get();
    }elseif($request["filtracion"]=="FMIT"){
         $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'FMIT'.'%')->get();
    }elseif($request["filtracion"]=="NMIT"){
         $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'NMIT'.'%')->get();
    }elseif($request["filtracion"]=="HDIT"){
        $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'HDIT'.'%')->get();
    }elseif($request["filtracion"]=="SEVIT"){
    $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'SEVIT'.'%')->get();
    }

    $users=DB::table('users')->select('*')->get();
    $diseno=$request['diseño'];
    $fechamin=$request['fechamin'];
    $fechamax=$request['fechamax'];
    $filtracion=$request['filtracion'];

    $pdf = PDF::loadView('Reportes.Reporte_PDF',compact('tickets','users','diseno','fechamin','fechamax','filtracion'))->setPaper(array(0,0,612.00,792.00));
    return $pdf->stream("PDF_".$diseno."_".$filtracion.'.pdf');

}

public function report_excel(Request $request){

    if($request["filtracion"]=="todos"){
        $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->get();
    }elseif($request["filtracion"]=="CMIT"){
         $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'CMIT'.'%')->get();
    }elseif($request["filtracion"]=="FMIT"){
         $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'FMIT'.'%')->get();
    }elseif($request["filtracion"]=="NMIT"){
         $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'NMIT'.'%')->get();
    }elseif($request["filtracion"]=="HDIT"){
        $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'HDIT'.'%')->get();
    }elseif($request["filtracion"]=="SEVIT"){
      $tickets = DB::table('tickets')->whereDate("created_at",">=",$request['fechamin'])->whereDate("created_at","<=",$request['fechamax'])->where('codigo','LIKE','%'.'SEVIT'.'%')->get();
    }

    $users=DB::table('users')->select('*')->get();
    $diseno=$request['diseño'];
    $fechamin=$request['fechamin'];
    $fechamax=$request['fechamax'];
    $filtracion=$request['filtracion'];

    return Excel::download(new TicketsExport($fechamin,$fechamax,$diseno,$filtracion,$tickets,$users),"EXCEL_".$diseno."_".$filtracion.".xlsx");

}

public function asignar_ticket(Request $request){
    try{
DB::table('tickets')->where('id',$request['id_ticket'])->update([
"fuente"=>$request['asignacion'],

]);

return redirect()->back()->with(['message' => "El ticket Fue asignado", 'color' => 'success']);
}catch(\Throwable $th) {
    return redirect()->back()->with(['message' => "Error", 'color' => 'danger']);
}
}

public function solicita_ticket(Request $request){
    try{

        DB::table('tickets')->where('id',$request['id_ticket'])->update([
            "usuario"=>$request['asignacion'],

            ]);

       $usuario=DB::table("users")->where("id",$request['asignacion'])->select("*")->first();
       $tic=DB::table('tickets')->where("id",$request['id_ticket'])->select("*")->first();


            $data=["name"=>$usuario->name,"tema"=>$tic->tema,"codigo"=>$tic->codigo];
            Mail::to($usuario->email)->send(new MessageReceived("Ticket Levantado",$data,"ticketlevantado"));

return redirect()->back()->with(['message' => "El ticket Fue asignado", 'color' => 'success']);

    }catch(\Throwable $th) {
        return redirect()->back()->with(['message' => "Error", 'color' => 'danger']);
    }
}

}
