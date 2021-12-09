<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermeriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermeria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cita');
            $table->foreign('id_cita')->references('id')->on('citas');
            $table->decimal('peso',10,2);
            $table->decimal('estatura',10,2);
            $table->decimal('temperatura',10,2);
            $table->string('presion',15);
            $table->char('enfermeria',1);
            $table->string('medico',50);
            $table->string('terapia',30);
            $table->decimal('discapacidad',10,2);
            $table->string('inyeccion',15);
            $table->string('curacion',15);
            $table->decimal('embarazo',10,2);
            $table->string('enfermera',50);
            $table->string('cardiopatia',50);
            $table->string('diabetes',50);
            $table->string('hipertension',50);
            $table->string('cirugias',50);
            $table->string('alergias_medicina',50);
            $table->string('alergias_comida',50);
            $table->char('consultorio',1);
            $table->boolean('atendido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermeria');
    }
}
