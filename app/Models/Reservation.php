<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'booking_date',
        'updated_at',
    ];

    protected $table = 'reservations';

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the representations for the reservation
     */
    public function representations(): BelongsToMany
    {
        return $this->belongsToMany(Representation::class)
            ->withPivot(['unit_price', 'quantity']);
    }
}
