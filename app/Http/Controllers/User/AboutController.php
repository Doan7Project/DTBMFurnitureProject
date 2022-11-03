<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ProductService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    private $productservice;
    public function __construct(ProductService $productservice)
    {
        $this->productservice = $productservice;
    }
    public function about(){
        //Nạp dữ liệu category vào trang about
        return view('User.pages.about.about',[        
            'category'=>$this->productservice->getCategoryName(),
           ]);
    }
}
