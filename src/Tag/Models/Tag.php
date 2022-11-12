<?php

namespace Lariele\Tag\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Lariele\Movie\Models\Movie;

class Tag extends Model
{
    /**
     * Tag movies
     *
     * @return MorphToMany
     */
    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'taggable');
    }
}
