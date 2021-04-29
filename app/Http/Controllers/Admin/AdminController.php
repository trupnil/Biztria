<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     		return redirect()->back()
         ->with('success','Status Changed successfully.');  
    }

    public function getAllCustomers()
    {
        $getAllCustomers = User::where('role','=', '2')->orderBy('id','DESC')->get();
        //dd($getAllCustomers);
        return view('Admin.customers',compact('getAllCustomers'));
    }

    public function todayOrders()
    {
      $date = Carbon::now();
      $Today =  $date->toDateString();
      $order = Order::where('order_date','=',$Today)->get();
      //Reuse Component orders and today orders both are in same page
      return view('Admin.show_orders',compact('order')); 
   }


   public function dailyCollection(Request $request)
   {
      //dd($request->all());
      $dailyCollection = new Order;
      $date = Carbon::now();
      $Today =  $date->toDateString();
      $dailyCollection = $dailyCollection->newQuery();
      if ($request->filled('status')) {
            if($request->status !== "-1")
            {
             $dailyCollection->where('status', $request->input('status'));
            }
      }

       if ($request->filled('payment')) {
            if($request->payment !== "-1")
            {
             $dailyCollection->where('payment', $request->input('payment'));
            }
      }

      $order =  $dailyCollection->where('order_date','=',$Today)->get();
      return view('Admin.daily_collection',compact('order'));
   }

   public function datewiseReport(Request $request)
   {
       $datewiseReport = new Order;
       $date = Carbon::now();
       $Today =  $date->toDateString();
       $fromDate = $request->input('from_date') ?? $Today;
       $toDate = $request->input('to_date') ?? $Today;
       $datewiseReport = $datewiseReport->newQuery();
         if ($request->filled('status')) {
            if($request->status !== "-1")
            {
             $datewiseReport->where('status', $request->input('status'));
            }
         }
        $datewiseReport->whereNotIn('status',['Cancle','Rejected'])->whereBetween('order_date', [$fromDate, $toDate]);
        $results = $datewiseReport->get();
        return view('Admin.datewise_report',compact('results'));
    }

    public function profile()
    {
      return view('Admin.admin_profile');
    }

    public function changePassword(Request $request)
    {
       $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
         ]);

        $user = Auth::user()->password;
        $id = Auth::user()->id;

        if(!Hash::check($request['old_password'], $user)){

             return back()->with('error','The specified password does not match the Current password');
        }else
        {
            $data = ["password" => Hash::make($request->password)];
            User::where(['id'=>$id])->update($data);
            return redirect()->back()->with('success','Password Changed!!');
        }

    }



    

    

  
}
