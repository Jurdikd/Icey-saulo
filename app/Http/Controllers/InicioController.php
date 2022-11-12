<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    //
    public function index(){


//         //funcion para traer datos de la db para la dahboard
//         $solicitude = Solicitude::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
       
//         ->whereYear('created_at', date('Y'))
//         ->groupBy(DB::raw("month_name"))
//         ->orderBy('id','ASC')
//         ->pluck('count', 'month_name');

//         //devuelve los valores
// $labels = $solicitude->keys();
// $data = $solicitude->values();

                    //pasarlos a la vista
       // , compact('labels', 'data'))
return view('layouts.plantilla');
    } 
    
}
