<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'numero_control';
    public $incrementing = false;  
    protected $keyType = 'string';
    protected $fillable = [
        'numero_control',
        'nombre',
        'correo',
        'password',
        'rol_id',
        'estado',
        'departamento_id',
        'creado_en',
    ];
    public $timestamps = false;
    protected $hidden = [
        'password',
    ];
public function rol() {
    return $this->belongsTo(Rol::class, 'rol_id');
}

public function departamento() {
    return $this->belongsTo(Departamento::class, 'departamento_id');
}


}
