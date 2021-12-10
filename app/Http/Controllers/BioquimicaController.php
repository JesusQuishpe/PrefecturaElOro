<?php

namespace App\Http\Controllers;

use App\Models\Bioquimica;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BioquimicaController extends Controller
{
    //
    
    public function nuevo(Request $request)
    {
        $model=new Bioquimica();
        $doctores=Doctor::all();
        if($request->has('texto')){
            $texto=$request->query('texto');
            $ultimaCita=$model->ultimaCita($texto);
            return view('laboratorio.bioquimica.nuevo',compact('doctores','ultimaCita','texto'));
        }
        
        return view('laboratorio.bioquimica.nuevo',compact('doctores'));
    }

    public function editar(Request $request)
    {
        $model=new Bioquimica();
        $texto=$request->query('texto','');
        $datos=$model->buscar($texto);
        return view('laboratorio.bioquimica.editar',compact('texto','datos'));
    }

    public function edit($id_bioquimica)
    {
        $bioquimica=Bioquimica::find($id_bioquimica);
        if($bioquimica==null)
            return abort(404);
        $doctores=Doctor::all();
        return view('laboratorio.bioquimica.edit',['bioquimica'=>$bioquimica,'doctores'=>$doctores]);
    }
    public function delete($id_bioquimica)
    {
        $bioquimica=Bioquimica::find($id_bioquimica);
        if($bioquimica==null)
            return abort(404);
        $bioquimica->delete();
        return redirect()->route('bioquimica.editar');
    }

    
    public function update(Request $request,$id_bioquimica)
    {
        $validated=$request->validate([
            'id_cita'=>'required|numeric',
            'id_doc'=>'required|numeric',
            'id_tipo'=>'required|numeric',
            'glucosa'=>'required|numeric',
            'urea'=>'required|numeric',
            'creatinina'=>'required|numeric',
            'acido_urico'=>'required|numeric',
            'colesterol_total'=>'required|numeric',
            'colesterol_hdl'=>'required|numeric',
            'colesterol_ldl'=>'required|numeric',
            'trigliceridos'=>'required|numeric',
            'proteinas_totales'=>'required|numeric',
            'albumina'=>'required|numeric',
            'globulina'=>'required|numeric',
            'relacion_ag'=>'required|numeric',
            'bilirrubina_directa'=>'required|numeric',
            'bilirrubina_indirecta'=>'required|numeric',
            'bilirrubina_total'=>'required|numeric',
            'gamma_gt'=>'required|numeric',
            'calcio'=>'required|numeric',
            'vdrl'=>'required|numeric',
            'proteinas_c_react'=>'required|numeric',
            'ra_test_latex'=>'required|numeric',
            'asto'=>'required|numeric',
            'salmonella_o'=>'required|numeric',
            'salmonella_h'=>'required|numeric',
            'paratifica_a'=>'required|numeric',
            'paratifica_b'=>'required|numeric',
            'proteus_0x19'=>'required|numeric',
            'proteus_0x2'=>'required|numeric',
            'proteus_0xk'=>'required|numeric',
            'transaminasa_ox'=>'required|numeric',
            'transaminasa_pir'=>'required|numeric',
            'fosfatasa_alcalina_adultos'=>'required|numeric',
            'fosfatasa_alcalina_ninos'=>'required|numeric',
            'amilasa'=>'required|numeric',
            'lipasa'=>'required|numeric',
            'observaciones'=>'required'
        ]);

        $bioquimica=Bioquimica::find($id_bioquimica);
        $bioquimica->update($request->except(['_token','_method']));
        
    }
    public function todos()
    {
        return view('laboratorio.bioquimica.todos');
    }
    public function guardar(Request $request)
    {
        $validated=$request->validate([
            'id_cita'=>'required|numeric',
            'id_doc'=>'required|numeric',
            'id_tipo'=>'required|numeric',
            'glucosa'=>'required|numeric',
            'urea'=>'required|numeric',
            'creatinina'=>'required|numeric',
            'acido_urico'=>'required|numeric',
            'colesterol_total'=>'required|numeric',
            'colesterol_hdl'=>'required|numeric',
            'colesterol_ldl'=>'required|numeric',
            'trigliceridos'=>'required|numeric',
            'proteinas_totales'=>'required|numeric',
            'albumina'=>'required|numeric',
            'globulina'=>'required|numeric',
            'relacion_ag'=>'required|numeric',
            'bilirrubina_directa'=>'required|numeric',
            'bilirrubina_indirecta'=>'required|numeric',
            'bilirrubina_total'=>'required|numeric',
            'gamma_gt'=>'required|numeric',
            'calcio'=>'required|numeric',
            'vdrl'=>'required|numeric',
            'proteinas_c_react'=>'required|numeric',
            'ra_test_latex'=>'required|numeric',
            'asto'=>'required|numeric',
            'salmonella_o'=>'required|numeric',
            'salmonella_h'=>'required|numeric',
            'paratifica_a'=>'required|numeric',
            'paratifica_b'=>'required|numeric',
            'proteus_0x19'=>'required|numeric',
            'proteus_0x2'=>'required|numeric',
            'proteus_0xk'=>'required|numeric',
            'transaminasa_ox'=>'required|numeric',
            'transaminasa_pir'=>'required|numeric',
            'fosfatasa_alcalina_adultos'=>'required|numeric',
            'fosfatasa_alcalina_ninos'=>'required|numeric',
            'amilasa'=>'required|numeric',
            'lipasa'=>'required|numeric',
            'observaciones'=>'required'
        ]);
        $model=Bioquimica::create($request->except(['_token']));
        $model->save();
        return redirect('laboratorio/bioquimica/nuevo');
    }
    public function ultimaCita(Request $request)
    {
        $request->validate([
            'cedula'=>'required'
        ]);
        $model=new Bioquimica();
        $datos=$model->ultimaCita($request->input('cedula'));
        return response()->json($datos);
    }
}
