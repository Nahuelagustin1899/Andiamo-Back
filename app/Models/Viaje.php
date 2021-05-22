<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $with = ['empresa', 'salida', 'destino'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empresa_id' => 'integer',
        'salida_id' => 'integer',
        'destino_id' => 'integer',
        'fecha_salida' => 'timestamp',
        'fecha_llegada' => 'timestamp',
        'precio' => 'decimal:2',
    ];


    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    public function salida()
    {
        return $this->belongsTo(\App\Models\Estacion::class);
    }

    public function destino()
    {
        return $this->belongsTo(\App\Models\Estacion::class);
    }
}
