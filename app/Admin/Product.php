<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Category;
use App\Admin\Subcategory;
use App\User;
class Product extends Model
{
    //
     protected $fillable = [
         
        'category_id',
        'name',
        'slug',
        'images',
        'images1',
        'images2',
        'images3',
        'images4',
        'base_price',
        'discount_price',
        'CGST',
        'SGST',
        'size',
        'details',
        'Short_details',
        'product_link',
        'status',
        'stock_status',
        'sku',
        
    ];

     public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


     public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

     public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
