<?php

use Illuminate\Support\Facades\Route;


  Route::POST('add-to-cart','User\ShoppingController@addtocart')->name('add-to-cart');
  Route::GET('cart','User\ShoppingController@cart')->name('show.cart');
  Route::delete('remove-from-cart', 'User\ShoppingController@removeCart');
  Route::patch('update-cart', 'User\ShoppingController@updateCart');
  route::get('checkout','User\ShoppingController@checkout')->name('checkout');
  route::POST('save-order','User\ShoppingController@order')->name('save-order');
route::get('order-completed','User\ShoppingController@orderCompleted')->name('order.completed');
  Route::get('/','User\HomeController@index')->name('home');
  Route::get('products/{category_id?}','User\HomeController@showAllProducts')->name('getproducts');
  Route::get('product-details/{slug}','User\HomeController@details')->name('products.details');
  Route::get('/admin','Admin\AdminLoginController@index')->name('admin-login');
  Route::POST('admin/login','Admin\AdminLoginController@authanticate')->name('adminlogin');

  Route::get('allsession',function(){
  \Artisan::call('route:clear');
  \Artisan::call('view:clear');
  \Artisan::call('config:clear');
  \Artisan::call('cache:clear');
  \Artisan::call('optimize');
  });
  Route::get('clear-cart',function(){
   \Session::flush(); 
   });

Route::get('user/login', 'User\UserloginController@index')->name('login');
Route::get('user/signup', 'User\UserloginController@signUp')->name('signup');
Route::POST('user/registration', 'User\UserloginController@registration')->name('user-registration');
Route::POST('user/authanticate', 'User\UserloginController@authanticate')->name('user-authenticate');

Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function()
{
  
  route::get('/','User\UserController@index')->name('dashboard');
  route::get('logout','User\UserloginController@logout')->name('logout');
  route::get('user-order-cancle/{order_code}','User\UserController@cancleOrder')->name('user-order-cancle');
  route::POST('billing/address/update','User\UserController@billingAddressUpdate')->name('billing_address_update');
  route::POST('shipping/address/update','User\UserController@shippingAddressUpdate')->name('shipping_address_update');
  route::POST('user/profile/update','User\UserController@userProfileUpdate')->name('userProfileUpdate');
  route::POST('user/profile/update/password','User\UserController@updatePassword')->name('updatePassword');
  route::GET('user/view-order/{order_code}','User\UserController@viewOrder')->name('UserviewOrder');
  route::GET('user/generate-pdf/{order_code}','User\ShoppingController@getInvoice')->name('generate-pdf');
  
  route::GET('my-wishlists','Common\WishlistController@index')->name('my-wishlists');

   route::POST('add-to-wishlist','Common\WishlistController@addToWishlist')->name('add-to-wishlist');
   route::GET('remove-to-wishlist/{id}','Common\WishlistController@removeToWishlist')->name('remove-to-wishlist'); 
  
});


//AuthGuard is use for admin login check......
Route::group(['prefix' => 'admin',  'middleware' => 'AdminGuard'], function()
{

  Route::get('customers','Admin\AdminController@getAllCustomers')->name('admin-customers');
   Route::get('dashboard','Admin\AdminController@index')->name('admin-dashboard');
   Route::get('sliders','Admin\SliderController@index')->name('add-sliders');

   Route::get('delete/sliders/{id}','Admin\SliderController@delete')->name('delete.sliders');

    Route::POST('sliders/store','Admin\SliderController@store')->name('store-slider');


   Route::get('logout','Admin\AdminLoginController@logout')->name('admin-logout');
   Route::get('category','Admin\CategoryController@index')->name('category');
   Route::post('add-category','Admin\CategoryController@store')->name('add-category');
   Route::get('edit-category/{id}','Admin\CategoryController@edit')->name('edit-category');
   Route::get('category-status/{status}/{id}','Admin\CategoryController@statusChange')->name('category-status');
   Route::post('update-category/{id}','Admin\CategoryController@update')->name('update-category');
   Route::get('delete-category/{id}','Admin\CategoryController@destroy')->name('delete-category');
   Route::resource('subcategory','Admin\SubcategoryController');
   Route::get('addproduct','Admin\ProductController@create')->name('products');
   Route::post('storeproduct','Admin\ProductController@store')->name('store-products');
   Route::get('edit-product/{id}','Admin\ProductController@edit')->name('edit-products');
   Route::post('update-product/{id}','Admin\ProductController@update')->name('update-products');
   Route::get('delete-product/{id}','Admin\ProductController@destroy')->name('delete-product');
   Route::get('show_products','Admin\ProductController@index')->name('show.products');
   Route::get('product-stock-status/{status}/{id}','Admin\ProductController@productStatusChange')->name('product-stock-status');
   Route::get('product-status/{status}/{id}','Admin\ProductController@StatusChange')->name('product-status');
   Route::get('orders-history','Admin\ProductController@get_orders')->name('admin-orders');
  //Blog category route
  Route::resource('blog-category','Admin\BlogCategoryController');
  Route::get('delete-blog-category/{id}','Admin\BlogCategoryController@destroy')->name('delete-blog-category');
  //Blogs
  Route::resource('blog','Admin\BlogController');
  Route::post('update-blog/{id}','Admin\BlogController@update')->name('update-blog');
  Route::get('delete-blog/{id}','Admin\BlogController@destroy')->name('delete-blog');
  Route::get('create-offers','Admin\OffersController@create')->name('create.offers');
  Route::post('store-offers','Admin\OffersController@store')->name('store-offers');
  Route::get('edit-offers/{id}','Admin\OffersController@edit')->name('edit-offers');
  Route::post('update-offers/{id}','Admin\OffersController@update')->name('update-offers');
  Route::get('delete-offers/{id}','Admin\OffersController@destroy')->name('delete-offers');
  Route::get('offers-status/{status}/{id}','Admin\OffersController@StatusChange')->name('offers-status');
  Route::get('get-offers/{id}','Admin\OffersController@show')->name('getOffersProducts');
  Route::get('add-offers-products','Admin\OffersProductsController@index')->name('offers.products');
  Route::POST('store-offers-products','Admin\OffersProductsController@store')->name('store.offers.products');
  Route::GET('remove-offer-product/{id}','Admin\OffersProductsController@destroy')->name('remove-offer-product');
  Route::GET('get-all-offers-products','Admin\OffersController@getAllOffersWithProducts')->name('getAllOffersWithProducts');


  Route::GET('order-details/{order_code}','Admin\AdminController@getOrderDetails')->name('order-details');

      Route::GET('change-order-status/{status}/{order_code}','Admin\AdminController@changeOrderStatus')->name('change-order-status');


});


