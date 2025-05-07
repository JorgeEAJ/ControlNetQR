<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'fecha',
        'hora_entrada',
        'hora_salida',
    ];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

