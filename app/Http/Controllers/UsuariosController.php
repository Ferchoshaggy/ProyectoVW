<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use file;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function vista_users(){
        $users=DB::table("users")->select('*')->get();
        $tipos=DB::table("tipo_users")->select('*')->get();
        return view('Usuarios.roles',compact('users','tipos'));
    }

    public function guardar_usuario(Request $request){
        $request->validate([
            'contraseña'=>'min:8',
            ]);

        $maxId = DB::table('users')->max('id');
        DB::statement('ALTER TABLE users AUTO_INCREMENT=' . intval($maxId + 1) . ';');

        DB::table('users')->insert([
        "name"=>$request['nombre'],
        "ape_pat"=>$request['appaterno'],
        "ape_mat"=>$request['apmaterno'],
        "email"=>$request['correo'],
        "genero"=>$request['genero'],
        "concesionaria"=>$request['concesionaria'],
        "tipo_user"=>$request['tipo'],
        "password"=>bcrypt($request['contraseña']),

        ]);

        return redirect()->back()->with(['message' => 'Usuario Guardado con Éxito', 'color' => 'success']);
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
    function cambiar_users(Request $request){
        try {
            DB::table("users")->where("id",$request["id_user_edit"])->update([
                "concesionaria"=> $request["concesionaria"],
                "tipo_user"=> $request["tipo"],
            ]);
            return redirect()->back()->with(['message' => "Se cambio Al Usuario con Exito", 'color' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
