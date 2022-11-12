<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_master extends Model
{
    use HasFactory;
    protected $table = "order_masters";
    protected $primaryKey = "id";
    protected $fillable =[
        'customer_id',
        'status',
        'order_number',
        'notes'
    ];

    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function order_details(){
        return $this->hasMany(order_master::class, 'order_master_id', 'id');
    }
}