<?php

namespace Lariele\Movie\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 */
class Description extends Model
{
    public $timestamps = false;

    protected $table = 'movies_descriptions';

    protected $fillable = [
        'description',
        'type',
        'lang',
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
