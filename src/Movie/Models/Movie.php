<?php

namespace Lariele\Movie\Models;

use Database\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Lariele\Creator\Models\Creators\Actress;
use Lariele\Creator\Models\Creators\Director;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'genres',
        'actors',
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

    /**
     * Movie Data
     *
     * @return HasOne
     */
    public function data(): HasOne
    {
        return $this->hasOne(Data::class);
    }

    /**
     * Movie actress
     *
     * @return MorphToMany
     */
    public function actress(): MorphToMany
    {
        return $this->morphedByMany(Actress::class, 'creatable', 'creatables', 'creatable_id', 'creator_id');
    }

    /**
     * Movie directors
     *
     * @return MorphToMany
     */
    public function directors(): MorphToMany
    {
        return $this->morphedByMany(Director::class, 'creatable', 'creatables', 'creatable_id', 'creator_id');
    }
}
