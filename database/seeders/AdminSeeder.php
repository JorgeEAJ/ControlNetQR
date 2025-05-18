<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        if (Usuario::where('rol_id', 1)->count() === 0) {
            Usuario::create([
                'nombre' => 'Administrador',
                'numero_control' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), // ¡Cambia esta contraseña en producción!
                'rol_id' => 1, // Asegúrate que el rol 1 sea admin
                'estado' => 'activo',
                'departamento_id' => 1 // Puedes ajustarlo si ya hay departamentos
            ]);
        }
    }
}
