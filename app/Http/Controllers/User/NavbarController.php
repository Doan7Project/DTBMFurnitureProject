<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ProductService;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        return view('User.pages.product.product',[
            'category' => $category,
            'product' => $this->productservice->getAll(),
            'getproduct' => $this->productservice->getProduct(),
            'datas' => $data,
            session()->flash('link', $data->id),
            session()->flash('linkName', $data->CategoryName),

        ]);
    }
    // logout 
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('userIndex');
    }
}