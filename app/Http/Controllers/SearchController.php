<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function userSearch($id){

        $datosUser=DB::table("users")->where("id",$id)->first();
        return json_encode($datosUser);
    }
}
