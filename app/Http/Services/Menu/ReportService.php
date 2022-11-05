<?php


namespace App\Http\Services\Menu;

use App\Models\Customer;
use App\Models\order_detail;
use App\Models\order_master;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;
use PhpParser\Node\Stmt\TryCatch;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Hash;

class ReportService
{

    public function getMasterData(){
        return order_master::all();
    }
    public function getOrderDetail(){
        return order_detail::all();
    }
    public function getCategory(){
        return ProductCategory::all();
    }
}