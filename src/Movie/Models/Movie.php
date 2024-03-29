<?php

namespace Lariele\Movie\Models;


use App\SFD\Movie\Models\Sources;
use Database\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Lariele\Creator\Models\Creators\Actress;
use Lariele\Creator\Models\Creators\Director;
use Lariele\Tag\Models\Tag;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Movie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'year',
        'rating',
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
        return $this->morphToMany(Actress::class, 'creatable', 'creatables', 'creatable_id', 'creator_id');
    }

    /**
     * Movie categories
     *
     * @return MorphToMany
     */
    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorisable');
    }

    /**
     * Movie countries
     */
    public function countries(): MorphToMany
    {
        return $this->morphToMany(Country::class, 'countrisable');
    }

    /**
     * Movie providers
     */
    public function providers(): MorphToMany
    {
        return $this->morphToMany(Provider::class, 'providerable');
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

    /**
     * Movie tags
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * External IDs
     *
     * @return HasMany
     */
    public function externals(): HasMany
    {
        return $this->hasMany(External::class);
    }

    /**
     * Videos
     *
     * @return HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function getDescriptionAttribute()
    {
        $description = $this->descriptions()->where([
            'type' => 'def',
        ])->first();

        return $description?->description;
    }

    /**
     * Movie descriptions
     *
     * @return HasMany
     */
    public function descriptions(): HasMany
    {
        return $this->hasMany(Description::class);
    }

    public function getDescriptionShortAttribute()
    {
        $description = $this->descriptions()->where([
            'type' => 'short',
        ])->first();

        return $description?->description;
    }
}
