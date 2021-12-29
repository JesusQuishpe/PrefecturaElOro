<?php

namespace App\Http\Controllers;

use App\Models\Enfermeria;
use App\Models\EnfermeriaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnfermeriaController extends Controller
{

    public function index()
    {
        return view('enfermeria.index');
    }

    public function save(Request $request)
    {
        try {
            //DB::beginTransaction();

            $id_enfermeria = $request->input('id_enfermeria');
            $model = Enfermeria::where('id', '=', $id_enfermeria)
                ->update($request->only([
                    'peso',
                    'estatura',
                    'temperatura',
                    'presion',
                    'discapacidad',
                    'embarazo',
                    'inyeccion',
                    'curacion',
                    'medico',
                    'enfermera',
                    'atendido'
                ]));

            return response()->json([
                'error' => false,
                'data' => $model
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 404);
        }
        /*if ($request->isJson()) {
            dd($request);
            

            DB::beginTransaction();
            try {
                $data = [
                    'ide' => $request->input('ide'),
                    'peso' => $request->input('peso'),
                    'estatura' => $request->input('estatura'),
                    'temperatura' => $request->input('temperatura'),
                    'presion' => $request->input('presion'),
                    'discapacidad' => $request->input('discapacidad'),
                    'embarazo' => $request->input('embarazo'),
                    'inyeccion' => $request->input('inyeccion'),
                    'curacion' => $request->input('curacion'),
                    'medico' => $request->input('medico'),
                    'enfermera' => $request->input('enfermera'),
                    'atendido' => true
                ];
                $model = new EnfermeriaModel();
                $model->from($data);
                $model->terminarAtencion();
                //Agregamos en la tabla odontologia la cita
                if($request->input('areaaCita')==='Odontologia'){
                    DB::insert('insert into odontologia (id_enf) values (?)', [$request->input('ide')]);
                }
                DB::commit();
                return response()->json(['res' => true]);
            } catch (\Throwable $th) {
                try {
                    DB::rollBack();
                } catch (\Throwable $roll) {
                    return response()->json(['res' => false,'error'=>$roll->getMessage()]);
                }
                return response()->json(['res' => false,'error'=>$th->getMessage()]);
            }
        }*/
    }

    public function pacientes()
    {
        $model = new Enfermeria();
        $datos = $model->enEspera();
        return response()->json($datos);
    }

    public function delete($id)
    {
        try {
            $model = Enfermeria::find($id);
            $model->delete();
            return response()->json([
                'error' => false,
                'data' => $model
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 404);
        }
    }
}
