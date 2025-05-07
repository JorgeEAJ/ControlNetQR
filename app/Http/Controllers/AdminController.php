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
        if ($usuario->rol !== 'admin') {
            return redirect()->route('login');
        }

        // Total de estudiantes
        $totalEstudiantes = Usuario::where('rol', 'estudiante')->count();

        // Historial del admin
        $asistencias = Asistencia::where('usuario_id', $usuario->id)
            ->orderByDesc('fecha')
            ->limit(10)
            ->get();

        $num_asistencias = $asistencias->count();
        $total_horas = $asistencias->reduce(function ($carry, $asis) {
            if ($asis->hora_entrada && $asis->hora_salida) {
                $entrada = strtotime($asis->hora_entrada);
                $salida = strtotime($asis->hora_salida);
                return $carry + (($salida - $entrada) / 3600);
            }
            return $carry;
        }, 0);

        // Asistencias de hoy
        $asistenciasHoy = Asistencia::whereDate('fecha', now())->count();

        // Listado de estudiantes con sus horas y último registro
        $listadoEstudiantes = DB::table('usuarios as u')
            ->leftJoin('horas_servicio as hs', 'u.id', '=', 'hs.usuario_id')
            ->leftJoin('asistencias as a', 'u.id', '=', 'a.usuario_id')
            ->select('u.id','u.nombre', 'hs.horas_cumplidas', DB::raw('MAX(a.fecha) as ultimo_registro'), 'u.estado')
            ->where('u.rol', 'estudiante')
            ->groupBy('u.id', 'u.nombre', 'hs.horas_cumplidas', 'u.estado')
            ->get();

        return view('admin.panel', compact(
            'totalEstudiantes',
            'asistenciasHoy',
            'asistencias',
            'num_asistencias',
            'total_horas',
            'listadoEstudiantes'
        ));
    }
}