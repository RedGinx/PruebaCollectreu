<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $fillable = [
        'cliente_id',
        'servicio_id',
        'contenido',
        'valoracion',
        'visible',
        'fecha',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicio_valoracion');
    }


}
