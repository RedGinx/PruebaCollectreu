<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    // La tabla asociada con el modelo
    protected $table = 'cards';

    // Los campos que se pueden asignar masivamente (Mass Assignment)
    protected $fillable = [
        'name',
        'expansion',
        'expansion_alt',
        'number',
        'avg_price',
        'rarity',
    ];

    // Si tienes una columna 'id' personalizada, puedes especificar:
    // protected $primaryKey = 'your_primary_key';
}
