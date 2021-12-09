<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamenOrinaController extends Controller
{
    //
    public function index()
    {
        return view('laboratorio.index');
    }
    public function nuevo()
    {
        return view('laboratorio.orina.nuevo');
    }
    public function editar()
    {
        return view('laboratorio.orina.editar');
    }
    public function todos()
    {
        return view('laboratorio.orina.todos');
    }
}
