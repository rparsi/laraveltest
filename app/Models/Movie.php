<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property Actor[] $actors
 */
class Movie extends Model
{
    use HasFactory;

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }
}
