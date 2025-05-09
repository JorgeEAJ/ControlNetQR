<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Departamento;

class UsuarioController extends Controller
{
    public function edit($numero_control)
    {
    $usuario = Usuario::findOrFail($numero_control);
    $departamentos = Departamento::all();
    return view('admin.editar_usuario', compact('usuario','departamentos'));
    }

    // Actualizar usuario
    public function update(Request $request, $numero_control)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_control' => 'required|string|unique:usuarios,numero_control,' . $numero_control . ',numero_control',
            'correo' => 'required|email|unique:usuarios,correo,' . $numero_control . ',numero_control',
            'password' => 'nullable|string|min:6',
            'departamento_id' => 'required|exists:departamentos,id',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $usuario = Usuario::findOrFail($numero_control);
        $usuario->nombre = $request->nombre;
        $usuario->numero_control = $request->numero_control;
       $usuario->departamento_id = $request->departamento_id;
        $usuario->correo = $request->correo;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->estado = $request->estado;
        $usuario->save();

        return redirect()->route('panel.admin')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy($numero_control)
    {
        $usuario = Usuario::findOrFail($numero_control);
        $usuario->delete();

        return redirect()->route('panel.admin')->with('success', 'Usuario eliminado correctamente');
    }
}
