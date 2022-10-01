<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\DB;
class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista_dash(){
        $tickets=DB::table('tickets')->select('*')->get();
        return view('Index',compact('tickets'));
    }



}
