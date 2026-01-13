<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'poster_url',
        'duration',
        'created_in',
        'location_id',
        'bookable',
    ];

    protected $table = 'shows';

    /**
     * Get the location where the show has been created
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the representations for the show
     */
    public function representations(): HasMany
    {
        return $this->hasMany(Representation::class);
    }

    /**
     * Get the performances (artists in a type of collaboration) for the show
     */
    public function artistTypes(): BelongsToMany
    {
        return $this->belongsToMany(ArtistType::class);
    }

    /**
     * Get the prices for the show
     */
    public function prices(): BelongsToMany
    {
        return $this->belongsToMany(Price::class);
    }
}
