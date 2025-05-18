<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('faltas', function (Blueprint $table) {
        $table->id();
        $table->string('numero_control'); // o 'usuario_id' si prefieres ID
        $table->date('fecha');
        $table->boolean('notificado')->default(false);
        $table->timestamps();

        $table->foreign('numero_control')->references('numero_control')->on('usuarios')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faltas');
    }
};
