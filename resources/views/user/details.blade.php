@extends('user.master')
@section('main-section')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $productDetails->category->category_name  }}</a></li>
                    <li class="breadcrumb-item active">{{ $productDetails->name }}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
		<div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image vertical_gallery">
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images }}" data-zoom-image="">
                                <img src="{{ url('images') }}/{{ $productDetails->images }}" alt="product_small_img1" />
                            </a>
                        </div>
                        @if(!empty($productDetails->images1))
                        <div class="item">
                             <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images1 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images1 }}">
                                <img src="{{ url('images') }}/{{ $productDetails->images1 }}" />
                            </a>
                        </div>
                        @endif
                         @if(!empty($productDetails->images2))
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images2 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images2 }}">
                                <img src="{{ url('images') }}/{{ $productDetails->images2 }}" alt="product_small_img1" />
                            </a>
                        </div>
                        @endif
                         @if(!empty($productDetails->images3))
                        <div class="item">
                             <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images3 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images3 }}">
                                <img src="{{ url('images') }}/{{ $productDetails->images3 }}" alt="product_small_img1" />
                            </a>
                        </div>
                        @endif
                         @if(!empty($productDetails->images4))
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{ url('images') }}/{{ $productDetails->images4 }}" data-zoom-image="{{ url('images') }}/{{ $productDetails->images4 }}">
                                <img src="{{ url('images') }}/{{ $productDetails->images4 }}" alt="product_small_img1" />
                            </a>
                        </div>
                        @endif
                        
                    </div>
                    <div class="product_img_box">
                        <img id="product_img" src='{{ url('images') }}/{{ $productDetails->images }}' data-zoom-image="{{ url('images') }}/{{ $productDetails->images }}" alt="product_img1" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{ $productDetails->name }}</a></h4>
                        <div class="product_price">
                            <span class="price">{{ $productDetails->	discount_price }}</span>
                            <del>{{ $productDetails->base_price }}</del>
                            <div class="on_sale">
                                <span>@php  $sale =  ($productDetails->base_price - $productDetails->discount_price )/$productDetails->base_price; echo round($sale*100, 0);   @endphp % Off</span>
                            </div>
                        </div>
                    
                        <div class="pr_desc">
                            <p>{{ $productDetails->Short_details }}</p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                <li><i class="linearicons-shield-check"></i> Total Saving :<b> @php echo $productDetails->base_price - $productDetails->discount_price;   @endphp </b> </li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                       
                       {{-- <div class="pr_switch_wrap">
                            <span class="switch_lable">Size</span>
                            <div class="product_size_switch">
                                <span>xs</span>
                                <span>s</span>
                                <span>m</span>
                                <span>l</span>
                                <span>xl</span>
                            </div>
                        </div> --}}
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>
                        @if($productDetails->stock_status == "1")
                        
                        @if(!empty($productDetails->product_link))
                        <div class="cart_btn">
                            <a href="{{$productDetails->product_link}}" class="btn btn-fill-out btn-addtocart" target="_blank" ><i class="icon-basket-loaded"></i>  Buy Now</a>
                           
                        </div>
                        @else
                         <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart"  type="button" onclick="addToCart({{$productDetails->id}},1)" ><i class="icon-basket-loaded"></i>  Add to cart</button>
                           
                        </div>
                         @endif
                        @elseif($productDetails->stock_status == "0")
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart" type="button" disabled ><i class="icon-basket-loaded"></i>SOLD OUT</button>
                           
                        </div>
                        @endif
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: <a href="#">{{ $productDetails->sku }}</a></li>
                        <li>Category: <a href="#">{{ $productDetails->category->category_name  }}</a></li>
                       
                    </ul>
                    
                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                      
                      	
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p>{!! $productDetails->details !!}<p>
                      	</div>
                      
                	</div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    
                    @foreach($getRelatedProducts as $index => $value)
                    
                	<div class="item">
                        <div class="product">
                            <div class="product_img">
                                <a href="{{route('products.details',$value->slug)}}">
                                    <img src="{{ url('images') }}/{{$value->images }}" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                       <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{route('products.details',$value->slug)}}">{{ $value->name }}</a></h6>
                                <div class="product_price">
                                    <span class="price">{{ $value->discount_price }}</span>
                                    <del>$55.25</del>
                                    <div class="on_sale">
                                        <span>@php  $sale =  ($value->base_price - $value->discount_price )/$value->base_price; echo round($sale*100, 0);   @endphp % Off</span>
                                    </div>
                                </div>
                                
                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
	<div class="container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
@stop