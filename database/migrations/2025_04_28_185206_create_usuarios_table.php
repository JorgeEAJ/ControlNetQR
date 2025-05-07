<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('numero_control', 100)->unique();
            $table->string('correo', 100)->unique();
            $table->string('password');
            $table->enum('rol', ['estudiante', 'admin']);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamp('creado_en')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
