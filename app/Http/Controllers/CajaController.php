<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        if ($request->has('cedula')) {
            try {
                $paciente = Paciente::where('cedula', '=', $request->input('cedula'))->firstOrFail();
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
                $pac = Paciente::where('cedula', '=', $request->cedula)->firstOrFail();
                $fecha = Carbon::now()->format('Y-m-d');
                $hora = Carbon::now()->format('H:i:s');
                if (!$pac) {
                    $paciente = new Paciente();
                    $paciente->fecha = $request->fecha;
                    $paciente->cedula = $request->cedula;
                    $paciente->apellidos = $request->apellidos;
                    $paciente->nombres = $request->nombres;
                    $paciente->fecha_nacimiento = $request->fecha_nacimiento;
                    $paciente->sexo = $request->sexo;
                    $paciente->telefono = $request->telefono;
                    $paciente->domicilio = $request->domicilio;
                    $paciente->provincia = $request->provincia;
                    $paciente->ciudad = $request->ciudad;
                    $paciente->save();

                    $cita = Cita::create([
                        'fecha_cita' => $fecha,
                        'hora_cita' => $hora,
                        'cedula_cita' => $request->cedula,
                        'area' => $request->area,
                        'valor' => $request->valor,
                        'factura_cita' => null,
                        'estado_cita' => '',
                        'id_paciente' => $paciente->id,
                        'estadisticas' => ''
                    ]);
                    $cita->save();
                } else {
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
                }


                //Agregar cita
                return response()->json(['res' => true]);
            } catch (\Throwable $th) {
                return response()->json(['res' => false, 'error' => $th->getMessage().$hora]);
            }
        }
    }
    public function pacientes(Request $request)
    {

        if ($request->has('opcion')) {
            $opcion = $request->input('opcion');

            $pacientes = Paciente::where('cedula', '=', $opcion)->orWhere('apellidos', 'LIKE', '%' . $opcion . '%')->get();
            if ($pacientes) {
                $res = [
                    'err' => false,
                    'result' => $pacientes
                ];
                return response()->json($res);
            } else {
                $res = [
                    'err' => true,
                    'result' => null
                ];
                return response()->json($res);
            }
        } else {
            error_log("NO  EXISTE POST opcion linea 87 caja.php");
        }
    }
}
