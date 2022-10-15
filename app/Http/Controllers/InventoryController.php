<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function vista_inventario(){
        return view("Inventario.inventory");
    }
}
