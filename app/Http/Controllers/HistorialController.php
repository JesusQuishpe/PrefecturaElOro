<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('texto')){
            $model=new Historial();
            $datos=$model->obtenerHistorial($request->input('texto'));
            return view('laboratorio.historial.index',['datos'=>$datos]);
        }
        
        return view('laboratorio.historial.index');
    }
}
