<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
    ];

    // Relación de un cliente con muchos pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
