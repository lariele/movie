<?php

namespace Lariele\Movie\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Country movies
     *
     * @return MorphToMany
     */
    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'countrisable');
    }
}
