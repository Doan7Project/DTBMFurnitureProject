<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\ProductService;
use App\Http\Services\Menu\slideService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $productservice;
    protected $cartService;
    private $slideservice;
    public function __construct(
        ProductService $productservice, 
        slideService $slideService,
        CartService $cartService
        )
    {
        $this->productservice = $productservice;
        $this->slideservice = $slideService;
        $this->cartService = $cartService;
        
    }

    public function index(){

        return view('User.pages.home.index',[        
            'category'=>$this->productservice->getCategoryName(),
            'product'=>$this->productservice->getAll(),
            'slide'=>$this->slideservice->getAll(),

            'products' => $this->cartService->getProduct(),
            'carts' => Session::get('carts')
           ]);
    }


    

}