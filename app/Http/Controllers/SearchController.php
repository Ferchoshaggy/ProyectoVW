<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userSearch($id){

        $datosUser=DB::table("users")->where("id",$id)->first();
        return json_encode($datosUser);
    }
    public function ticketSearch($id){
      $datosTicket=DB::table('tickets')->where("id",$id)->first();
      return json_encode($datosTicket);
    }
    public function inventorySearch($id){
        $datoinv=DB::table('inventories')->where("id",$id)->first();
        $datosUser=DB::table("users")->where("id_inventario",$id)->first();
        return json_encode([$datoinv,$datosUser]);
    }
}
