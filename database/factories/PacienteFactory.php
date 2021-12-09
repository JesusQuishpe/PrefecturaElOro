<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model=Paciente::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha'=>$this->faker->date(),
            'cedula'=>$this->faker->isbn10(),
            'apellidos'=>$this->faker->lastName(),
            'nombres'=>$this->faker->name(),
            'fecha_nacimiento'=>$this->faker->date(),
            'sexo'=>$this->faker->randomElement(['Masculino','Femenino']),
            'telefono'=>$this->faker->phoneNumber(),
            'domicilio'=>$this->faker->address(),
            'provincia'=>$this->faker->randomElement(['El Oro','Pichincha','Guayas','Manabí']),
            'ciudad'=>$this->faker->randomElement(['Machala','Guayaquil','Quito','Cuenca','Esmeraldas']),
            'historial'=>$this->faker->randomLetter(),
            'fecha_historial'=>$this->faker->date(),
            'estadisticas'=>$this->faker->randomLetter()
        ];
    }
}
