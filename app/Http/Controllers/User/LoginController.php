<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ProductService;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    private $productservice;
    public function __construct(ProductService $productservice)
    {
        $this->productservice = $productservice;
    }
    // Hiển thị trang login
    public function login()
    {
        return view('User.pages.login.login', [
            'category' => $this->productservice->getCategoryName(),
        ]);
    }
    public function signin(Request $request)
    {
        // Kiểm tra lỗi
        $this->validate($request, [

            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        //Lấy thông tin từ dd
        $userInfo = Customer::where('email', '=', $request->email)->first();
        //kiểm tra thông tin so sách thông tin nhập và dd
        if (!$userInfo) :
            return back()->with('fail', 'We do not recognize you email address');
        else :
            if ($request->password == $userInfo->password) :

                $request->session()->put('LoggedUser',$userInfo->email);
                $request->session()->put('LoggedUserid',$userInfo->id);
                
                return redirect()->route('userIndex');
            else :
                return back()->with('fail', 'Incorrect password');
            endif;
        endif;
    }
}
