<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ReportService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $reportservice;

    public function __construct(ReportService $reportService)
    {
        $this->reportservice = $reportService;
    }
    #. 1 Hiển thị danh sách Order
    public function OrderList()
    {
        return view('Admin.pages.order.Order_list');
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
