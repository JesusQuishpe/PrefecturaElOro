<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Enfermeria;
use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buscar(Request $request)
    {
        if ($request->has('texto')) {
            try {
                $paciente = Paciente::where('cedula', '=', $request->input('texto'))->firstOrFail();
                $res = [
                    'err' => false,
                    'result' => $paciente
                ];
                return response()->json($res);
            } catch (\Throwable $th) {
                $res = [
                    'err' => true,
                    'result' => null
                ];
                return response()->json($res);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        if (
            $request->has('fecha') &&
            $request->has('cedula') &&
            $request->has('apellidos') &&
            $request->has('nombres') &&
            $request->has('fecha_nacimiento') &&
            $request->has('sexo') &&
            $request->has('telefono') &&
            $request->has('domicilio') &&
            $request->has('provincia') &&
            $request->has('ciudad')
        ) {

            try {
                DB::beginTransaction();
                $paraEnfermeria = ['Medicina', 'Odontologia'];

                $pac = Paciente::where('cedula', '=', $request->cedula)->firstOrFail();
                $fecha = Carbon::now()->format('Y-m-d');
                $hora = Carbon::now()->format('H:i:s');



                if (!$pac) { //Si no está registrado
                    $pac = Paciente::create($request->only(
                        [
                            'fecha', 'cedula', 'apellidos', 'nombres', 'nombre_completo',
                            'fecha_nacimiento', 'sexo', 'telefono', 'domicilio', 'provincia',
                            'ciudad'
                        ]
                    ));
                    $pac->save();
                }

                $cita = Cita::create([
                    'fecha_cita' => $fecha,
                    'hora_cita' => $hora,
                    'cedula_cita' => $request->cedula,
                    'area' => $request->area,
                    'valor' => $request->valor,
                    'factura_cita' => null,
                    'estado_cita' => '',
                    'id_paciente' => $pac->id,
                    'estadisticas' => ''
                ]);

                $cita->save();

                if (in_array($request->input('area'), $paraEnfermeria)) {
                    $enfermeria = new Enfermeria();
                    $enfermeria->id_cita = $cita->id;
                    $enfermeria->save();
                }

                DB::commit();
                return response()->json(['res' => true]);
            } catch (\Throwable $th) {
                try {
                    DB::rollBack();
                } catch (\Throwable $th) {
                    throw $th;
                }
                throw $th;
            }
        }
    }
    public function pacientes(Request $request)
    {

        if ($request->has('opcion')) {
            try {
                $opcion = $request->input('opcion');

                $model = new Paciente();
                $pacientes = $model->buscar($opcion);
                $res = [
                    'err' => false,
                    'result' => $pacientes
                ];
                return response()->json($res);
            } catch (\Throwable $th) {
                $res = [
                    'err' => true,
                    'result' => null,
                    'errorMessage'=>$th->getMessage()
                ];
                return response()->json($res);
            }
        } else {

            return response('No existe el parametro \"opción\" en la petición',400);
        }
    }
}
