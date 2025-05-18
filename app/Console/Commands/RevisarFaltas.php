<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario;
use App\Models\Falta;
use App\Mail\AdvertenciaFaltasMail;
use Illuminate\Support\Facades\Mail;

class RevisarFaltas extends Command
{
    protected $signature = 'faltas:revisar'; // Esto defines cómo lo correrás
    protected $description = 'Revisa si hay estudiantes con 3 faltas y les envía un correo';

    public function handle()
{
    $this->info("Revisando estudiantes con 3 faltas...");

    $estudiantes = Usuario::where('rol_id', 2)->where('estado', 'activo')->get();

    foreach ($estudiantes as $estudiante) {
        $faltas = Falta::where('numero_control', $estudiante->numero_control)->count();

        if ($faltas >= 3) {
            // Verifica si ya fue notificado
            $yaNotificado = Falta::where('numero_control', $estudiante->numero_control)
                ->where('notificado', true)
                ->exists();

            if (!$yaNotificado) {
                // Enviar correo
                Mail::to($estudiante->correo)->send(new AdvertenciaFaltasMail($estudiante->nombre));
                // Marcar faltas como notificadas
                Falta::where('numero_control', $estudiante->numero_control)
                    ->update(['notificado' => true]);

                $this->info("Correo enviado a {$estudiante->correo}");
            }
        }
    }

    $this->info("Proceso finalizado.");
}
}
