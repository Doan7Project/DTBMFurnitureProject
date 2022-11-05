<?php

namespace App\Models;

// use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
       'CategoryName', 'Description', 'Detail'
    ];

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function order_details(){
        return $this->hasManyThrough(order_detail::class,'product_id','id', Product::class,'category_id','id');
    }
}
