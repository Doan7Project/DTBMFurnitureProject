<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePassRequest;
use App\Http\Services\Menu\AccountService;
use App\Http\Services\Menu\ProductService;
use App\Models\Customer;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    private $productservice;
    private $accountservice;
    public function __construct(ProductService $productservice, AccountService $accountService)
    {
        $this->productservice = $productservice;
        $this->accountservice = $accountService;
    }
 //view thông tin khách hàng cần thay đổi
    public function account(Customer $data)
    {   
        // dd($data);
        return view('User.pages.account.account', [
            'category' => $this->productservice->getCategoryName(),
            'accinfo' => $data,
        ]);
    }
   // View thông tin password dạng hidden
    public function getpassword(Customer $data)
    {
        return view('User.pages.account.changepassword', [
            'category' => $this->productservice->getCategoryName(),
            'getdata'=>$data,
        ]);
    }
    // thực hiện việc thay đổi passowrd
    public function changepassword(Customer $data, ChangePassRequest $request)
    {
        // dd($request->input());
          $this->accountservice->ChangePass($request, $data);
        return redirect()->route('successpape')->with('success','Your password has changed successfully!, Please sign in again');
    }
    

    public function changeInfoUser(Customer $data, Request $request){

        $this->accountservice->changeInfo($request, $data);
        return redirect()->route('logout');
    }

    // show register page
    public function register()
    {
        return view('User.pages.register.register', [
            'category' => $this->productservice->getCategoryName(),
        ]);
    }
    
    //show trang success khi thanh cong
    public function successpape(){
        return view('User.success', [
            'category' => $this->productservice->getCategoryName(),
        ]);
    }
    // tạo tài khoản
    public function store(Request $request, Message $message)
    {
        // bắt lỗi
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
        // thực hiện tạo tài khoản
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
            // Thông báo nếu tạo thành công
            session()->flash('success','Your account has created successfully!');
            return  redirect()->route('successpape');
    }
}
