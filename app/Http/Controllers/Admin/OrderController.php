<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\ReportService;
use App\Models\order_master;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $cartService;
    protected $reportservice;

    public function __construct(
        ReportService $reportService,
        CartService $cartService
        )
    {
        $this->reportservice = $reportService;
        $this->cartService = $cartService;
        
    }
    #. 1 Hiển thị danh sách Order
    public function OrderList()
    {
        return view('Admin.pages.order.Order_list', [
            'title' => "List order customers",
            'items' => $this->cartService->ListOrderNo(),
            'items2' => $this->cartService->ListOrderOk(),
            
        ]); 
    }

    public function updateOrder(Request $request, order_master $data)
    {
        $this->cartService->editOrder($request, $data);

        return redirect('Admin/pages/Order_list');
    }
    #. 2 Hiển thị trang hiển thị chi tiết
    public function OrderView()
    {
    }
    #. 3 Thực hiện lệnh xóa
    public function OrderDelete()
    {
        // return view('Admin.pages.Thumb_create');
    }
    #4 Report

    Public function report(){
        return view('Admin.pages.order.report',[
            'title'=>'Report',
            'orderMasterData'=>$this->reportservice->getMasterData(),
            'orderDetaiData'=>$this->reportservice->getOrderDetail(),
            'getCategory'=>$this->reportservice->getCategory(),
            
        ]);
       
    }
}