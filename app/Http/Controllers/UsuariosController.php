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
            'password'=>'min:8',
            ]);

        $maxId = DB::table('users')->max('id');
        DB::statement('ALTER TABLE users AUTO_INCREMENT=' . intval($maxId + 1) . ';');

        DB::table('users')->insert([
        "name"=>$request['nombre'],
        "ape_pat"=>$request['appaterno'],
        "ape_mat"=>$request['apmaterno'],
        "email"=>$request['correo'],
        "tipo_user"=>$request['tipo'],
        "password"=>bcrypt($request['contraseña']),

        ]);

        return redirect()->back()->with(['message' => 'Usuario Guardado con Éxito', 'color' => 'success']);


    }
}
