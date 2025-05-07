<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorasServicioTable extends Migration
{
    public function up()
    {
        Schema::create('horas_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->integer('total_horas')->default(120)->nullable();
            $table->integer('horas_cumplidas')->default(0)->nullable();
            $table->timestamp('actualizado_en')->useCurrent();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('horas_servicio');
    }
}
