<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\imagePdService;
use App\Http\Services\Menu\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $productservice;
    private $imagepdservice;
    public function __construct(ProductService $productservice, imagePdService $imagePdService)
    {
        $this->productservice = $productservice;
        $this->imagepdservice = $imagePdService;
    }
    public function cart()
    {
        return view('User.pages.cart.cart', [
            'category' => $this->productservice->getCategoryName(),

        ]);
    }

    public function orderdetail(Product $data)
    {
        return view('User.pages.cart.detail', [
            'title' => 'Detailed Product',
            'product' => $data,
            'category' => $this->productservice->getCategoryName(),
            'imagedata' => $this->imagepdservice->getAll(),
        ]);
    }
}
