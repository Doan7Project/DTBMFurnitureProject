<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $primaryKey = "id";
    protected $fillable= [
        'product_id','order_master_id','quantity'
    ];

    
    public function order_masters(){
        return $this->belongsTo(order_master::class,'order_master_id','id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
