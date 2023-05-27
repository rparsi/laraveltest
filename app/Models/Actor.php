<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $firstName
 * @property string $lastName
 * @property Movie[] $movies
 */
class Actor extends Model
{
    use HasFactory;

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
