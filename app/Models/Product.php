<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_name',
        'product_code',
        'price',
        'unit',
        'quantity',
        'status',
        'models',
        'made_in',
        'category_id',
        'images',
        'content',
        'description',
    ];

    public function product_categories(){
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }
    public function product_images(){
        return $this->hasMany(product_image::class,'product_id','id');
    }
    public function order_details(){
        return $this->hasMany(order_detail::class,'product_id','id');
    }
}
