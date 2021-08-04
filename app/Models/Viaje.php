<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTimeInterface;

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
        'precio' => 'decimal:2',
    ];

    protected $dates = [
        'fecha_salida',
        'fecha_llegada'
    ];


    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function salida()
    {
        return $this->belongsTo(Estacion::class);
    }

    public function destino()
    {
        return $this->belongsTo(Estacion::class);
    }
    
}
