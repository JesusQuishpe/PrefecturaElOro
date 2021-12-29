<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table='pacientes';
    protected $fillable=[
        'fecha',
        'cedula',
        'apellidos',
        'nombres',
        'nombre_completo',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'domicilio',
        'provincia',
        'ciudad'
    ];

    /**
     * Busca todos los pacientes que coincidan con 
     * el apellido o la cedula
     * @param string $texto cedula o apellido del paciente
     */
    public function buscar($texto)
    {
        if($texto===""){
            return Paciente::all();
        }else{
            return Paciente::where('cedula', '=', $texto)
            ->orWhere('apellidos', 'LIKE', '%' . $texto . '%')
            ->get();
        }
    }
}
