<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
    $table->id();
    $table->string('numero_control', 100); // Clave foránea basada en texto
    $table->date('fecha');
    $table->time('hora_entrada')->nullable();
    $table->time('hora_salida')->nullable();

    $table->foreign('numero_control')
          ->references('numero_control')
          ->on('usuarios')
          ->onDelete('cascade');
});
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
