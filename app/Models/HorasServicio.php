<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorasServicio extends Model
{
    use HasFactory;
    protected $table = 'horas_servicio';

    protected $fillable = [
        'usuario_id',
        'total_horas',
        'horas_cumplidas',
        'actualizado_en',

    ];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

