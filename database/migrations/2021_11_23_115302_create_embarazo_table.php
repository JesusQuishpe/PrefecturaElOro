<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbarazoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarazo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_cita");
            $table->foreign("id_cita")->references("id")->on("citas");
            $table->unsignedBigInteger("id_doc");
            $table->foreign("id_doc")->references("id")->on("doctores");
            $table->unsignedBigInteger("id_tipo");
            $table->foreign("id_tipo")->references("id")->on("tipo_examen");
            $table->string("resultado",100);
            $table->string("observaciones",200);
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
        Schema::dropIfExists('embarazo');
    }
}
