<?php


namespace App\Http\Services\Menu;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;
use PhpParser\Node\Stmt\TryCatch;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public function GetAccountInfo()
    {
        return Customer::all();
    }
    public function ChangePass($request, $data)
    {
        try {
            if ($request->input('oldpasswordHide') != $request->input('oldpassword')) :
                return redirect()->back()->with('fail', 'The old password or confirmed password not match');
            elseif ($request->input('newpassword') != $request->input('confirmedpassword')) :
                return redirect()->back()->with('fail', 'The old password or confirmed password not match');
            else :
                $data->password = (string) ($request->input('confirmedpassword'));
                $data->save();
                session()->flash('success', 'Change password successfully!');
                return  true;
            endif;
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        };
        return true;
    }

    public function changeInfo($request, $data){

        try{

            $data->first_name = (string) $request->input('firstname');
            $data->last_name = (string) $request->input('lastname');
            $data->email = (string) $request->input('email');
            $data->gender = (string) $request->input('gender');
            $data->phone = (string) $request->input('phone');
            $data->birthday = (string) $request->input('birthday');
            $data->country = (string) $request->input('country');
            $data->city = (string) $request->input('city');
            $data->address = (string) $request->input('address');
            $data->save();

        }
        catch(\Exception $err){
            session()->flash('error',$err->getMessage());
        }
        return true;
    }
}
