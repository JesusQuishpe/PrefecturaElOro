<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enfermeria extends Model
{
    use HasFactory;
    protected $table='enfermeria';
    protected $fillable=[
        'id_cita',
        'peso',
        'estatura',
        'temperatura',
        'presion',
        'enfermeria',
        'medico',
        'terapia',
        'discapacidad',
        'inyeccion',
        'curacion',
        'embarazo',
        'cardiopatia',
        'diabetes',
        'hipertension',
        'cirugias',
        'alergias_medicina',
        'alergias_comida',
        'consultorio',
        'atendido'
    ];

    public function enEspera()
    {
        return DB::table('enfermeria')
            ->join('citas', 'enfermeria.id_cita', 'citas.id')
            ->join('pacientes', 'citas.id_paciente', 'pacientes.id')
            ->select(
                [
                    'enfermeria.id as id_enfermeria',
                    'citas.id as id_cita',
                    'pacientes.nombre_completo',
                    'pacientes.fecha_nacimiento',
                    'pacientes.sexo',
                    'citas.area'
                ]
            )
            ->where('citas.area', '!=', 'Laboratorio')
            ->where('citas.estadisticas', '!=', 'o')
            ->where('enfermeria.atendido', '=', 0)
            ->paginate(10);
    }
}
