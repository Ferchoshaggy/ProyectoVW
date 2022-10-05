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

    public function index(){
        $role = Auth::user()->tipo_user;
        $checkrole = explode(',', $role);
        if (in_array(1, $checkrole)) {
            return redirect('/dash');
        } else {
            return redirect('/report');
        }
    }

    public function vista_dash(){
        $tickets=DB::table('tickets')->select('*')->get();
        return view('Index',compact('tickets'));
    }



}
