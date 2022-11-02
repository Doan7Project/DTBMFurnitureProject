<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\imagePdService;
use App\Http\Services\Menu\ProductService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $productservice;
    private $imagepdservice;
    protected $cartService;
    public function __construct(
        ProductService $productservice, 
        imagePdService $imagePdService,
        CartService $cartService
        )
    {
        $this->productservice = $productservice;
        $this->imagepdservice = $imagePdService; 
        $this->cartService = $cartService;
    }
    
    public function orderdetail(Product $data)
    {
        return view('User.pages.cart.detail', [
            'title' => 'Detailed Product',
            'productdetail' => $data,
            'category' => $this->productservice->getCategoryName(),
            'product' => $this->productservice->getAll(),
            'products' => $this->cartService->getProduct(),
            'imagedata' => $this->imagepdservice->getAll(),
            'carts' => Session::get('carts'),
        ]);
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back(); 
        }
        
        return redirect('/carts');
    }

    public function show()
    {
        // $products = $this->cartService->getProduct();
        return view('User.pages.cart.cart', [
            'title' => 'Cart',
            'menu'=>$this->productservice->getCategoryName(),
            'menuchild' => $this->productservice->getAll(),
            'category' => $this->productservice->getCategoryName(),
            'products' => $this->cartService->getProduct(),
            'carts' => Session::get('carts')
        ]);
    }

    public function showOrder(){
        return view('User.pages.cart.myOrder', [
            'title' => 'My order',
            'menu'=>$this->productservice->getCategoryName(),
            'menuchild' => $this->productservice->getAll(),
            'category' => $this->productservice->getCategoryName(),
            'products' => $this->cartService->getProduct(),
            'order' => $this->cartService->myOrder(),
            'numOrder' => $this->cartService->numOrder(),
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}