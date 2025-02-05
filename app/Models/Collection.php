<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];
     // Relación con el usuario
     public function user(): BelongsTo
     {
         return $this->belongsTo(
             User::class
         );
     }

     // Relación con las cartas (tabla pivote)
    /*public function cartas(): BelongsToMany
    {
        return $this->belongsToMany(
            Carta::class,
            'collection_card')
            ->withPivot('quantity')
            ->withTimestamps();
    }*/
    public function cards(): BelongsToMany
    {
    return $this->belongsToMany(
        Card::class,
        'collection_card')
        ->withPivot('quantity')
        ->withTimestamps();
    }
}
