<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function actualizar_user(){

    }
}
