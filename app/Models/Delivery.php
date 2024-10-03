<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'driver_id',
        'vehicle_id',
        'route_id',
        'delivery_date',
        'status',
    ];

    // Relación de una entrega con un pedido
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relación de una entrega con un conductor
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    // Relación de una entrega con un vehículo
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relación de una entrega con una ruta
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
