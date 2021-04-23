@extends('user.master')
@section('main-section')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
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
            <div class="col-lg-6">
                <div class="toggle_info">
                    <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                        <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="email" placeholder="Username Or Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                        <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                    </div>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="toggle_info">
                    <span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                </div>
                <div class="panel-collapse collapse coupon_form" id="coupon">
                    <div class="panel-body">
                        <p>If you have a coupon code, please apply it below.</p>
                        <div class="coupon field_form input-group">
                            <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4>Billing Details</h4>
                </div>
                <form method="post" action="{{ route('save-order') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" required class="form-control" name="order_name" @if(Auth::check()) ? value='{{ Auth::user()->name }}' : '' @endif   placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="order_lastname" placeholder="Last name *">
                    </div>
                   
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="order_address" required="" placeholder="Address *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="order_address2" required="" placeholder="Address line2">
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control" name="state">
                                <option value="">Select State</option>
                                <option value="AX">Gujarat</option>
                                <option value="AF">Rajasthan</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="city" placeholder="City / Town *">
                    </div>
                   
                    <div class="form-group">
                        <input class="form-control" required type="text" name="order_zip" placeholder="Postcode / ZIP *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="order_phone" @if(Auth::check()) ? value='{{ Auth::user()->mobile }}' : '' @endif placeholder="Phone *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="order_email" @if(Auth::check()) ? value='{{ Auth::user()->email }}' : '' @endif placeholder="Email address *">
                    </div>
                 
                    
                   
                    <div class="heading_s1">
                        <h4>Additional information</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" class="form-control" name="order_notes" placeholder="Order notes"></textarea>
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
                                @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <tr>
                                    <td>{{ $details['name'] }} <span class="product-qty">x {{ $details['quantity']  }}</span></td>
                                    
                                    <td>&#8377; {{ $details['price'] *  $details['quantity']  }}</td>
                                </tr>

                                @endforeach
                               
                             
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">&#8377;{{ $total }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total<span style="color: red">(*Including All taxes*)</span></th>
                                    <td class="product-subtotal">&#8377;{{ $total }}</td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                    <input type="hidden" name="total_amount" value="{{$total}}">
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Payment</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment" id="exampleRadios3" value="cod" checked="">
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

@stop

