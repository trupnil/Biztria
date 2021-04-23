   <!-- ========== HEADER ========== -->
   <style>
       .dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}


.dropdown-menu {
    width: 300px !important;
    height: auto !important;
}

   </style>
        <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section">
                <!-- Topbar -->
                <div class="py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="flex-content-center">
                            <div class="font-size-13">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border"><a class="text-gray-90" title="30 days free return" href="#">START AN ORGANIC LIFESTYLE</a></li>
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border"><a class="text-gray-90" title="FREE SHIPPING  FOR OVER $40" href="#">FROM FARM TO KITCHEN</a></li>
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border"><a class="text-gray-90" title="BEST WORLDWIDE DELIVERY" href="#">MAY YOUR LIFE BE FILLED WITH NUTRIANN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Contact-Logo-Search-header-icons -->
                <div class="bg-primary">
                    <div class="py-2 px-xl-4">
                        <div class="row align-items-center mx-0">
                            <!-- Contact -->
                            <div class="d-none d-xl-block col-xl-5">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border mr-0">
                                        <a href="tel:+060800801858" class="u-header-topbar__nav-link"><i class="ec ec-phone mr-1"></i>1800 000 0000</a>
                                    </li>
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border">
                                        <a href="mailto:care@nutriann.com" class="u-header-topbar__nav-link"><i class="ec ec-mail mr-1"></i> care@nutriann.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Contact -->
                            <!-- Logo -->
                            <div class="col-auto col-xl-2">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0">
                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button" class="d-xl-none navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                        aria-controls="sidebarHeader"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarHeader1"
                                        data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->

                                    <!-- Logo -->
                                    <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mx-auto justify-content-center" href="" aria-label="Nutriann">
                                       <img src="{{asset('Users_assets')}}/Photo_1613810509665_6_170x50.png" width="120px" height="42.52px" >
                                       </a>
                                    <!-- End Logo -->
                                </nav>
                                <!-- End Nav -->
                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset pb-0">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                                    <button type="button" class="close ml-auto"
                                                        aria-controls="sidebarHeader"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-unfold-event="click"
                                                        data-unfold-hide-on-scroll="false"
                                                        data-unfold-target="#sidebarHeader1"
                                                        data-unfold-type="css-animation"
                                                        data-unfold-animation-in="fadeInLeft"
                                                        data-unfold-animation-out="fadeOutLeft"
                                                        data-unfold-duration="500">
                                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="" aria-label="Electro">
                                                             <img src="{{asset('Users_assets')}}/nutri.png" width="175.748px" height="42.52px" >
                                                             </a>
                                                        
                                                        <ul id="headerSidebarList" >
                                                           
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link"  href="{{url('/')}}" role="button" >
                                                                    Home
                                                                </a>

                                        
                                                            </li>
                                                            
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link" href="javascript:;" >
                                                                    Organic Products
                                                                </a>

                                                            </li>
                                                           
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link" href="{{ route('user.allblogs') }}" >
                                                                   Blogs
                                                                </a>

                                                               
                                                            </li>
                                                            
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link" href="javascript:;" >
                                                                    Rewarding Journey
                                                                </a>

                                                               
                                                            </li>
                                                          
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link" href="{{ route('about') }}" >
                                                                   About Us
                                                                </a>

                                                                
                                                            </li>
                                                           
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link" href="{{ route('contact') }}" >
                                                                    Contact
                                                                </a>

                                                                
                                                            </li>
                                                            
                                                            
                                                           
                                                        </ul>
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo -->
                            <!-- Search Bar -->
                            <div class="d-none d-xl-block col-xl-2gdot5">
                                <form class="js-focus-state max-width-244 ml-auto" method="post" action="{{route('search-product')}}">
                                    @csrf
                                    <label class="sr-only" for="searchproduct">Search</label>
                                    <div class="input-group border-bottom shadow-none placeholder-1 border-bottom-gray-18">
                                        <input type="text" class="form-control p-1 height-35 text-gray-90 shadow-none font-size-14 border-0 rounded-0 bg-transparent" name="search" id="searchproduct-item" placeholder="Search for products" aria-label="Search for products" aria-describedby="searchProduct1" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary height-35 p-1 rounded-right-pill" type="submit" id="searchProduct1">
                                                <span class="ec ec-search font-size-20"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->
                            <!-- Header Icons -->
                            <div class="col text-right pl-0 pl-xl-3 position-static col-xl-2gdot5">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0 align-items-center">
                                        <!-- Search -->
                                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Search"
                                                aria-controls="searchClassic"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-target="#searchClassic"
                                                data-unfold-type="css-animation"
                                                data-unfold-duration="300"
                                                data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true"
                                                data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <span class="ec ec-search"></span>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                                <form class="js-focus-state input-group px-3">
                                                    <input class="form-control" type="search" placeholder="Search Product">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Input -->
                                        </li>
                                        <!-- End Search -->
                                       
                                        
                                        
                                    </ul>
                                    
                                      <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    My Cart
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      <?php $total = 0 ?>
       @if(Session::get('cart'))
       <table class="table table-border">
     @foreach(Session::get('cart') as $iteam)
        <tr>
            <th><img src="/images/{{$iteam['photo'] }}" height="50px" width="50px" alt="..." class="img-responsive"/></th>
             <th>{{ $iteam['name'] }}&nbsp;<strong class="product-quantity">× {{ $iteam['quantity'] }}</strong></th>
             <th>&#x20b9; {{ $iteam['quantity'] * $iteam['price']  }}</th>
         </tr>
     <?php $total += $iteam['price'] * $iteam['quantity'] ?>
     @endforeach
     
                                     <tr>
                                                    <th></th>
                                                    <th>Total</th>
                                                    <th id="xyz"><strong>₹{{ $total }}</strong></th>
                                                </tr>
                                                
                                                
                                                
                                                </table>
                                                
                                               <center>
                                               <span> <a class="btn btn-sm btn-warning" href="{{route('cart')}}">View Cart</a></span>&nbsp;
                                               
                                               
                                               @auth
                                               <span> <a class="btn btn-sm btn-success" href="{{route('checkout')}}">Checkout</a></span>
                                               @endauth
                                               @guest
							<span> <a class="btn btn-sm btn-success" href="{{route('user-login')}}">@auth Checkout @endauth @guest Login @endguest </a></span>
							@endguest
                                                </center>
                                                @else
                                                
                                                <center><p><b>Your Cart is Empty</b></p></center>
                                                
                                                 @endif
  </div>
</div>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Contact-Logo-Search-header-icons -->

                <!-- Primary-menu -->
                <div class="d-none d-xl-block container">
                    <div class="py-1">
                        <!-- Nav -->
                        <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                            <!-- Navigation -->
                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                <ul class="navbar-nav u-header__navbar-nav justify-content-center" >
                                    <!-- Home -->
                                    
                                 <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="{{ route('home') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="featuresSubMenu">Home</a>
                                </li>
                                <li class="nav-item hs-has-sub-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut">
                                        <a id="blogMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">Organic Products</a>
                                        
                                        <!-- Blog - Submenu -->
                                        <ul id="blogSubMenu" class="hs-sub-menu u-header__sub-menu animated fadeOut" aria-labelledby="blogMegaMenu" style="min-width: 230px; display: none;">
                                            @foreach($headerCategories as $index)
                                              
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="{{route('getProducsCategoryWise',$index->id)}}">{{$index->category_name}}</a>
                                           
                                            </li>
                                            @endforeach
                                            
                                            </form>
                                        </ul>
                                        <!-- End Submenu -->
                                    </li>
                                
                                
                                <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="{{ route('user.allblogs') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="featuresSubMenu">Blogs</a>
                                </li>
                                 <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="" aria-haspopup="true" aria-expanded="false" aria-labelledby="featuresSubMenu">Rewarding Journey</a>
                                </li>
                                <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="{{ route('about') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="featuresSubMenu">About Us</a>
                                </li>
                                <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="{{ route('contact') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="featuresSubMenu">Contact</a>
                                </li>
                                @if(Auth::guard('web')->check())
                                
                                
                                
                                <li class="nav-item hs-has-sub-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut">
                                        <a id="accMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="accSubMenu">My Account</a>
                                        
                                        <!-- Blog - Submenu -->
                                        <ul id="accSubMenu" class="hs-sub-menu u-header__sub-menu animated fadeOut" aria-labelledby="accMenu" style="min-width: 230px; display: none;">
                                           
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="javascript:void(0);">Namste,&nbsp;<b>{{Auth::user()->name}}</b></a>
                                           
                                            </li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="{{ route('user-orders') }}">My Orders</a>
                                           
                                            </li>
                                            
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="{{route('user-logout')}}">Logout</a>
                                           
                                            </li>
                                            
                                            
                                            </form>
                                        </ul>
                                        <!-- End Submenu -->
                                    </li>
                                
                                
                                
                                
                                
                                @else
                                <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="{{ route('user-login') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="featuresSubMenu">Login</a>
                                </li>
                                @endif

                                  
                                </ul>
                                
                            </div>
                            
                            <!-- End Navigation -->
                        </nav>
                        <!-- End Nav -->
                    </div>
                </div>
                <!-- End Primary-menu -->
            </div>
        </header>
        <!-- ========== END HEADER ========== -->
        <div class="collapse" id="collapseExample">
  <div class="card card-body">
      <ul class="sub-menu" id="hide" style="margin-left:338px;">
	                                <li class="nav-item ">
	                                    <a href="" class="nav-link ">
	                                        <span class="title">card List</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>

	                                <li class="nav-item ">
	                                    <a href="" class="nav-link ">
	                                        <span class="title">card Report</span>
	                                        <span class="selected"></span>
	                                    </a>
	                                </li>   
								</ul>
  </div>
</div>