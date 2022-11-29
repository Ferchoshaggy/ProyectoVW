<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_edit(){
    $usuarios=DB::table("users")->where("id",Auth::user()->id)->get();
    $tipos=DB::table("tipo_users")->select('*')->get();
        return view('Usuarios.Editar',compact('usuarios','tipos'));
    }

    public function actualizar_user(Request $request){

        $foto_delete=DB::table("users")->where("id",Auth::user()->id)->first();

        $time = date("d-m-Y")."-".time();

        if($request['foto']!=null){

            //eliminar la foto si es que existe
            if($foto_delete->foto!=null){
                $rute_fotos=public_path('imgUser/'.$foto_delete->foto);
                File::delete($rute_fotos);
            }
            //guardamos la nueva
            $foto = $time.''.rand(000,999).'foto'.$foto_delete->id.".".$request['foto']->getClientOriginalExtension();
            $destinationPath = public_path().'/imgUser';
            $file_image = $request->file('foto');
            $file_image->move($destinationPath,$foto);
            //$foto="/up_file_participantes_eventos/".$time;
        }else{
            $foto=$foto_delete->foto;
        }

        $user=auth::user();
        $userPassword=$user->password;

        if($request->passAA !=""){

            $request->validate([
                'passN'=>'min:8',
                ]);

        $nuewPass=$request->passN;

        if(Hash::check($request->passAA,$userPassword)){

            $user->password=hash::make($request->passN);
            DB::table("users")->where("id",Auth::user()->id)->update([
                "name"=>$request['nombre'],
                "foto"=>$foto,
                "genero"=>$request['genero'],
                "password"=>$user->password,
            ]);
        }else{
            return redirect()->back()->with(['message' => "La Contraseña Actual No es correcta ", 'color' => 'danger']);
        }

        }else{
            DB::table("users")->where("id",Auth::user()->id)->update([
                "name"=>$request['nombre'],
                "foto"=>$foto,
                "genero"=>$request['genero'],

            ]);
        }

 return redirect()->back()->with(['message' => "Datos Actualizados con Exito", 'color' => 'success']);

    }
}
