<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\imagePdService;
use App\Http\Services\Menu\OrderService;
use App\Http\Services\Menu\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    private $productservice;
    private $imagepdservice;
    protected $cartService;
    protected $orderservice;

    public function __construct(
        ProductService $productservice, 
        imagePdService $imagePdService,
        CartService $cartService,
        OrderService $orderservice
        )
    {
        $this->productservice = $productservice;
        $this->imagepdservice = $imagePdService;
        $this->cartService = $cartService;
        $this->orderservice = $orderservice;
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
        return view('User.pages.cart.cart', [
            'title' => 'My Cart',
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

    public function cancelOrder(Request $request, $id)
    {
        $this->cartService->cancelOrder($request, $id);
        return redirect('/my_order');
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
    
    // phần hiển thị thông tin order chi tiết để bắt đầu add cart
    public function orderdetail(Product $data)
    {
        return view('User.pages.cart.detail', [
            'title' => 'Detailed Product',
            'productdetail' => $data,
            'category' => $this->productservice->getCategoryName(),
            'imagedata' => $this->imagepdservice->getAll(),
            'products' => $this->cartService->getProduct(),
            'carts' => Session::get('carts'),
            'orderDetail' => $this->orderservice->getInfoOrderDetail()
        ]);
    }
}