@extends('user.master')
@section('main-section')
   <main id="content" role="main">
       <div class="loader"></div>
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="">Home</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="">{{ $products->category->category_name }}</a></li>
                               <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $products->name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <!-- Single Product Body -->
                <div class="mb-14">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                            <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                                data-infinite="true"
                                data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                                data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                                data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                                data-nav-for="#sliderSyncingThumb">
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images }}" alt="Image Description">
                                </div>
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images1 }}" alt="Image Description">
                                </div>
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images2 }}" alt="Image Description">
                                </div>
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images3 }}" alt="Image Description">
                                </div>
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images4 }}" alt="Image Description">
                                </div>
                            </div>

                            <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                                data-infinite="true"
                                data-slides-show="5"
                                data-is-thumbs="true"
                                data-nav-for="#sliderSyncingNav">
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images }}" alt="Image Description">
                                </div>
                                @isset($products->images1)
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images1 }}" alt="Image Description">
                                </div>
                                @endisset
                                @isset($products->images2)
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images2 }}" alt="Image Description">
                                </div>
                                @endisset
                                @isset($products->images3)
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images3 }}" alt="Image Description">
                                </div>
                                @endisset
                                @isset($products->images4)
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{env('APP_URL')}}/images/{{$products->images4 }}" alt="Image Description">
                                </div>
                                @endisset
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                            <div class="mb-2">
                                {{--<a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $products->category->category_name }}</a>--}}
                                <h2 class="font-size-25 text-lh-1dot2">{{ $products->name }}</h2>
                                
                               
                                <div class="mb-2">
                                    <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                       <h4>available size </h4>

                                       {{  $products->size }}

                                    </ul>
                                </div>
                                <p>{!! $products->details  !!}</p>
                               
                            </div>
                        </div>
                        <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                            <div class="mb-2">
                                <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                                  
                                    <div class="mb-3">
                                        <div class="font-size-36">₹{{ $products->discount_price }}.00</div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="font-size-14">Quantity</h6>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col">
                                                    <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" id="qty" type="number" value="1">
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </div>
                                   
                                    <div class="mb-2 pb-0dot5">
                                        <a href="#" class="btn btn-block btn-primary-dark" onclick="addToCart({{$products->id}},document.getElementById('qty').value)"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                                    </div>
                                  
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Product Body -->
            </div>
        </main>
        <script> 
        $('#loadingDiv')
    .hide()  // Hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    })
;
        function addToCart(product_id,qty) {
            alert(qty)
	$(document)
		.ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
						.attr('content')
				}
			});
			$.ajax({
				type: 'POST',
				data: {
				    'qty':qty,
					'product_id': product_id,
					"_token": "{{ csrf_token() }}"
				},
				url: "{{url('addtocart')}}",
				success: function(response) {
					//alert(response);
					var obj = jQuery.parseJSON(response);
					var cart = "";
					$.each(obj, function(key, value) {
						cart += "<li>";
						cart += "<a href=''><img src=''>" + value.name + "</a>";
						cart += "<span>" + value.quantity + " × <span class='amount'>" + value.price + "</span></span></li>";
					});
					alert('Product Added in cart');
					$('#cart-data')
						.html(cart);
				}
			})
		});
} </script>
@stop