<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'categoria_servicio_id',
        'nombre',
        'slug',
        'descripcion_corta',
        'descripcion_larga',
        'icono',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaServicio::class, 'categoria_servicio_id');
    }
    public function valoraciones()
    {
        return $this->belongsToMany(Valoracion::class, 'servicio_valoracion');
    }

}
