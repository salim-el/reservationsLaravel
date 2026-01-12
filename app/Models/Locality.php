<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    
    protected $table = 'localities';

    
    protected $primaryKey = 'postal_code';

    
    protected $keyType = 'string';

   
    public $incrementing = false;

   
    protected $fillable = [
        'postal_code',
        'locality',
    ];

    
    public $timestamps = false;
}
