<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    protected $table = 'reservations';

    // On utilise des timestamps personnalisés :
    public $timestamps = true;
    const CREATED_AT = 'booking_date';
    const UPDATED_AT = 'updated_at';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
