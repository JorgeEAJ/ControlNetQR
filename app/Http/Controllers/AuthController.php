<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

            if ($usuario->rol === 'admin') {
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
    return view('auth.signup');
}

public function signup(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'numero_control' => 'required|string|unique:usuarios',
        'correo' => 'required|email|unique:usuarios',
        'password' => 'required|string|min:6',
        'rol' => 'required|in:estudiante,admin',
    ]);

    $usuario = Usuario::create([
        'nombre' => $request->nombre,
        'numero_control' => $request->numero_control,
        'correo' => $request->correo,
        'password' => Hash::make($request->password),
        'rol' => $request->rol,
        'estado' => 'activo',
        'creado_en' => now(),
    ]);

    Auth::login($usuario);

    return redirect()->route('panel.admin');
}

}
