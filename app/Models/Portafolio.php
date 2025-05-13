<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'imagen',
        'descripcion',
        'tipo',
        'demo_url',
        'categoria_id',
    ];

    public function categoria(){

        return $this->belongsTo(CategoriaServicio::class);
    }
}
