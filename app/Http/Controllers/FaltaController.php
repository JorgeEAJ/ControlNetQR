<?php

namespace App\Http\Controllers;

use App\Models\Falta;

class FaltaController extends Controller
{

public function index()
{
    $faltas = Falta::join('usuarios', 'faltas.numero_control', '=', 'usuarios.numero_control')
        ->select('faltas.*', 'usuarios.nombre')
        ->orderBy('fecha', 'desc')
        ->get();
    return view('admin.faltas', compact('faltas'));
}

public function destroy($id)
{
    Falta::findOrFail($id)->delete();
    return back()->with('success', 'Falta eliminada');
}

}
