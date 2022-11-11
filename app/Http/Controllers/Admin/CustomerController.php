<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function list(){

       $data = Customer::all();
   
        return view('Admin.pages.customer.customer_list',[
            'title'=>'Customer List',
            'customerList'=>$data

        ]);

    }
    public function view(Customer $data){
        return view('Admin.pages.customer.View',[
            'title'=>'Customer Detail',
            'customerDetail'=>$data
        ]);
    }
}
