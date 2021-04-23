
<?php $__env->startSection('main-section'); ?>
<!-- END MAIN CONTENT -->
<div class="main_content">

<style type="text/css">
    .offer_slider
    {
        padding: 20px 0 !important;
       position: relative;
    }
</style>


<?php echo $__env->make('user.common.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- START SECTION BANNER -->
<div class="section pb_20">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="single_banner">
                	<img src="<?php echo e(url('Users_assets')); ?>/assets/images/shop_banner_img1.jpg" alt="shop_banner_img1"/>
                    <div class="single_banner_info">
                        <h5 class="single_bn_title1">Super Sale</h5>
                        <h3 class="single_bn_title">New Collection</h3>
                        <a href="shop-left-sidebar.html" class="single_bn_link">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="single_banner">
                	<img src="<?php echo e(url('Users_assets')); ?>/assets/images/shop_banner_img2.jpg" alt="shop_banner_img2"/>
                    <div class="single_banner_info">
                        <h3 class="single_bn_title">New Season</h3>
                        <h4 class="single_bn_title1">Sale 40% Off</h4>
                        <a href="shop-left-sidebar.html" class="single_bn_link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->


<?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<!-- START SECTION SHOP -->
<div class="section offer_slider">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2><?php echo e($index); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "5"}}'>
                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="product">
                            <span class="pr_flash"><?php  $sale =  ($v->base_price - $v->discount_price )/$v->base_price; echo round($sale*100, 0);   ?> % Off </span>
                            <div class="product_img">
                                <a href="<?php echo e(route('products.details',$v->slug)); ?>">
                                    <img src="<?php echo e(url('images')); ?>/<?php echo e($v->images); ?>" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                  <?php if(empty($v->product_link)): ?>      
                            <li class="add-to-cart">
                                <a href="javascript:void(0)">

                                <i class="icon-basket-loaded" onclick="addToCart(<?php echo e($v->id); ?>,1)"></i> 
                                Add To Cart
                                </a>
                            </li>
                            <?php else: ?>
                             <li class="add-to-cart">
                                <a href="<?php echo e($v->product_link); ?>" target="_blank">

                                <i class="icon-basket-loaded"></i> 
                                Add To Cart
                                </a>
                            </li>
                            <?php endif; ?>

                                    <?php if(auth()->guard()->check()): ?>
                                     <li><a href="javascript:void(0);" onclick="addWishlist(<?php echo e($v->id); ?>,<?php echo e(Auth::user()->id); ?>)"><i class="icon-heart"></i></a></li>
                                    <?php endif; ?>

                                    <?php if(auth()->guard()->guest()): ?>
                                       
                                        <li><a href="javascript:void(0);"><i class="icon-heart" onclick="addToWishlist()"></i></a></li>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="<?php echo e(route('products.details',$v->slug)); ?>"><?php echo e($v->name); ?></a></h6>
                                <div class="product_price">
                                    <span class="price">&#8377;<?php echo e($v->discount_price); ?></span>
                                    <del>&#8377;<?php echo e($v->base_price); ?></del>
                                   
                                </div>
                               
                              
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
       
    </div>
</div>
<!-- END SECTION SHOP -->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- START SECTION SINGLE BANNER --> 
<div class="section bg_light_blue2 pb-0 pt-md-0">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-left">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">New season trends!</span>
                        <h2>Best Summer Collection</h2>
                    </div>
                    <h5 class="mb-4">Sale Get up to 50% Off</h5>
                    <a href="shop-left-sidebar.html" class="btn btn-fill-out rounded-0">Shop Now</a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="<?php echo e(url('Users_assets')); ?>/assets/images/tranding_img.png" alt="tranding_img"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER --> 



<!-- START SECTION SHOP INFO -->
<div class="section pb_70">
    	<div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Free Delivery</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-money-back"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>30 Day Return</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END SECTION SHOP INFO -->

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/user/index.blade.php ENDPATH**/ ?>