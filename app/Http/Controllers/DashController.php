<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_dash(){
        return view('Index');
    }



}
