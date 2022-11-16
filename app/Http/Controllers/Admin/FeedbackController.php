<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feedback;
use DB;
class FeedbackController extends Controller
{
    #. 1 Hiển thị danh sách feedback
    public function FeedbackList()
    {
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
        return view('Admin.pages.feedback.Feedback_list',[        
            
            'feedback'=>$ddd,
            'order_detail'=>$sss,
            'cus'=>$hhh,
            'feee'=>$kkk,
            'pro'=>$pro,
            
           ]);
        
    }
    #. 2 Hiển thị trang danh sách chi tiết
   
    #. 3 Thực hiện lệnh xóa
    public function FeedbackDeleteProcess()
    {
        // return view('Admin.pages.Thumb_create');
    }

    # Mr bao feedback
    public function FeedbackView($id )
    {
       
        $ddd = DB::table('feedback')->join('customers', 'feedback.customer_id', '=', 'customers.id')
        ->select('feedback.*', 'customers.*')
        ->where ('customer_id',$id) ->first();
        // $sss = DB::table('order_details')->get();
         $hhh = DB::table('customers') ->where ('id',$id) ->first();
        $pro = DB::table('products')->where ('id',$id) ->first();
        $feeds=feedback::find($id );
        //  $feeds->customer_id = $request->input('customer_id');
        // $feeds->product_id = $request->input('product_id');
        // $feeds->status = $request->input('status');
       
        // $feeds->evalue = $request->input('evalue');
        // $feeds->content = $request->input('content');
        return view('Admin.pages.feedback.Feedback_view',[        
            
        'feedback'=>$ddd,
        //     // 'order_detail'=>$sss,
        'cus'=>$hhh,
            'feeds'=>$feeds,
         'pro'=>$pro,
        ]);
    }     
    public function FeedbackViewPro(Request $request, $id){
        $cus = DB::table('customers')->where ('id',$id) ->first();
        $pro = DB::table('products')->where ('id',$id) ->first();
        $feeds=feedback::find($id );
          $feeds->customer_id = $request->input('customer_id');
        $feeds->product_id = $request->input('product_id');
        $feeds->status = $request->input('status');
       
        $feeds->evalue = $request->input('evalue');
        $feeds->content = $request->input('content');
        
        
        $feeds->update();
        $cus->update();

        return redirect()->route('adminfeed');
    }
    
    
}