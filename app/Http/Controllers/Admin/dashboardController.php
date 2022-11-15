<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\OrderService;
use App\Http\Services\Menu\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class dashboardController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        return view('Admin.pages.index',[
            'title'=>'Order Detail',
            'orderMaster'=>$this->orderService->getInfoOrderMaster(),
            'customer'=>$this->orderService->getInfoCustomer(),
            'feedback'=>$this->orderService->getInfoFeedback(),
            'orderDetail'=>$this->orderService->getInfoOrderDetail(),
        ]);
    }

}
