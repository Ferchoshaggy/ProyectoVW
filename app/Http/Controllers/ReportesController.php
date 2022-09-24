<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_report(){
        return view('Reportes.reporte');
    }
    public function vista_newReport(){
        $usuario=DB::table("users")->where("id",Auth::user()->id)->get();
        return view('Reportes.newReport',compact("usuario"));
    }
     public function report_save(){

    }


}
