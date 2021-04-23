
<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="<?php echo e(url('Users_assets')); ?>/assets/images/eng.png" data-title="English">Vadodara</option>
                               
                            </select>
                        </div>
                       
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>+91 8866174302</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-right">
                       	<ul class="header_list">
                            <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('my-wishlists')); ?>"><i class="fa fa-heart" aria-hidden="true" style="color:red;"></i><span>Wishlists</span></a></li>
                           <li><a href="<?php echo e(route('dashboard')); ?>"><i class="ti-user"></i><span><?php echo e(Auth::user()->name); ?> </span></a></li>
                           <li><a href="<?php echo e(route('logout')); ?>"><i class="ti-lock"></i><span>Logout</span></a></li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                        	<li><a href="<?php echo e(route('signup')); ?>"><i class="ti-user"></i><span>Sign up</span></a></li>
                            <li><a href="<?php echo e(route('login')); ?>"><i class="ti-user"></i><span>Login</span></a></li>
						  <?php endif; ?>
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
                    <img class="logo_light" src="<?php echo e(url('Users_assets')); ?>/assets/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="<?php echo e(url('Users_assets')); ?>/assets/images/logo_dark.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a  class="nav-link active" href="<?php echo e(url('/')); ?>">Home</a>
                             
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Our Collection</a>
                            <div class="dropdown-menu">
                                <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="<?php echo e(route('getproducts')); ?>">All PRODUCTS</a></li> 
                                <?php $__currentLoopData = $headerCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?php echo e(route('getproducts',["category_id" => $value->id])); ?>"><?php echo e(strtoupper($value->category_name)); ?></a></li> 
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <li class="dropdown cart_dropdown cart-items-header"  ><a class="nav-link cart_trigger" href="<?php echo e(route('show.cart')); ?>" data-toggle="dropdown" ><i class="linearicons-cart"></i><span class="cart_count"><?php echo e(count((array) session('cart'))); ?></span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right" >
                            <ul class="cart_list">

                                <?php $total = 0 ?>
                                <?php if(session('cart')): ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <li>
                                    <a href="#" class="item_remove remove-from-cart" data-id="<?php echo e($id); ?>"><i class="ion-close"></i></a>
                                    <a href="#"><img src="<?php echo e(url('images')); ?>/<?php echo e($details['photo']); ?>" alt="cart_thumb1"><?php echo e($details['name']); ?></a>
                                    <span class="cart_quantity"> <?php echo e($details['quantity']); ?> x <span class="cart_amount"> <span class="price_symbole">&#8377;</span></span><?php echo e($details['price']); ?></span>
                                </li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Total:</strong> <span class="cart_price"> <span class="price_symbole">&#8377;</span></span><?php echo e($total); ?></p>
                                <p class="cart_buttons"><a href="<?php echo e(url('cart')); ?>" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                            </div>
                            <?php else: ?>
                             <div class="cart_footer">
                                <center><p class="cart_total">Empty Cart</p></center>
                                
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER --><?php /**PATH C:\xampp\htdocs\larastore\resources\views/user/common/header.blade.php ENDPATH**/ ?>