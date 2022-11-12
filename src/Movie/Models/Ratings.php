<?php

namespace App\SFD\Movie\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Ratings extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'movie_id';
    protected $table = 'movies_ratings';

    protected $fillable = [
        'csfd',
        'imdb',
        'meta'
    ];

    public function movie(): HasOne
    {
        return $this->belongsTo(Movie::class);
    }
}
