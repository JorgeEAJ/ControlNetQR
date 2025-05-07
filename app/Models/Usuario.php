<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuarios'; 
    protected $fillable = [
        'nombre',
        'numero_control',
        'correo',
        'password',
        'rol',
        'estado',
        'creado_en',
    ];
    public $timestamps = false;
    protected $hidden = [
        'password',
    ];
}
