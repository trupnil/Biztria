<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = new Category;
        $Categories = Category::orderBy('id', 'DESC')->get();
        return view('Admin.categories',compact('Categories','data'));
    }
    
     public function statusChange($status,$id)
    {
      if($status == 1)
      {
          Category::where("id",$id)->update(["status" => "0"]);
           return redirect()->route('category')
        ->with('success','Status Changed.');
          
      }
      else
      {
          Category::where("id",$id)->update(["status" => "1"]);
            return redirect()->route('category')
        ->with('success','Status Changed.');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.categories',compact('Categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
       
        if (Category::where('category_name', '=', $request->category_name)->exists()) {
          
            return redirect()->back()->with('error','Category is already exist'); 
        }

        Category::create($request->all());
        return redirect()->route('category')
        ->with('success','category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Category::find($id);
        $Categories = Category::orderBy('id', 'DESC')->get();
        return view('Admin.categories',compact('Categories','data'));
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
        $data =Category::find($id);

        $requestData = $request->all();
        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('category')->with('success','category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id)->delete();

        if ($delete) 
        {
           return redirect()->route('category')->with('success','category deleted successfully');;
        }
    }
}
