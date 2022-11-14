<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\ProductService;
use Illuminate\Http\Request;
use App\Models\feedback;
use App\Models\order_detail;
use DB;

class FeedbackController extends Controller
{
    //
    // private $productservice;
    // public function __construct(ProductService $productservice)
    // {
    //     $this->productservice = $productservice;
    // }
    // public function feedback(){
    //     return view('User.pages.feedback.feedback',[        
    //         'category'=>$this->productservice->getCategoryName(),
    //        ]);
    // }
    private $productservice;
    public function __construct(ProductService $productservice)
    {
        $this->productservice = $productservice;
    }
    public function feedback(){
        $kkk=feedback::all();
        // $ddd = DB::table('feedback')
        
        //     ->join('order_details', 'feedback.id', '=', 'order_details.id')
        //     ->join('customers', 'feedback.id', '=', 'customers.id')
        //     ->where('feedback.id', '=', session('LoggedUserid'))
        //     ->select('feedback.*', 'customers.*', 'order_details.*')
        //     ->get();
        // $sss =order_detail::all();
        $ddd = DB::table('feedback')->join('customers', 'feedback.id', '=', 'customers.id')
        ->select('feedback.*', 'customers.*')
        ->get();
        $sss = DB::table('order_details')->get();
        $hhh = DB::table('customers')->get();
        $pro = DB::table('products')->get();
        
        
       
        
        // dd($ddd);
        return view('User.pages.feedback.feedback',[        
            'category'=>$this->productservice->getCategoryName(),
            'feedback'=>$ddd,
            'order_detail'=>$sss,
            'cus'=>$hhh,
            'feee'=>$kkk,
            'pro'=>$pro,
            
           ]);
    }
    public function createfeedback(){
        return view('User.pages.cart.detail');
    }
    public function createfeedbackpro(Request $request){
        $feeds = new feedback;
        $feeds->product_id = $request->input('product_id');
        $feeds->customer_id = $request->input('customer_id');
        $feeds->status = $request->input('status');
        $feeds->evaluate = $request->input('evaluate');
        $feeds->content = $request->input('content');
        $feeds->save();
        
        return redirect()->back();
    }
    public function feedbackuser($id)
    {
        $feeds=feedback::find($id );
        //  $feeds = DB::table('feedback') ->where ('id',$id) ->first();
        return view('User.pages.feedback.editfeed',['category'=>$this->productservice->getCategoryName()], compact('feeds'));
    }
    #. 5 Thực hiện lệnh sửa dữ liệu
    public function feedbackuserpro(Request $request, $id)
    {

        // $feeds = DB::table('feedback') ->where ('id',$id) ->first();
        $feeds=feedback::find($id );
        $feeds->product_id = $request->input('product_id');
        $feeds->customer_id = $request->input('customer_id');
        $feeds->status = $request->input('status');
        $feeds->evalue = $request->input('evalue');
        $feeds->content = $request->input('content');

       

        $feeds->update();

        // return view('User.pages.feedback.editfeedback', compact('feeds'));
        return redirect()->route('feeduser');
        
    }
}
