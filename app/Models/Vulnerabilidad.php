<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vulnerabilidad extends Model
{
    protected $table = 'vulnerabilidades';
    protected $fillable = [
        'nombre',
        'slug',
        'imagen',
        'extracto',
        'descripcion',
        'solucion',
        'severidad',
        'visible',
    ];
    protected static function booted()
    {
        static::creating(function ($vuln) {
            if (empty($vuln->slug)) {
                $vuln->slug = Str::slug($vuln->nombre);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
