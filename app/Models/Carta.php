<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $table = 'cartas';

    protected $fillable = [
        'key',
        'name',
        'expansion',
        'expansion_alt',
        'number',
        'avg_price',
        'rarity',
    ];
}
