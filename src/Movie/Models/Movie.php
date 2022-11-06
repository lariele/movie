<?php

namespace Lariele\Movie\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\MovieFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'categories',
    ];

    protected $casts = [
        'genres' => 'collection',
        'actors' => 'collection',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return MovieFactory::new();
    }
}
