<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.editar_usuario', compact('usuario'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_control' => 'required|string|unique:usuarios',
            'correo' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:6',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->numero_control = $request->numero_control;
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->estado = $request->estado;
        $usuario->save();

        return redirect()->route('panel.admin')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('panel.admin')->with('success', 'Usuario eliminado correctamente');
    }
}
