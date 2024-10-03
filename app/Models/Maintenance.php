<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    // Atributos 
    protected $fillable = [
        'vehicle_id',
        'description',
        'cost',
        'maintenance_date',
        'status',
    ];

    // Relación: Un mantenimiento pertenece a un vehículo
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
