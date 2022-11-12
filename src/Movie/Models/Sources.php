<?php

namespace App\SFD\Movie\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Sources extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'movie_id';

    protected $table = 'movies_sources';

    protected $fillable = [
        'source_id',
        'source_name',
        'source_type',
    ];

    public function movie(): HasOne
    {
        return $this->belongsTo(Movie::class);
    }

    public function getLinkAttribute(): string
    {
        $link = null;

        if ($this->source_type === 'csfd') {
            $link = 'https://www.csfd.cz/film/' . $this->source_id;
        } else if ($this->source_type === 'imdb') {
            $link = 'https://www.imdb.com/title/' . $this->source_id;
        } else if ($this->source_type === 'netflix') {
            $link = 'https://www.netflix.com/title/' . $this->source_id;
        } else if ($this->source_type === 'hbogo') {
            $link = 'https://www.hbogo.cz/filmy/' . $this->source_id;
        }

        return $link ?? $this->source_id;
    }
}
