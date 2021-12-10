<?php

namespace App\Http\Controllers;

use App\Models\Coproparasitario;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CoproparasitarioController extends Controller
{
    //
    public function index()
    {
        return view('laboratorio.index');
    }

    public function nuevo(Request $request)
    {
        $model=new Coproparasitario();
        $doctores=Doctor::all();
        if($request->has('texto')){
            $texto=$request->query('texto');
            $ultimaCita=$model->ultimaCita($texto);
            return view('laboratorio.coproparasitario.nuevo',compact('doctores','ultimaCita','texto'));
        }
        
        return view('laboratorio.coproparasitario.nuevo',compact('doctores'));
    }

    private function validateRequest(Request $request)
    {
        $validated = $request->validate([
            'id_cita'=>'required|numeric',
            'id_doc'=>'required|numeric',
            'id_tipo'=>'required|numeric',
            'protozoarios'=>'required|max:45',
            'ameba_histolica'=>'required|max:100',
            'ameba_coli'=>'required|max:100',
            'giardia_lmblia'=>'required|max:100',
            'trichomona_homnis'=>'required|max:45',
            'chilomatik_mes'=>'required|max:45',
            'helmintos'=>'required|max:45',
            'trichuris_trichura'=>'required|max:45',
            'ascaris_lumbicoide'=>'required|max:45',
            'strongyloides_stecolaries'=>'required|max:45',
            'oxiuros'=>'required|max:45',
            'observaciones'=>'required|max:200'
        ]);
    }

    public function guardar(Request $request)
    {
        $this->validateRequest($request);
        $model = Coproparasitario::create($request->except(['_token']));
        $model->save();
        return redirect()->route('coproparasitario.nuevo');
    }

    public function update(Request $request, $id_coproparasitario)
    {
        $this->validateRequest($request);
        $coproparasitario = Coproparasitario::find($id_coproparasitario);
        $coproparasitario->update($request->except(['_token', '_method']));
        return redirect()->route('coproparasitario.editar');
    }


    public function editar(Request $request)
    {
        $model=new Coproparasitario();
        $texto=$request->query('texto','');
        $datos=$model->buscar($texto);
        return view('laboratorio.coproparasitario.editar',compact('texto','datos'));
    }
    public function edit($id_coproparasitario)
    {
        $coproparasitario = Coproparasitario::find($id_coproparasitario);
        if ($coproparasitario == null)
            return abort(404);
        $doctores = Doctor::all();
        return view('laboratorio.coproparasitario.edit', ['coproparasitario' => $coproparasitario, 'doctores' => $doctores]);
    }

    public function delete($id_coproparasitario)
    {
        $coproparasitario = Coproparasitario::find($id_coproparasitario);
        if ($coproparasitario == null)
            return abort(404);
        $coproparasitario->delete();
        return redirect()->route('coproparasitario.editar');
    }

    public function todos()
    {
        return view('laboratorio.coproparasitario.eliminar');
    }
}
