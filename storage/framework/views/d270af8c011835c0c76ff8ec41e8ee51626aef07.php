
<!-- START FOOTER -->
<footer class="footer_dark">
	<div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="<?php echo e(url('Users_assets')); ?>/assets/images/<?php echo e($siteConfig->logo); ?>" alt="logo"/></a>
                        </div>
                        <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <?php if((!empty($siteConfig->facebook))): ?>
                             <li><a href="<?php echo e($siteConfig->facebook); ?>"><i class="ion-social-facebook"></i></a></li>   
                            <?php endif; ?>
                             <?php if((!empty($siteConfig->twitter))): ?>
                            <li><a href="<?php echo e($siteConfig->twitter); ?>"><i class="ion-social-twitter"></i></a></li>
                            <?php endif; ?>
                             <?php if((!empty($siteConfig->skype))): ?>
                            <li><a href="<?php echo e($siteConfig->skype); ?>"><i class="ion-social-skype"></i></a></li>
                            <?php endif; ?>
                             <?php if((!empty($siteConfig->pinterest))): ?>
                            <li><a href="<?php echo e($siteConfig->pinterest); ?>"><i class="ion-social-youtube-outline"></i></a></li>
                            <?php endif; ?>
                             <?php if((!empty($siteConfig->instagram))): ?>
                            <li><a href="<?php echo e($siteConfig->instagram); ?>"><i class="ion-social-instagram-outline"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Category</h6>
                        <ul class="widget_links">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Woman</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Best Saller</a></li>
                            <li><a href="#">New Arrivals</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Contact Info</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p><?php echo e((!empty($siteConfig->address)) ? $siteConfig->address : 'NA'); ?></p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href=""><?php echo e((!empty($siteConfig->email)) ? $siteConfig->email : 'NA'); ?></a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p><?php echo e((!empty($siteConfig->mobile)) ? $siteConfig->mobile : 'NA'); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left"><?php echo e($siteConfig->footer_text); ?></p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="<?php echo e(url('Users_assets')); ?>/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="<?php echo e(url('Users_assets')); ?>/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="<?php echo e(url('Users_assets')); ?>/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="<?php echo e(url('Users_assets')); ?>/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="<?php echo e(url('Users_assets')); ?>/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<?php /**PATH C:\xampp\htdocs\larastore\resources\views/user/common/footer.blade.php ENDPATH**/ ?>