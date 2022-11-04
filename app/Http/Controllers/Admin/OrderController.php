<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
        return view('Admin.pages.order.report');
    }
}
