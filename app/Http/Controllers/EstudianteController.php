<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;


class EstudianteController extends Controller
{

public function index() {
    $usuario = Auth::user();

    $asistencias = \App\Models\Asistencia::where('numero_control', $usuario->numero_control)->orderByDesc('fecha')->get();

    // Calcular total de horas a partir de las asistencias
$total_horas = 0;
foreach ($asistencias as $asistencia) {
    if ($asistencia->hora_entrada && $asistencia->hora_salida) {
        $entrada = Carbon::parse($asistencia->fecha . ' ' . $asistencia->hora_entrada);
        $salida = Carbon::parse($asistencia->fecha . ' ' . $asistencia->hora_salida);

         $diferencia = $salida->diffInMinutes($entrada,true) / 60;

        if ($salida->greaterThan($entrada)) {
            $total_horas += $diferencia;// convertir a horas
        }
    }
}
$total_horas = round($total_horas, 2);
    $num_asistencias = $asistencias->count();

     $qr = QrCode::format('svg') // Puedes cambiar a 'png' si prefieres imagen
                ->size(250)      // Puedes aumentar el tamaño si lo quieres más grande
                ->generate($usuario->numero_control);
    

    return view('student.panel_estudiante', [
        'numero_control' => $usuario->numero_control,
        'nombre' => $usuario->nombre,
        'total_horas' => $total_horas,
        'num_asistencias' => $num_asistencias,
        'asistencias' => $asistencias,
        'qr' => $qr
    ]);
}
}
