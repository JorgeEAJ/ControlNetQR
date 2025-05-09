<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('numero_control', 100)->primary();
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('password');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('departamento_id');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamp('creado_en')->useCurrent();

            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
