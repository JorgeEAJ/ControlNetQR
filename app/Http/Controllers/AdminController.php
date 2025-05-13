<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Asistencia;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function admin()
    {
        $usuario = Auth::user();
        if ($usuario->rol->nombre !== 'admin') {
            return redirect()->route('login');
        }
        $departamento = $usuario->departamento_id;

        // Total de estudiantes
        $totalEstudiantes = Usuario::where('rol_id', 2)
                           ->where('estado', 'activo')
                           ->where('departamento_id', $departamento)
                           ->count();

        // Historial del admin
        $asistencias = Asistencia::where('numero_control', $usuario->numero_control)
            ->orderByDesc('fecha')
            ->limit(10)
            ->get();

        $num_asistencias = $asistencias->count();
        
        // Asistencias de hoy
        $asistenciasHoy = Asistencia::whereDate('fecha', now())
        ->whereIn('numero_control', Usuario::where('estado', 'activo')
            ->where('departamento_id', $departamento)
            ->pluck('numero_control'))
        ->count();

        // Listado de estudiantes con sus horas y último registro
        $listadoEstudiantes = DB::table('usuarios as u')
        ->leftJoin('asistencias as a', 'u.numero_control', '=', 'a.numero_control')
        ->select(
        'u.numero_control',
        'u.nombre',
        DB::raw('ROUND(SUM(TIMESTAMPDIFF(MINUTE, a.hora_entrada, a.hora_salida))/60, 2) as horas_cumplidas'),
        DB::raw('MAX(a.fecha) as ultimo_registro'),
        'u.estado'
        )
        ->where('u.rol_id', 2)
        ->where('departamento_id', $departamento)
        ->groupBy('u.numero_control', 'u.nombre', 'u.estado')
        ->get();


        return view('admin.panel', compact(
            'totalEstudiantes',
            'asistenciasHoy',
            'asistencias',
            'num_asistencias',
            'listadoEstudiantes'
        ));
    }
}