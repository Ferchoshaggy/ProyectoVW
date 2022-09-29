<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

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
