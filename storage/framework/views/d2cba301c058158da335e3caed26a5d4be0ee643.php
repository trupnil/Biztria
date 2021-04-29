
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
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4>Billing Details</h4>
                </div>
                <form method="post" id="userCheckout" action="<?php echo e(route('save-order')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input type="text"  class="form-control" id="order_name" name="order_name" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->name); ?>' : '' <?php endif; ?>   placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text"  class="form-control" id="order_lastname" name="order_lastname" placeholder="Last name *">
                    </div>
                   
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="order_address" name="order_address"  placeholder="Address *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="order_address2" name="order_address2"  placeholder="Address line2">
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Rajasthan">Rajasthan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="city"  type="text" name="city" placeholder="City / Town *">
                    </div>
                   
                    <div class="form-group">
                        <input class="form-control"  id="order_zip" type="text" name="order_zip" placeholder="Postcode / ZIP *">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  id="order_phone" type="text" name="order_phone" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->mobile); ?>' : '' <?php endif; ?> placeholder="Phone *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="order_email" type="text" name="order_email" <?php if(Auth::check()): ?> ? value='<?php echo e(Auth::user()->email); ?>' : '' <?php endif; ?> placeholder="Email address *">
                    </div>
                 
                    
                   
                    <div class="heading_s1">
                        <h4>Additional information</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" class="form-control" id="order_notes" name="order_notes" placeholder="Order notes"></textarea>
                    </div>
               
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $total = 0 ?>
                                <?php if(session('cart')): ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <tr>
                                    <td><?php echo e($details['name']); ?> <span class="product-qty">x <?php echo e($details['quantity']); ?></span></td>
                                    
                                    <td>&#8377; <?php echo e($details['price'] *  $details['quantity']); ?></td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                             
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">&#8377;<?php echo e($total); ?></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total<span style="color: red">(*Including All taxes*)</span></th>
                                    <td class="product-subtotal">&#8377;<?php echo e($total); ?></td>
                                </tr>
                            </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>
                    <input type="hidden" name="total_amount" value="<?php echo e($total); ?>">
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Payment</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input"  type="radio" name="payment" id="exampleRadios3" value="cod" checked="">
                                <label class="form-check-label" for="exampleRadios3">Pay On Delivery</label>
                                <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="online">
                                <label class="form-check-label" for="exampleRadios4">Online Payment</label>
                                <p data-method="option4" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                            
                        </div>

                         
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                    </form>
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
                        <input type="text"  class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/user/checkout.blade.php ENDPATH**/ ?>