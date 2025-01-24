<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carta2 extends Model
{
    use HasFactory;
    protected $table = 'cartas2'; // Nombre correcto de la tabla en la base de datos
    protected $fillable = [
        'name',
        'expansion',
        'expansion_alt',
        'number',
        'avg_price',
        'rarity',
    ];
}
