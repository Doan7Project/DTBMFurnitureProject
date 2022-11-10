<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ProductService;
use App\Models\Customer;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    private $productservice;
    public function __construct(ProductService $productservice)
    {
        $this->productservice = $productservice;
    }
    public function register()
    {
        return view('User.pages.register.register', [
            'category' => $this->productservice->getCategoryName(),
        ]);
    }
    public function successpape(){
        return view('User.pages.register.success', [
            'category' => $this->productservice->getCategoryName(),
        ]);
    }
    public function store(Request $request, Message $message)
    {
        $this->validate($request,[
            'firstname'=>'required|regex:/([A-Za-z])/',
            'lastname'=>'required|regex:/([A-Za-z])/',
            'email'=>'required|email:rfc|unique:customers,email',
            'gender'=>'required',
            'phone'=>'required|unique:customers,phone',
            'birthday'=>'required',
            'country'=>'required',
            'city'=>'required',
            'address'=>'required',
            'txtpassword'=>'required',
            'confirmpassword'=>'required',
        ]);
            Customer::create([
                'first_name'=>$request->input('firstname'),
                'last_name'=>$request->input('lastname'),
                'gender'=>$request->input('gender'),
                'email'=>$request->input('email'),
                'password'=>$request->input('txtpassword'),
                'phone'=>$request->input('phone'),
                'birthday'=>$request->input('birthday'),
                'country'=>$request->input('country'),
                'city'=>$request->input('city'),
                'address'=>$request->input('address'),

            ]);
            return  redirect()->route('successpape');
    }
}
