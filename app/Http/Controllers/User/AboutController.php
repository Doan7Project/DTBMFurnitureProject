<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
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
    public function about(){
        return view('User.pages.about.about',[        
            'category'=>$this->productservice->getCategoryName(),
            
            'products' => $this->cartService->getProduct(),
            'carts' => Session::get('carts')
           ]);
    }
}