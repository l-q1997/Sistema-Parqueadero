<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'license',
        'experience',
        'availability',
    ];

    // Relación de un conductor con muchas rutas
    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    // Relación de un conductor con muchas entregas
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
