<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario;
use App\Models\Asistencia;
use App\Models\Falta;
use Carbon\Carbon;

class RegistrarFaltas extends Command
{
    protected $signature = 'faltas:registrar';
    protected $description = 'Registra automáticamente faltas por inasistencia de estudiantes activos';

    public function handle()
    {
        $fecha = Carbon::today();

        $estudiantes = Usuario::where('rol_id', 2)
            ->where('estado', 'activo')
            ->get();

        foreach ($estudiantes as $estudiante) {
            $asistencia = Asistencia::where('numero_control', $estudiante->numero_control)
                ->whereDate('fecha', $fecha)
                ->exists();

            if (!$asistencia) {
                Falta::firstOrCreate([
                    'numero_control' => $estudiante->numero_control,
                    'fecha' => $fecha,
                ]);
            }
        }

        $this->info('Faltas registradas correctamente.');
    }
}

