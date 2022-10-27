<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ProductService;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    //
    private $productservice;

    public function __construct(ProductService $productservice)
    {
        $this->productservice = $productservice;
    }

    public function link(ProductCategory $data)
    {
        $category = $this->productservice->getCategoryName();
        return view('User.pages.product.product', [
            'category' => $category,
            'product' => $this->productservice->getAll(),
            'getproduct' =>$this->productservice->getProduct(),
            'datas' => $data,
            session()->flash('link', $data->id)
        ]);
    }
}
