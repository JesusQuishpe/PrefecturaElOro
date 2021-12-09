<?php

namespace App\Http\Controllers;

use App\Models\Coprologia;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CoprologiaController extends Controller
{
    //
    public function index()
    {
        return view('laboratorio.index');
    }

    public function nuevo(Request $request)
    {
        $model=new Coprologia();

        $request->has('texto') ? $primeraVez=true :$primeraVez=false;

        //Si es que busca
        $texto=trim($request->query('texto'));
        $ultimaCita=$model->ultimaCita($texto);
        //Obtener los doctores
        $doctores=Doctor::all();
        return view('laboratorio.coprologia.nuevo',compact('doctores','ultimaCita','primeraVez'));
    }

    private function validateRequest(Request $request)
    {
        $validated=$request->validate([
            'id_cita'=>'required|numeric',
            'id_doc'=>'required|numeric',
            'id_tipo'=>'required|numeric',
            'consistencia'=>'required|max:100',
            'moco'=>'required|max:45',
            'sangre'=>'required|max:45',
            'ph'=>'required|numeric',
            'azucares_reductores'=>'required|max:45',
            'levadura_y_micelos'=>'required|max:45',
            'gram'=>'required|max:100',
            'leucocitos'=>'required|max:45',
            'polimorfonucleares'=>'required|max:100',
            'mononucleares'=>'required|max:100',
            'protozoarios'=>'required|max:100',
            'helmintos'=>'required|max:100',
            'esteatorrea'=>'required|max:100',
            'observaciones'=>'required|max:100'
        ]);
    }

    public function guardar(Request $request)
    {
        $this->validateRequest($request);
        $model=Coprologia::create($request->except(['_token']));
        $model->save();
        return redirect()->route('coprologia.nuevo');
    }

    public function update(Request $request,$id_coprologia)
    {
        $this->validateRequest($request);
        $coprologia=Coprologia::find($id_coprologia);
        $coprologia->update($request->except(['_token','_method']));
        return redirect()->route('coprologia.editar');
    }


    public function editar(Request $request)
    {
        $model=new Coprologia();
        $request->has('texto') ? $primeraVez=true :$primeraVez=false;
        $texto=$request->query('texto','');
        $ultimaCita=$model->ultimaCita($texto);
        $datos=$model->buscar($texto);
        return view('laboratorio.coprologia.editar',compact('ultimaCita','primeraVez','texto','datos'));
    }
    public function edit($id_coprologia)
    {
        $coprologia=Coprologia::find($id_coprologia);
        if($coprologia==null)
            return abort(404);
        $doctores=Doctor::all();
        return view('laboratorio.coprologia.edit',['coprologia'=>$coprologia,'doctores'=>$doctores]);
    }

    public function delete($id_coprologia)
    {
        $coprologia=Coprologia::find($id_coprologia);
        if($coprologia==null)
            return abort(404);
        $coprologia->delete();
        return redirect()->route('coprologia.editar');
    }

    public function todos()
    {
        return view('laboratorio.coprologia.eliminar');
    }
}
