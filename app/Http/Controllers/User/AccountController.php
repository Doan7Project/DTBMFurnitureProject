<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePassRequest;
use App\Http\Services\Menu\AccountService;
use App\Http\Services\Menu\ProductService;
use App\Models\Customer;
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
    public function account(Customer $data)
    {   
        return view('User.pages.account.account', [
            'category' => $this->productservice->getCategoryName(),
            'accinfo' => $data,
        ]);
    }
    public function getpassword(Customer $data)
    {
        return view('User.pages.account.changepassword', [
            'category' => $this->productservice->getCategoryName(),
            'getdata'=>$data,
        ]);
    }
    public function changepassword(Customer $data, ChangePassRequest $request)
    {
        // dd($request->input());
          $this->accountservice->ChangePass($request, $data);
        return redirect()->back();
    }

    public function changeInfoUser(Customer $data, Request $request){
        //   dd($request->input());
        $this->accountservice->changeInfo($request, $data);
        return redirect()->route('userIndex');
    }
}
