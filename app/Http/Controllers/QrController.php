<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\HorasServicio;
use \App\Models\Usuario;
use Illuminate\Support\Carbon;

class QrController extends Controller
{
    
    public function procesarQr(Request $request)
    {
        \Log::info('QR recibido:', $request->all());
        $numeroControl = $request->input('qr_code');

        $usuario = Usuario::where('numero_control', $numeroControl)->first();

        if (!$usuario) {
            return response()->json(['error' => 'QR inválido'], 404);
        }

        $usuarioId = $usuario->id;
        $hoy = Carbon::now()->toDateString();

        $asistencia = Asistencia::where('usuario_id', $usuarioId)
            ->where('fecha', $hoy)
            ->first();

        if (!$asistencia) {
            Asistencia::create([
                'usuario_id' => $usuarioId,
                'fecha' => $hoy,
                'hora_entrada' => Carbon::now(),
                'hora_salida' => null, 
            ]);

            return response()->json(['mensaje' => 'Entrada registrada']);
        } elseif ($asistencia->hora_salida == null) {
            $entrada = Carbon::parse($asistencia->hora_entrada);
            $salida = Carbon::now();
            $horas = $entrada->diffInMinutes($salida) / 60;

            $asistencia->update(['hora_salida' => $salida]);

            $horasServicio = HorasServicio::firstOrCreate(['usuario_id' => $usuarioId]);
            $horasServicio->horas_cumplidas += $horas;
            $horasServicio->actualizado_en = now();
            $horasServicio->save();

            return response()->json(['mensaje' => 'Salida registrada. ' . round($horas, 2) . ' horas sumadas.']);
        }

        return response()->json(['mensaje' => 'Ya registraste entrada y salida hoy.']);
    }

}
