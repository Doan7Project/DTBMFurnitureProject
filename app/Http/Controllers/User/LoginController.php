<?php

namespace App\Http\Controllers\User;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CartService;
use App\Http\Services\Menu\ProductService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    protected $cartService;
    private $productservice;
    public function __construct(
        ProductService $productservice,
        CartService $cartService
        
        )
    {
        $this->cartService = $cartService;
        $this->productservice = $productservice;
    }
    public function login()
    {
        return view('User.pages.login.login', [
            'category' => $this->productservice->getCategoryName(),
            
            'products' => $this->cartService->getProduct(),
            'carts' => Session::get('carts')
        ]);
    }
    public function signin(Request $request)
    {

        $this->validate($request, [

            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        $userInfo = Customer::where('email', '=', $request->email)->first();

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