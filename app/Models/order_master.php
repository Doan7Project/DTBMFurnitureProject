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
        return $this->belongsTo(Customer::class,'id', 'customer_id');
    }
    public function order_details(){
        return $this->hasMany(order_master::class,'id', 'order_master_id');
    }
}