<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $fillable = ['numero_control', 'fecha', 'notificado'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'numero_control', 'numero_control');
    }
}
