<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Rol;
use App\Models\Departamento;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'numero_control' => 'required',
            'password' => 'required',
        ]);

        // Buscar al usuario
        $usuario = Usuario::where('numero_control', $request->numero_control)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            // Guardar en sesión
            Auth::login($usuario); 

            if ($usuario->rol_id === 1) {
                return redirect()->route('panel.admin');
            } else {
                return redirect()->route('panel.estudiante');
            }
        } else {
            return back()->withErrors([
                'numero_control' => 'Número de control o contraseña incorrectos',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
    public function showSignupForm()
{
    $roles = Rol::all();
    $departamentos = Departamento::all();
    return view('auth.signup', compact('roles', 'departamentos'));
}

public function signup(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'numero_control' => 'required|string|unique:usuarios',
        'correo' => 'required|email|unique:usuarios',
        'password' => 'required|string|min:6',
        'rol_id' => 'required|exists:roles,id',
        'departamento_id' => 'required|exists:departamentos,id',
    ]);

    $rol = Rol::where('nombre', $request->rol_id)->first();

    $usuario = Usuario::create([
        'nombre' => $request->nombre,
        'numero_control' => $request->numero_control,
        'correo' => $request->correo,
        'password' => Hash::make($request->password),
        'rol_id' => $request->rol_id,
        'departamento_id' => $request->departamento_id,
        'estado' => 'activo',
        'creado_en' => now(),
    ]);

    Auth::login($usuario);

    return redirect()->route('panel.admin');
}

}
