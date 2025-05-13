<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $fillable = ['servicio_id', 'titulo', 'contenido'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
