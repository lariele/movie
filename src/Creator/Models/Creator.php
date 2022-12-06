<?php

namespace Lariele\Creator\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Lariele\Creator\Models\Creators\Actress;
use Lariele\Creator\Models\Creators\Producer;
use Lariele\Movie\Models\Movie;

class Creator extends Model
{
    protected $table = 'creators';

    protected $fillable = [
        'name'
    ];

    /**
     * Tag movies
     *
     * @return MorphToMany
     */
    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'creatable', 'creatables', 'creator_id', 'creatable_id');
    }

    public function actress()
    {
        return Actress::find($this->id);
    }

    public function producer()
    {
        return Producer::find($this->id);
    }
}
