<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = "feedback";
    protected $primaryKey = "id";
    protected $fillable = [
        'customer_id',
        'product_id',
        'status',
        'evaluate',
        'content',
       
    ];

    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function order_details(){
        return $this->belongsTo(order_detail::class,'order_detail_id','id');
    }
}
