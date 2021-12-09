<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\ExamenOrina;
use Illuminate\Http\Request;

class ExamenOrinaController extends Controller
{
    //
    public function index()
    {
        return view('laboratorio.index');
    }

    public function nuevo(Request $request)
    {
        $model = new ExamenOrina();

        $request->has('texto') ? $primeraVez = true : $primeraVez = false;

        //Si es que busca
        $texto = trim($request->query('texto'));
        $ultimaCita = $model->ultimaCita($texto);
        //Obtener los doctores
        $doctores = Doctor::all();
        return view('laboratorio.orina.nuevo', compact('doctores', 'ultimaCita', 'primeraVez'));
    }

    private function validateRequest(Request $request)
    {
        $validated = $request->validate([
            'id_cita' => 'required|numeric',
            'id_doc' => 'required|numeric',
            'id_tipo' => 'required|numeric',
            'color'=> 'required|max:45',
            'olor'=> 'required|max:45',
            'sedimento'=> 'required|max:45',
            'ph'=> 'required|numeric',
            'densidad'=> 'required|numeric',
            'leucocituria'=> 'required|max:45',
            'nitrito'=> 'required|max:45',
            'albumina'=> 'required|max:45',
            'glucosa'=> 'required|max:45',
            'cetonas'=> 'required|max:45',
            'urobilinogeno'=> 'required|max:45',
            'bilirrubina'=> 'required|max:45',
            'hem_euteros'=> 'required|max:45',
            'h_lisados'=> 'required|max:45',
            'acido_ascorbico'=> 'required|max:45',
            'hematies'=> 'required|max:45',
            'leucocitos'=> 'required|max:45',
            'cel_epiteliales'=> 'required|max:45',
            'fil_mucosos'=> 'required|max:45',
            'bacterias'=> 'required|max:45',
            'bacilos'=> 'required|max:45',
            'cristales'=> 'required|max:45',
            'cilindros'=> 'required|max:45',
            'piocitos'=> 'required|max:45',
            'observaciones' => 'required|max:200'
        ]);
    }

    public function guardar(Request $request)
    {
        $this->validateRequest($request);
        $model = ExamenOrina::create($request->except(['_token']));
        $model->save();
        return redirect()->route('examen-orina.nuevo');
    }

    public function update(Request $request, $id_examenOrina)
    {
        $this->validateRequest($request);
        $examenOrina = ExamenOrina::find($id_examenOrina);
        $examenOrina->update($request->except(['_token', '_method']));
        return redirect()->route('examen-orina.editar');
    }


    public function editar(Request $request)
    {
        $model = new ExamenOrina();
        $request->has('texto') ? $primeraVez = true : $primeraVez = false;
        $texto = $request->query('texto', '');
        $ultimaCita = $model->ultimaCita($texto);
        $datos = $model->buscar($texto);
        return view('laboratorio.orina.editar', compact('ultimaCita', 'primeraVez', 'texto', 'datos'));
    }
    public function edit($id_examenOrina)
    {
        $examenOrina = ExamenOrina::find($id_examenOrina);
        if ($examenOrina == null)
            return abort(404);
        $doctores = Doctor::all();
        return view('laboratorio.orina.edit', ['examenOrina' => $examenOrina, 'doctores' => $doctores]);
    }

    public function delete($id_examenOrina)
    {
        $examenOrina = ExamenOrina::find($id_examenOrina);
        if ($examenOrina == null)
            return abort(404);
        $examenOrina->delete();
        return redirect()->route('examen-orina.editar');
    }

    public function todos()
    {
        return view('laboratorio.orina.eliminar');
    }
}
