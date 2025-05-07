<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EstudianteController extends Controller
{
public function index() {

    $usuario = Auth::user();
    
    // Consulta tus datos desde las tablas relacionadas
    $horas = \App\Models\HorasServicio::where('usuario_id', $usuario->id)->first();
    $asistencias = \App\Models\Asistencia::where('usuario_id', $usuario->id)->orderByDesc('fecha')->limit(10)->get();

    $total_horas = $horas->horas_cumplidas ?? 0;
    $num_asistencias = $asistencias->count();

    $qr = QrCode::size(200)->generate($usuario->numero_control); 


    return view('student.panel_estudiante', [
        'id' => $usuario->id,
        'nombre' => $usuario->nombre,
        'total_horas' => $total_horas,
        'num_asistencias' => $num_asistencias,
        'asistencias' => $asistencias,
        'qr' => $qr
    ]);
}

}
