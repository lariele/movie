<?php

namespace Lariele\Movie\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 */
class Data extends Model
{
    public $timestamps = false;

    protected $table = 'movies_data';

    protected $fillable = [
        'duration',
        'release_date'
    ];

    protected $casts = [
        'release_date' => 'datetime:Y-m-d',
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
