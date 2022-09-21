<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        return view('Reportes.newReport');
    }
     public function report_save(){

    }


}
