<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'capacity',
        'status',
    ];

    // Relación de un vehículo con múltiples mantenimientos
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    // Relación de un vehículo con muchas entregas
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
