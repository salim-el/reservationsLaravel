<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';
    public $timestamps = false;

    protected $fillable = [
        'type',
        'price',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('camelCaseAliases', function (Builder $builder) {
            // IMPORTANT : forcer le select pour que l'alias existe
            $builder->selectRaw('prices.*, end_date as endDate');
        });
    }

    // (optionnel) accès via $price->endDate
    public function getEndDateAttribute()
    {
        return $this->attributes['end_date'] ?? null;
    }
}
