<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'designation',
        'address',
        'locality_postal_code',
    ];

    protected $table = 'locations';

    /**
     * ManyToOne : une Location appartient à une Locality
     */
    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class, 'locality_postal_code', 'postal_code');
    }

    /**
     * OneToMany : une Location possède plusieurs Show
     */
    public function shows(): HasMany
    {
        return $this->hasMany(Show::class);
    }

    /**
     * OneToMany : une Location possède plusieurs Representation
     */
    public function representations(): HasMany
    {
        return $this->hasMany(Representation::class);
    }
}
