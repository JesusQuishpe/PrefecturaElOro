<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoproparasitarioController extends Controller
{
    //
    public function index()
    {
        return view('laboratorio.index');
    }
    public function nuevo()
    {
        return view('laboratorio.coproparasitario.nuevo');
    }
    public function editar()
    {
        return view('laboratorio.coproparasitario.editar');
    }
    public function todos()
    {
        return view('laboratorio.coproparasitario.todos');
    }
}
