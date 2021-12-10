<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Historial
{
    /**
     * @param {$texto} puede ser la cedula, nombres o apellidos del paciente
     * @return 
     */
    public function obtenerHistorial($texto)
    {
        $bioquimica = DB::table('bioquimica')
            ->join('tipo_examen', 'bioquimica.id_tipo', 'tipo_examen.id')
            ->join('citas', 'bioquimica.id_cita', '=', 'citas.id')
            ->join('pacientes', 'citas.id_paciente', '=', 'pacientes.id')
            ->join('doctores', 'bioquimica.id_doc', '=', 'doctores.id')
            ->select([
                'bioquimica.id',
                DB::raw("CONCAT(pacientes.nombres,' ',pacientes.apellidos) AS paciente"),
                'tipo_examen.nombre AS examen',
                'bioquimica.created_at AS fecha',
                'doctores.nombres AS doctor'
            ])
            ->where('pacientes.cedula', '=', $texto)
            ->orWhere('pacientes.nombres','=',$texto)
            ->orWhere('pacientes.apellidos','=',$texto)
            ->orWhere('pacientes.nombre_completo','=',$texto);

        $coprologia = DB::table('coprologia')
            ->join('tipo_examen', 'coprologia.id_tipo', 'tipo_examen.id')
            ->join('citas', 'coprologia.id_cita', '=', 'citas.id')
            ->join('pacientes', 'citas.id_paciente', '=', 'pacientes.id')
            ->join('doctores', 'coprologia.id_doc', '=', 'doctores.id')
            ->select([
                'coprologia.id',
                DB::raw("CONCAT(pacientes.nombres,' ',pacientes.apellidos) AS paciente"),
                'tipo_examen.nombre AS examen',
                'coprologia.created_at AS fecha',
                'doctores.nombres AS doctor'
            ])
            ->where('pacientes.cedula', '=', $texto)
            ->orWhere('pacientes.nombres','=',$texto)
            ->orWhere('pacientes.apellidos','=',$texto)
            ->orWhere('pacientes.nombre_completo','=',$texto)
            ->union($bioquimica)
            ->paginate(10);
        return $coprologia;
    
    }
}
