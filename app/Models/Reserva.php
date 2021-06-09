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
        'user_id' => 'integer',
        'viaje_id' => 'integer',
        'estado' => 'boolean',
    ];


    public function usuarios()
    {
        return $this->hasMany(\App\Models\Usuario::class);
    }


    public function viajes()
    {
        return $this->hasMany(\App\Models\Viaje::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function viaje()
    {
        return $this->belongsTo(\App\Models\Viaje::class);
    }

    /* public function scopeAllReservas($query){
        
    } */

}
