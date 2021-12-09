<?php

namespace App\Http\Controllers;

use App\Models\MedicinaModel;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    public function index()
    {
        $model=new MedicinaModel();
        $clientes=$model->getClientes();
        return view('medicina/index',['clientes'=>$clientes]);
    }
}
