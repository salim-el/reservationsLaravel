<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'show_id',
        'schedule',
    ];

    protected $table = 'representations';

    public $timestamps = false;

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class);
    }

    /**
     * Get all the reservations for the representation
     */
    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class)
            ->withPivot(['unit_price', 'quantity']);
    }
}
