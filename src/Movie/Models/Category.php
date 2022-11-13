<?php

namespace Lariele\Movie\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    /**
     * Category movies
     *
     * @return MorphToMany
     */
    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'categorisable');
    }
}
