<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'boolean',
        'viaje_id' => 'integer',
        'usuario_id' => 'integer',
        'asiento_id' => 'integer',
    ];


    public function viaje()
    {
        return $this->belongsTo(\App\Models\Viaje::class);
    }

    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }

    public function asiento()
    {
        return $this->belongsTo(\App\Models\Asiento::class);
    }
}
