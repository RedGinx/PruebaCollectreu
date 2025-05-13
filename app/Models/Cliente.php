<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auditoria;
class Cliente extends Model
{
    protected $fillable = [
        'nombre_empresa',
        'email',
        'persona_contacto',
        'telefono',
        'web',
    ];

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class);
    }
}
