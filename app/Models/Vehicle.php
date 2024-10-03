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

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
