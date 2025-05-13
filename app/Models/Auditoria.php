<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditorias';
    protected $fillable = [
        'cliente_id',
        'empresa',
        'email',
        'url',
        'estado',
        'resultado',
    ];
}
