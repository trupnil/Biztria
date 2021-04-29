
<?php $__env->startSection('main-section'); ?>
<style type="text/css">
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }
</style>
<!-- START MAIN CONTENT -->
<div class="main_content">
<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"><i class="ti-lock"></i>Logout</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Dashboard</h3>
                                <p>Welcome : <b><?php echo e(Auth::user()->name); ?> </b></p>
                            </div>
                            <div class="card-body">
                                <p>From your account dashboard. you can easily check &amp; view your <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th colspan="3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $myOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>#<?php echo e($value->order_code); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($value->created_at)->format('j F Y h:i:s A')); ?></td>
                                                <td><?php echo e($value->status); ?></td>
                                                <td>&#8377;<?php echo e($value->total_amount); ?></td>
                                                <td><a href="<?php echo e(route('UserviewOrder',['order_code' => $value->order_code ])); ?>"  ><i class="fa fa-eye" aria-hidden="true" style="color:#ffc107"></i></a></td>
                                               
                                                <td> <a href="<?php echo e(route('generate-pdf',['order_code' =>$value->order_code ])); ?>" target="_blank"><i class="fa fa-print" aria-hidden="true" style="color:blue"></i></a></td>
                                                 <?php if($value->status == 'Pending' OR $value->status == 'Inprocess' ): ?>
                                                <td> <a href="<?php echo e(route('user-order-cancle',['order_code' =>$value->order_code ])); ?>" class="btn btn-danger btn-xs">cancle</a> </td>
                                                <?php endif; ?>
                                            </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                 <tr> 
                                                    <th><?php echo e($myOrders->links()); ?></th>
                                            
                                         </tr>
                                       
                                        </tbody>
                                            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h3>Billing Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" id="userBillingAddress" action="<?php echo e(route('billing_address_update')); ?>">
                                            <?php echo e(csrf_field()); ?>


                                        <address>
                                            <div class="form-group mb-0">
                        <textarea rows="2" class="form-control"  id="address_1" name="address_1" placeholder="Address line 1"><?php echo e(Auth::user()->address_1); ?></textarea>
                    </div>
                                            <br>
                                           <div class="form-group mb-0">
                        <textarea rows="2" class="form-control" id="address_line_2"  name="address_line_2" placeholder="Address line 2"><?php echo e(Auth::user()->address_line_2); ?></textarea>
                    </div><br>
                                            <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                                <option value="gujarat" <?php if(Auth::user()->state == "gujarat"): ?> selected <?php endif; ?>>Gujarat</option>
                                <option value="rajasthan"  <?php if(Auth::user()->state == "rajasthan"): ?> selected <?php endif; ?>>Rajasthan</option>
                                
                            </select>
                        </div>
                    </div><br>
                                            <div class="form-group">
                        <input class="form-control"  type="text" id="city" name="city" value="<?php echo e(Auth::user()->city); ?>"  placeholder="City/Town">
                    </div> <br>
                        <div class="form-group">
                        <input class="form-control"  type="text" id="zip" value="<?php echo e(Auth::user()->Zip); ?>" name="zip"  placeholder="Enter Zip code">
                    </div> <br>
                                           
                                     </address>
                                       
                                        <button  type="submit" class="btn btn-fill-out">Update</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Shipping Address</h3>
                                    </div>
                                    <div class="card-body">
                            <form action="<?php echo e(route('shipping_address_update')); ?>" id="userShipingAddress" method="POST" >
                                <?php echo e(csrf_field()); ?>

                                        <address>
                                            <div class="form-group mb-0">
                        <textarea rows="2" class="form-control" name="shipping_address_1" id="shipping_address_1" placeholder="Address line 1"> <?php echo e(Auth::user()->shipping_address_1); ?> </textarea>
                    </div>
                                            <br>
                                           <div class="form-group mb-0">
                        <textarea rows="2" class="form-control" id="shipping_address_2" name="shipping_address_2" placeholder="Address line 2"> <?php echo e(Auth::user()->shipping_address_2); ?> </textarea>
                    </div><br>
                                            <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control" id="shipping_state" name="shipping_state">
                                <option value="">Select State</option>
                               <option value="gujarat" <?php if(Auth::user()->shipping_state == "gujarat"): ?> selected <?php endif; ?>>Gujarat</option>
                                <option value="rajasthan"  <?php if(Auth::user()->shipping_state == "rajasthan"): ?> selected <?php endif; ?>>Rajasthan</option>
                            </select>
                        </div>
                    </div><br>
                                            <div class="form-group">
                        <input class="form-control" id="shipping_city"  type="text" value="<?php echo e(Auth::user()->shipping_city); ?>" name="shipping_city"  placeholder="City/Town">
                    </div> <br>
                        <div class="form-group">
                        <input class="form-control" id="shipping_zip"  type="text" name="shipping_zip" value="<?php echo e(Auth::user()->shipping_zip); ?>" placeholder="Enter Zip code">
                    </div> <br>
                                           
                                     </address>
                                       
                                        <button type="submit" class="btn btn-fill-out">Update</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                               
                                <form method="post" name="UseraccountDetailsValidation" id="UseraccountDetailsValidation" action="<?php echo e(route('userProfileUpdate')); ?>">

                                    <?php echo e(csrf_field()); ?>


                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name <span class="">*</span></label>
                                            <input  value="<?php echo e(Auth::user()->name); ?>" id="name" class="form-control" name="name" type="text">
                                         </div>
                                         <div class="form-group col-md-6">
                                            <label>Last Name <span class="">*</span></label>
                                            <input  value="<?php echo e(Auth::user()->last_name); ?>" id="last_name" class="form-control" name="last_name">
                                        </div>
                                       
                                        <div class="form-group col-md-12">
                                            <label>Email Address <span class="">*</span></label>
                                            <input  class="form-control" id="email" value="<?php echo e(Auth::user()->email); ?>" readonly="" name="email" type="email">
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit">Profile Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                           <div class="card">
                            <div class="card-header">
                                <h3>Change Password</h3>
                            </div>
                            <div class="card-body">
                               
                                <form method="post" name="enq" id="UserChangePasswordValidation" action="<?php echo e(route('updatePassword')); ?>">

                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                       
                                        <div class="form-group col-md-12">
                                            <label>Current Password <span class="">*</span></label>
                                            <input class="form-control" id="old_password" name="old_password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>New Password <span class="">*</span></label>
                                            <input class="form-control" id="new_password" name="new_password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Confirm Password <span class="">*</span></label>
                                            <input class="form-control" id="confirm_password" name="confirm_password" type="password">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                        <input type="text" ="" class="form-control rounded-0" placeholder="Enter Email Address">
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



<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="showOrder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <div class="background_bg h-100" data-img-src="assets/images/popup_img.jpg"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h4>Subscribe and Get 25% Discount!</h4>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new products.</p>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input name="email"  type="email" class="form-control rounded-0" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-fill-line btn-block text-uppercase rounded-0" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Screen Load Popup Section --> 



<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/user/dashboard/my_account.blade.php ENDPATH**/ ?>