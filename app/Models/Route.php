<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_location',
        'end_location',
        'distance',
        'estimated_time',
    ];

    // Relación de una ruta con múltiples entregas
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    // Relación de una ruta con un conductor
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
