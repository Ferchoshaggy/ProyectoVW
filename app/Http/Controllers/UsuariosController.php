<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use file;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function vista_users(){
        $inventarios=DB::table("inventories")->select('*')->get();
        $users=DB::table("users")->select('*')->get();
        $tipos=DB::table("tipo_users")->select('*')->get();
        return view('Usuarios.roles',compact('users','tipos','inventarios'));
    }

    public function guardar_usuario(Request $request){

        try {
        $request->validate([
            'contraseña'=>'min:8',
            ]);

        $maxId = DB::table('users')->max('id');
        DB::statement('ALTER TABLE users AUTO_INCREMENT=' . intval($maxId + 1) . ';');


        DB::table('users')->insert([
        "name"=>$request['nombre'],
        "id_inventario"=>$request['correo'],
        "email"=>$request['correo2'],
        "genero"=>$request['genero'],
        "concesionaria"=>$request['concesionaria'],
        "tipo_user"=>$request['tipo'],
        "password"=>bcrypt($request['contraseña']),

        ]);

        $data=["name"=>$request['nombre'] ,"email"=>$request['correo2'],"password"=>$request['contraseña'],"empresa"=>$request['concesionaria']];
        Mail::to($request['correo2'])->send(new MessageReceived("Usuario Creado",$data,"users"));

        return redirect()->back()->with(['message' => 'Usuario Guardado con Éxito', 'color' => 'success']);

    } catch (\Exception $e) {
        return redirect()->back()->with(['message' => "Algo salio mal, intente de nuevo", 'color' => 'warning']);
    }
    }

    public function user_delete(Request $request){
        try {

            if($request["id_user"]!=0){
                DB::table("users")->where("id",$request["id_user"])->delete();
                }

                return redirect()->back()->with(['message' => "Se Elimino correctamente el Usuario", 'color' => 'success']);

        } catch (\Throwable $th) {
            //throw $th;
        }

            }

function res_pass(Request $request){
if(strlen($request["nue_pass"])>=8){

DB::table('users')->where("id",$request["id_userp"])->update([
"password"=>bcrypt($request["nue_pass"]),
]);

return redirect()->back()->with(['message' => "Contraseña Restaurada con Exito", 'color' => 'success']);
}
return redirect()->back()->with(['message' => "Error la contraseña Debe Tener minimo 8 caracteres", 'color' => 'warning']);

}

   function cambiar_users(Request $request){
        try {

if($request["consecionaria"]!=null && $request["tipo"]!=null){

      DB::table("users")->where("id",$request["id_user_edit"])->update([
          "concesionaria"=> $request["concesionaria"],
          "tipo_user"=> $request["tipo"],
                ]);
    }

if($request["concesionaria"]==null){
    DB::table("users")->where("id",$request["id_user_edit"])->update([
        "tipo_user"=> $request["tipo"],
    ]);
}
if($request["tipo"]==null){
    DB::table("users")->where("id",$request["id_user_edit"])->update([
        "concesionaria"=> $request["concesionaria"],
    ]);

}
            return redirect()->back()->with(['message' => "Se cambio Al Usuario con Exito", 'color' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
