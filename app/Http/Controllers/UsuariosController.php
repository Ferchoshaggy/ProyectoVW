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
}
