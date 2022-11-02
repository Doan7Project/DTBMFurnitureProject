<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_master extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'date_required',
        'order_number',
        'notes'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}