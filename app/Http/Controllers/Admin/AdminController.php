<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Order;
use App\User;
class AdminController extends Controller
{
   
    public function index()
    {
       return view('Admin.dashboard');
    }

    public function getOrderDetails($order_id)
    {
        $order = Order::where('order_code',$order_id)->first();
        return view('Admin.order_details',compact('order'));
    }

      public function changeOrderStatus($status,$order_code)
    {
     		$updateOrderStatus = Order::where('order_code', $order_code)->update(['status'=>$status]);
     		return redirect()->route('admin-orders')
         ->with('success','Status Changed successfully.');  
    }

    public function getAllCustomers()
    {
        $getAllCustomers = User::where('role','=', '2')->orderBy('id','DESC')->get();
        //dd($getAllCustomers);
        return view('Admin.customers',compact('getAllCustomers'));
    }



    

    

  
}
