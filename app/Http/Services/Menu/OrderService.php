<?php


namespace App\Http\Services\Menu;

use App\Models\Customer;
use App\Models\feedback;
use App\Models\order_detail;
use App\Models\order_master;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Contracts\Session\Session;

class OrderService
{

    public function getInfoOrderMaster(){

        return order_master::all();
    }
    public function getInfoOrderDetail(){

        return order_detail::all();
    }
    public function getInfoCustomer(){

        return Customer::all();
    }
    public function getInfoFeedback(){

        return feedback::all();
    }
}
