<?php

namespace Lariele\Movie\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Video extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
        'active',
        'source',
    ];

    public function movie(): HasOne
    {
        return $this->belongsTo(Movie::class);
    }
}
