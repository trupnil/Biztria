<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Order;
use App\Admin\Subcategory;
use Session;
use PDF;
use Mail;
use App\Admin\Blog;
use App\Admin\blogCategory;
use Razorpay\Api\Api;
use View;
use Illuminate\Support\Facades\Auth;
use App\User;

use Carbon\Carbon;

class ShoppingController extends Controller
{



    public function index()
    {
        //
        $categories = Category::where('status', '1')->get();
        $subcategories = Subcategory::where('status', '1')->get();

        $products = Product::with('Category', 'subcategory', 'user')->where('status', '1')
            ->paginate(15);

        return view('user.shopping.index', compact('categories', 'products', 'subcategories'));
    }

    public function productFilter(Request $request)
    {

        //dd($request->category);
        if ($request->category == null)
        {
            $allproducts = product::with('category')->where('status', '1')
                ->orderBy('id', 'DESC')
                ->paginate(9);
        }
        else
        {
            $allproducts = Product::with('category')->whereIn('category_id', $request->category)
                ->get();
        }

        $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status', "1")
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $Categories = Category::orderBy('id', 'DESC')->get();

        return view('user.product_filter', compact('Categories', 'allproducts', 'latestBlogs'));
    }

    public function getProducsCategoryWise($category_id)
    {
        $allproducts = Product::with('category')->where('category_id', $category_id)->get();
        $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status', "1")
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $Categories = Category::orderBy('id', 'DESC')->get();
        return view('user.product_filter', compact('Categories', 'allproducts', 'latestBlogs'));
    }

    public function search_product(Request $request)
    {

        $query = $request->search;
        $allproducts = Product::with('category')->where('name', 'like', '%' . $query . '%')->orWhere('slug', 'like', '%' . $query . '%')->get();
        //dd($allproducts);
        // $allproducts = Product::with('category')->whereIn('category_id', $request->category)->get();
        $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status', "1")
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $Categories = Category::orderBy('id', 'DESC')->get();
        // //$allproducts = product::with('category')->where('status','1')->orderBy('id', 'DESC')->paginate(9);
        return view('user.product_filter', compact('Categories', 'allproducts', 'latestBlogs'));
    }

    public function addtocart(Request $request)
    {
        $id = $request->product_id;
        $qty = $request->qty;
        $product = Product::find($id);
        if (!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart)
        {

            $cart = [$id => ["id" => $product->id, "name" => $product->name, "quantity" => $qty, "price" => $product->discount_price, "photo" => $product->images]];

            session()->put('cart', $cart);
            return json_encode($cart);
        }

        if (isset($cart[$id]))
        {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return json_encode($cart);

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [

        "id" => $product->id, "name" => $product->name, "quantity" => $qty, "price" => $product->discount_price, "photo" => $product->images];
       session()->put('cart', $cart);
       return json_encode($cart);

    }

    public function updateCart(Request $request)
    {
         //return $request->quantity;
        if ($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()
                ->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        //return  $request->id;
       if ($request->id)
        {
            $cart = session()->get('cart');
            if (isset($cart[$request->id]))
            {
                unset($cart[$request->id]);
                session()
                    ->put('cart', $cart);
            }

        $notification = array(
       'message' => 'Product Remove Form Cart!!',
       'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);


           // return session()->flash('success', 'Product removed successfully');
        }
    }

    public function productdetails($slug)
    {
        $products = Product::with('Category')->where('slug', $slug)->where('status', '1')
            ->first();
        // dd($products);
        return view('user.product_details', compact('products'));
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function order(Request $request)
    {
        
        $date = Carbon::now();
        $od = "ORD" . rand();
        $requestData = $request->all();
        $requestData['user_id'] = Auth::user()->id;
        $requestData['order_code'] = $od;
        $requestData['order_products'] = json_encode(session()->get('cart')); 
        $requestData['order_date'] = $date->format('d-m-y');      
        $order = new Order();
        $order->fill($requestData);
        if($order->save($requestData))
        {
            Session::forget('cart');
            $notification = array(
       'message' => 'Order Has Been Successfully Placed',
       'alert-type' => 'success'
        );
            return redirect()->route('order.completed')->with($notification);
            // return redirect()->back()
            // ->with('success', 'order Place Successfully!!!!');
        }
        else
        {
              $notification = array(
       'message' => 'Something Went Wrong!',
       'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
        }
        
        //return view('user.checkout');
        
    }

    public function orderCompleted()
    {
        return view('user.order_completed');
    }
    
    public function redeem(Request $request)
    {
        
        
        $userpoints = Auth::user()->points;
        $id = Auth::user()->id;
        
        $points = $request->point;
        
        if($userpoints <  $points)
        {
            echo "false";
        }
        else
        {
            $val = "10";
        
            $discount = $points/$val;
            
            $dha = ($userpoints)-($points);
            
            $user = User::find($id);
            $user['points']=$dha;
             $user->save();
            
           echo $discount;
             
             
        }
        
        
        
        
        
        
    }

    public function paysuccess(Request $request)
    {
            
            if($request->totalAmount >= 1000)
            {
                $addPoints = User::where('id',Auth::user()->id)->update(['points'=>Auth::user()->points + 100]);
            }
        
        $od = "OD" . rand('0000','9999');
        // $cart = session()->get('cart');
        // foreach($cart as $iteam)
        // {
        // dd($iteam[0]['id']);
        $order_data = ['user_id' => $request->user_id, 'product_id' => $request->product_id, 'order_name' => $request->name, 'order_email' => $request->email, 'order_phone' => $request->phone, 'order_address' => $request->address, 'order_zip' => $request->zip, 'city' => $request->city, 'order_transaction' => $request->razorpay_payment_id, 'order_notes' => $request->notes, 'price' => $request->totalAmount, 'payment' => $request->payment, 'payment_status' => "success", 'order_code' => $od, 'status' => "pending",

        ];

        $im = new Order();
        $im->fill($order_data);
        $im->save($order_data);
        
        if ($im->save($order_data))
        {
            if ($request->product_id)
            {
                // $cart = session()->get('cart');
                // if(isset($cart[$request->product_id]))
                // {
                //     unset($cart[$request->product_id]);
                //     session()->put('cart', $cart);
                // }
                session::forget('cart');
            }
            
                
        }
        
                $to_email =$request->email;
                
                $admin = 'noreply@nutriann.com';
                $name="nutriann";
                
                $data = array('name'=>$request->name,"amount"=>$request->totalAmount,"payment_id"=>$request->razorpay_payment_id,"order_code"=>$od,"msg"=>"Thanks for shopping with us");
                Mail::send(['html'=>'email.payment_mail'],$data, function($message1) use ($name, $to_email) {
                $message1->to($to_email, $name)
                        ->subject('Congratulation');
                $message1->from('noreply@nutriann.com','nutriann');
                });
                
                 Mail::send(['html'=>'email.admin_mail'],$data, function($message1) use ($name, $admin) {
                $message1->to($admin, $name)
                        ->subject('New Order');
                $message1->from('noreply@nutriann.com','nutriann');
                });
        // }
        $arr = array(
            'msg' => 'Payment successfully credited',
            'status' => true
        );
        return Response()->json($arr);

    }

    public function payfail(Request $request)
    {
        $od = "OD" . rand('0000','9999');

        $order_data = ['user_id' => $request->user_id, 'payment_id' => $request->razorpay_payment_id, 'ship_name' => $request->name, 'price' => $request->totalAmount, 'mobile_number' => $request->mobile_number, 'order_code' => $od, 'status' => "fail",

        ];
        $im = new Order();
        $im->fill($data);
        $im->save($data);

        $arr = array(
            'msg' => 'Payment failed',
            'status' => false
        );
        return Response()->json($arr);
    }

    public function thankYou()
    {
        //echo"this is razor pay success page ";
        return view('user.thankyou');
    }
    
    public function news_letter(Request $request)
    {
        $to_email = $request->email;
        $admin = "noreply@nutriann.com";
        $name="nutriann";
        $data = array("email"=>$to_email,"msg"=>"News letter activated..");
         Mail::send(['html'=>'email.news_mail'],$data, function($message1) use ($name, $to_email) {
                $message1->to($to_email, $name)
                        ->subject('Congratulation');
                $message1->from('noreply@nutriann.com','nutriann');
                });
                
                 Mail::send(['html'=>'email.admin_news_mail'],$data, function($message1) use ($name, $admin) {
                $message1->to($admin, $name)
                        ->subject('New Email ');
                $message1->from('noreply@nutriann.com','nutriann');
                });
        return redirect()->back()
            ->with('success', 'email send Successfully!!!!');
        
    }

    public function getInvoice($order_code)
    {
        //$api = new Api("rzp_test_PozlmEjlpdef1M", "b7VD4SA3klCPHAB4ejS9jsCe");
        $preview = Order::where('order_code', $order_code)->first();
        //dd($preview);
        $pdf = PDF::loadView('user.pdf_view', compact('preview'));
        $pdf->download('download.pdf');
        return $pdf->download('download.pdf');
    }

}

