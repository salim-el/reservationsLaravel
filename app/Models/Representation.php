<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'schedule',
        'location_id',
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
}
