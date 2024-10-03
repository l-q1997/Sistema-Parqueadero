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
        'available',
    ];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
