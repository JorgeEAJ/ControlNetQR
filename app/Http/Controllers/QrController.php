<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Usuario;
use Illuminate\Support\Carbon;

class QrController extends Controller
{
    public function procesarQr(Request $request)
    {
        $numeroControl = $request->input('qr_code');

        $usuario = Usuario::where('numero_control', $numeroControl)->first();

        if (!$usuario) {
            return redirect()->route('panel.admin')->with('error', 'QR inválido');
        }

        $hoy = Carbon::now()->toDateString();

        $asistencia = Asistencia::where('numero_control', $numeroControl)
            ->where('fecha', $hoy)
            ->first();

        if (!$asistencia) {
            Asistencia::create([
                'numero_control' => $numeroControl,
                'fecha' => $hoy,
                'hora_entrada' => Carbon::now(),
                'hora_salida' => null, 
            ]);

            return redirect()->route('panel.admin')->with('success', 'Hora de entrada registrada correctamente');
        } elseif ($asistencia->hora_salida == null) {
            $entrada = Carbon::parse($asistencia->hora_entrada);
            $salida = Carbon::now();

            $asistencia->update(['hora_salida' => $salida]);

            return redirect()->route('panel.admin')->with('success', 'Hora de salida registrada correctamente');
        }

        return redirect()->route('panel.admin')->with('info', 'Ya registraste tu entrada y salida el día de hoy');
    }
}
