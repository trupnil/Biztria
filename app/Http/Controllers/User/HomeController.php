<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Blog;
use App\Admin\blogCategory;
use Illuminate\Support\Str;
use View;
use App\Admin\Offers;
use App\Admin\OffersProducts;
use App\Admin\Slider;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {

        $Banners = Slider::orderBy('position', 'ASC')->get();
        // $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status',"1")->orderBy('id', 'DESC')->limit(4)->get();
        // $Categories = Category::orderBy('id', 'DESC')->get();
        // $allproducts = product::with('category')->where('status','1')->orderBy('id', 'DESC')->paginate(9);
         $getAllOffersWithProducts = OffersProducts::join('offers', 'offers_products.offers_id', '=', 'offers.id')->join('products', 'offers_products.product_id', '=', 'products.id')->get();
         $grouped = $getAllOffersWithProducts->groupBy('offers_name');
        
       return view('user.index',compact('grouped','Banners'));
    }
    
     public function showAllProducts($category_id = null)
    {
        if($category_id !== null)
        {
            $allproducts = product::with('category')->where('category_id',$category_id)->where('status','1')->orderBy('id', 'DESC')->paginate(9);    
        }
        else
        {
            $allproducts = product::with('category')->where('status','1')->orderBy('id', 'DESC')->paginate(9);
        }
        
       return view('user.products',compact('allproducts'));
    }
    
    public function details($slug)
    {
       $productDetails = product::with('category')->where('slug',$slug)->where('status','1')->first();
       $getRelatedProducts =  product::with('category')->where('category_id',$productDetails->category_id)->where('status','1')->orderBy('id', 'DESC')->get();
       //dd($productDetails->discount_price);
       return view('user.details',compact('productDetails','getRelatedProducts'));
    }
    
      public function about()
    {
       
        return view('user.about');
    }
    
      public function faqs()
    {
       
        return view('user.faqs');
    }
    
    public function shiipingAndReturns()
    {
       
        return view('user.shipping_returns');
    }
    
     public function contact()
    {
       
        return view('user.contact');
    }
    
    public function Sustainability()
    {
       
        return view('user.sustainability');
    }
    public function blogs()
    {
        $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        $getAllBlogs =   Blog::with('getAllBlogsWithCategory')->where('status',"1")->orderBy('id', 'DESC')->paginate(3);
       

        return view('user.blogs',compact('getAllBlogs','BlogCategories'));
    }
    
    
    public function blogDetails($slug)
    {
        $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        
        $getBlog =   Blog::with('getAllBlogsWithCategory')->where('blog_slug',$slug)->first();
        return view('user.blog_details',compact('getBlog','BlogCategories'));
    }
    
    public function getBlogAccordingCategory($id)
    {
         $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        
        
        $getAllBlogs =   Blog::with('getAllBlogsWithCategory')->where('status',"1")->where('blog_category_id',$id)->orderBy('id', 'DESC')->paginate(3);        
        return view('user.category_blogs',compact('getAllBlogs','BlogCategories'));
        
        
    }
    
     public function productFilter(Request $request)
    {
       
        $filterProdcuts = Product::with('getAllBlogsWithCategory')->whereIn(‘category_id’, $request->category)->get();
        dd($filterProdcuts);
    }
        

    
}
