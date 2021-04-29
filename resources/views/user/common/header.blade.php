
<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">

                         <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>{{ $siteConfig->store_name }}</span></li>
                        </ul>
                        <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="{{url('Users_assets')}}/assets/images/eng.png" data-title="English">{{ $siteConfig->location }}</option>
                               
                            </select>
                        </div>
                       
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>{{ $siteConfig->mobile }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-right">
                       	<ul class="header_list">
                            @auth
                            <li><a href="{{ route('my-wishlists') }}"><i class="fa fa-heart" aria-hidden="true" style="color:red;"></i><span>Wishlists</span></a></li>
                           <li><a href="{{ route('dashboard') }}"><i class="ti-user"></i><span>{{ Auth::user()->name }} </span></a></li>
                           <li><a href="{{ route('logout') }}"><i class="ti-lock"></i><span>Logout</span></a></li>
                            @endauth
                            @guest
                        	<li><a href="{{ route('signup') }}"><i class="ti-user"></i><span>Sign up</span></a></li>
                            <li><a href="{{ route('login') }}"><i class="ti-user"></i><span>Login</span></a></li>
						  @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="{{url('Users_assets')}}/assets/images/{{$siteConfig->logo}}" alt="logo" />
                    <img class="logo_dark" src="{{url('Users_assets')}}/assets/images/{{$siteConfig->logo}}" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a  class="nav-link active" href="{{ url('/') }}">Home</a>
                             
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Our Collection</a>
                            <div class="dropdown-menu">
                                <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="{{ route('getproducts') }}">All PRODUCTS</a></li> 
                                @foreach($headerCategories as $value)
                                    <li><a class="dropdown-item nav-link nav_item" href="{{ route('getproducts',["category_id" => $value->id]) }}">{{ strtoupper($value->category_name) }}</a></li> 
                                   @endforeach
                                </ul>
                            </div>
                        </li>
                         <li><a class="nav-link nav_item" href="contact.html">Blogs</a></li> 
                        <li><a class="nav-link nav_item" href="contact.html">About </a></li> 
                        <li><a class="nav-link nav_item" href="contact.html">Contact Us</a></li> 
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown cart-items-header"  ><a class="nav-link cart_trigger" href="{{ route('show.cart') }}" data-toggle="dropdown" ><i class="linearicons-cart"></i><span class="cart_count">{{ count((array) session('cart')) }}</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right" >
                            <ul class="cart_list">

                                <?php $total = 0 ?>
                                @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <li>
                                    <a href="#" class="item_remove remove-from-cart" data-id="{{ $id }}"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{url('images')}}/{{ $details['photo'] }}" alt="cart_thumb1">{{ $details['name'] }}</a>
                                    <span class="cart_quantity"> {{ $details['quantity']  }} x <span class="cart_amount"> <span class="price_symbole">&#8377;</span></span>{{ $details['price'] }}</span>
                                </li>
                               @endforeach
                               
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Total:</strong> <span class="cart_price"> <span class="price_symbole">&#8377;</span></span>{{ $total }}</p>
                                <p class="cart_buttons"><a href="{{ url('cart') }}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                            </div>
                            @else
                             <div class="cart_footer">
                                <center><p class="cart_total">Empty Cart</p></center>
                                
                            </div>
                            @endif
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->