<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'description',
        'delivery_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
