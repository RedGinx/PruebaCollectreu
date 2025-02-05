<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [
        'key',
        'name',
        'expansion',
        'expansion_alt',
        'number',
        'avg_price',
        'rarity',
    ];
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(
            Collection::class,
            'collection_card')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
