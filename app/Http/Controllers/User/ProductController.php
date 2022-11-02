<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\ProductService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    protected $cartService;
    private $productservice;
    public function __construct(
        ProductService $productservice,
        CartService $cartService
        )
    {
        $this->cartService = $cartService;
        $this->productservice = $productservice;
    }
    public function product()
    {
        return view('User.pages.product.product', [
            'category' => $this->productservice->getCategoryName(),
            'product' => $this->productservice->getAll(),
            'getproduct' =>$this->productservice->getProduct(),

            'products' => $this->cartService->getProduct(),
            'carts' => Session::get('carts')
        ]);
    }

    public function productRedirect()
    {
        // Session()->flush();
        // Session()->forget('category_id');
        return redirect()->route('product');
    }
}