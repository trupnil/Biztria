<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Subcategory;
use Illuminate\Support\Str;
use File;
use App\Admin\Product;
use App\Admin\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $allproducts = product::with('category')->orderBy('id', 'DESC')->get();
        return view('Admin.show_product',compact('allproducts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $data = new Category;
          $Categories = Category::orderBy('id', 'DESC')->get();
          $allproducts = product::with('category')->where('status','1')->orderBy('id', 'DESC')->get();
           //dd($allproducts);
          return view('Admin.product',compact('Categories','allproducts','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'images' => 'required',
            'discount_price' => 'required',
            'details' => 'required',
            'status'  => 'required',
            'stock_status'  => 'required',
          ]);

        $requestData = $request->all();
        
        
        
        if ($request->hasFile('images'))
          {
            
            $imageName = time().'.'.$request->images->getClientOriginalName();
            $request->images->move(public_path('images'), $imageName);
            $requestData['slug'] = Str::slug( $request->name,'-');
            $requestData['images'] = $imageName;
           
          }
            
            if ($request->hasFile('images1'))
          {
            
            $imageName = time().'.'.$request->images1->getClientOriginalName();
            $request->images1->move(public_path('images'), $imageName);
            $requestData['images1'] = $imageName;
          }
          if ($request->hasFile('images2'))
          {
            
            $imageName = time().'.'.$request->images2->getClientOriginalName();
            $request->images2->move(public_path('images'), $imageName);
            $requestData['images2'] = $imageName;
          }
          if ($request->hasFile('images3'))
          {
           
            $imageName = time().'.'.$request->images3->getClientOriginalName();
            $request->images3->move(public_path('images'), $imageName);
            $requestData['images3'] = $imageName;
          }
          if ($request->hasFile('images4'))
          {
           
            $imageName = time().'.'.$request->images4->getClientOriginalName();
            $request->images4->move(public_path('images'), $imageName);
            $requestData['images4'] = $imageName;
          }
         
         $requestData['slug'] = Str::slug( $request->name,'-');
         if($request->filled('size'))
         {
             $requestData['size'] = implode(',', $request->size);
         }
         
         Product::create($requestData);
         return redirect()->route('products')
         ->with('success','Products added successfully.');

     }

    //   public function allprodcuts()
    // {
       
    //   $allproducts =   product::where('status','1')->get();
    //     return redirect()->route('products',compact('allproducts'))
    //     ->with('success','Products added successfully.');

    //  }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_orders()
    {
        $order = Order::all();
        
        //dd($order);
        return view('Admin.show_orders',compact('order'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
          $Categories = Category::orderBy('id', 'DESC')->get();
          $allproducts = product::with('category')->where('status','1')->orderBy('id', 'DESC')->get();
           //dd($allproducts);
          return view('Admin.product',compact('Categories','allproducts','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Product::find($id);

        $requestData = $request->all();
        if($request->filled('size'))
         {
             $requestData['size'] = implode(',', $request->size);
         }
        
        if ($request->hasFile('images'))
          {
            
            $imageName = time().'.'.$request->images->getClientOriginalName();
            $request->images->move(public_path('images'), $imageName);
            $requestData['images'] = $imageName;
          }
          else
          {
              $requestData['images'] = $request->old_images;
          }
          
          if ($request->hasFile('images1'))
          {
            
            $imageName = time().'.'.$request->images1->getClientOriginalName();
            $request->images1->move(public_path('images'), $imageName);
            $requestData['images1'] = $imageName;
          }
          else
          {
              $requestData['images1'] = $request->old_images1;
          }
          
          if ($request->hasFile('images2'))
          {
            
            $imageName = time().'.'.$request->images2->getClientOriginalName();
            $request->images2->move(public_path('images'), $imageName);
            $requestData['images2'] = $imageName;
          }
          else
          {
              $requestData['images2'] = $request->old_images2;
          }
          
          if ($request->hasFile('images3'))
          {
            
            $imageName = time().'.'.$request->images3->getClientOriginalName();
            $request->images3->move(public_path('images'), $imageName);
            $requestData['images3'] = $imageName;
          }
          else
          {
              $requestData['images3'] = $request->old_images3;
          }
          
          if ($request->hasFile('images4'))
          {
            
            $imageName = time().'.'.$request->images4->getClientOriginalName();
            $request->images4->move(public_path('images'), $imageName);
            $requestData['images4'] = $imageName;
          }
          else
          {
              $requestData['images4'] = $request->old_images4;
          }
          
          
        $requestData['slug'] = Str::slug( $request->name,'-');
        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('products')->with('success','products update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $delete = Product::find($id)->delete();

        if ($delete) 
        {
           return redirect()->route('products')->with('success','products deleted successfully');;
        }
    }
    
    public function productStatusChange($status,$id)
    {
      if($status == 1)
      {
          Product::where("id",$id)->update(["stock_status" => "0"]);
           return redirect()->route('show.products')
        ->with('success','Status Changed.');
          
      }
      else
      {
          Product::where("id",$id)->update(["stock_status" => "1"]);
            return redirect()->route('show.products')
        ->with('success','Status Changed.');
      }
    }
    
     public function StatusChange($status,$id)
    {
      if($status == 1)
      {
          Product::where("id",$id)->update(["status" => "0"]);
           return redirect()->route('show.products')
        ->with('success','Status Changed.');
          
      }
      else
      {
          Product::where("id",$id)->update(["status" => "1"]);
            return redirect()->route('show.products')
        ->with('success','Status Changed.');
      }
    }
    
    
}
