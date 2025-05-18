<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function editarPerfil()
{
    $usuario = auth()->user();
    $departamentos = \App\Models\Departamento::all();

    return view('admin.perfil', compact('usuario', 'departamentos'));
}

public function actualizarPerfil(Request $request)
{
    $usuario = auth()->user();

    $request->validate([
        'nombre' => 'required|string|max:255',
        'numero_control' => 'required|string|max:20|unique:usuarios,numero_control,' . $usuario->numero_control. ',numero_control',
        'correo' => 'required|email|unique:usuarios,correo,' . $usuario->numero_control. ',numero_control',
        'password' => 'nullable|string|min:6',
        'departamento_id' => 'required|exists:departamentos,id',
    ]);

    $usuario->nombre = $request->nombre;
    $usuario->numero_control = $request->numero_control;
    $usuario->correo = $request->correo;
    $usuario->departamento_id = $request->departamento_id;
    
    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
    }

    $usuario->save();

    return redirect()->route('panel.admin')->with('success', 'Perfil actualizado correctamente.');
}
}