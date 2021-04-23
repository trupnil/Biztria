@extends('user.master')
@section('main-section')


 <main id="content" role="main" class="checkout-page">
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="">Home</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <div class="mb-5">
                    <h1 class="text-center">Checkout</h1>
                </div>
               @include('flash-message')
                
                <form class="js-validate" name="registration" method="post" action="{{route('order')}}" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="pl-lg-3 ">
                                <div class="bg-gray-1 rounded-lg">
                                    <!-- Order Summary -->
                                    <div class="p-4 mb-4 checkout-table">
                                        <!-- Title -->
                                        <div class="border-bottom border-color-1 mb-5">
                                            <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                                        </div>
                                        <!-- End Title -->

                                        <!-- Product Content -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                           
                                                <?php $total = 0; 
                                                $product = array(); ?>
					 @if(Session::get('cart'))
					 @foreach(Session::get('cart') as $iteam)
					 <?php $total += $iteam['price'] * $iteam['quantity'] ?>
					 <?php $product[] = $iteam['name']; ?>
					 
                                                <tr class="cart_item">
                                                    
                                                    <input type="hidden" id="quantity" name="product_id" value="{{ $iteam['quantity']  }}">
                                                    
                                                    <td>{{ $iteam['name']  }}&nbsp;<strong class="product-quantity">× {{ $iteam['quantity'] }}</strong></td>
                                                    <td>&#x20b9; {{ $iteam['quantity'] * $iteam['price']  }}</td>
                                                </tr>
                                               
                                           
                                             @endforeach
                                                
                                               
                                              </tbody>
                                              
                                               @if(Auth::user()->points >= 100)
                                                
                                                    <tr>
                                                         <th>Eligible For Redeem</th>
                                                         <td>  <input type="number" class="form-control" id="points" name="points" max="{{ Auth::user()->points}}" value="{{ Auth::user()->points   }}" >
                                                         <input type="hidden" name="user_points" id="user_points" value="{{ Auth::user()->points   }}">
                                                         </td>
                                                         <td><button class="btn  btn-sm btn-primary" type="button" id="cal"> Redeem </button></td>
                                                @endif
                                            <tfoot>
                                              
                                                <tr>
                                                    <th>Total</th>
                                                    <input type="hidden" id="product_id" name="product_id" value="{{ implode(',',$product) }}">
                                                    <input type="hidden" id="price" name="product_id" value="{{ $total }}">
                                                    <td id="xyz"><strong>₹{{ $total }}</strong></td>
                                                </tr>
                                            </tfoot>
                                            	@endif
                                        </table>
                                        <!-- End Product Content -->
                                        <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                            <!-- Basics Accordion -->
                                            <div id="basicsAccordion1">
                                                <!-- Card -->
                                                <div class="border-bottom border-color-1 border-dotted-bottom">
                                                    <div class="p-3" id="basicsHeadingOne">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="payment" name="payment" value="online" checked>
                                                            <label class="custom-control-label form-label" for="stylishRadio1"
                                                                data-toggle="collapse"
                                                                data-target="#basicsCollapseOnee"
                                                                aria-expanded="true"
                                                                aria-controls="basicsCollapseOnee">
                                                                Pay Online
                                                            </label>
                                                            
                                                        </div>
                                                    </div>
                                                    <div id="basicsCollapseOnee" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                        aria-labelledby="basicsHeadingOne"
                                                        data-parent="#basicsAccordion1">
                                                        <div class="p-4">
                                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Card -->

                                               
                                                
                                            </div>
                                            <!-- End Basics Accordion -->
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="abc" required
                                                    data-msg="Please agree terms and conditions."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                <label class="form-check-label form-label" for="defaultCheck10">
                                                    I have read and agree to the website <a href="#" class="text-blue">terms and conditions </a>
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                                        <button type="submit" id="check_out" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Place order</button>
                                    </div>
                                    <!-- End Order Summary -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 order-lg-1">
                            <div class="pb-7 mb-7">
                                <!-- Title -->
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                                </div>
                                <!-- End Title -->

                                <!-- Billing Form -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                First name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="name" name="order_name" value="{{Auth::user()->name}}" aria-label="Jack" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                  

                                    <div class="w-100"></div>

                                   

                                    <div class="col-md-12">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Street address
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" required=""  id="address" name="order_address" placeholder="470 Lucy Forks" aria-label="470 Lucy Forks" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                  
                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                City
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" required="" id="city" name="city" placeholder="London" aria-label="London" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Postcode/Zip
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" required="" id="zip" name="order_zip" placeholder="99999" aria-label="99999" required="" data-msg="Please enter a postcode or zip code." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="w-100"></div>

                                    <div class="col-md-12">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                State
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control js-select selectpicker dropdown-select" required="" id="state" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control border-color-1 font-weight-normal">
                                                <option value="">Select state</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                <option value="Daman and Diu">Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Puducherry">Puducherry</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Email address
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}" >
                                            <input type="email" class="form-control"  id="email" name="order_email" value="{{Auth::user()->email}}" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Phone
                                            </label>
                                            <input type="text" class="form-control" id="phone" name="order_phone" value="{{Auth::user()->mobile}}" aria-label="+1 (062) 109-9222" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="w-100"></div>
                                </div>
                              
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Order notes (optional)
                                    </label>

                                    <div class="input-group">
                                        <textarea class="form-control p-5" id="notes" rows="4" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
var SITEURL = '{{URL::to('')}}';

//var dha = SITEURL + '/paysuccess';
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
}); 
$('#check_out').on('click', function(e){

if($("#abc").prop("checked") == false)
{
    $('#abc').after('<div class="red">Required</div>');
    return false;
}
else($("#abc").prop("checked") == true)
{
    $("#abc").next(".red").remove();
}
var totalAmount = $("#price").val();
var product_id = $("#product_id").val();

var name = $("#name").val();
var product_id = $("#product_id").val();
var quantity = $("#quantity").val();
var mobile_number = $("#phone").val();
if(mobile_number.length == 0){
        $('#phone').after('<div class="red">mobile number is Required</div>');
        return false;
    }else {
        $('#phone').next(".red").remove(); // *** this line have been added ***
        
    }
var email =$("#email").val();
if(email.length == 0){
        $('#email').after('<div class="red">email is Required</div>');
        return false;
    }else {
        $('#email').next(".red").remove(); // *** this line have been added ***
        
    }
var state = $("#state").val();
if(state.length == 0){
        $('#state').after('<div class="red">state is Required</div>');
        return false;
    }else {
        $('#state').next(".red").remove(); // *** this line have been added ***
        
    }
var address = $("#address").val();
if(address.length == 0){
        $('#address').after('<div class="red">Address is Required</div>');
        return false;
    }else {
        $('#address').next(".red").remove(); // *** this line have been added ***
        
    }
var city = $("#city").val();
if(city.length == 0){
        $('#city').after('<div class="red">city is Required</div>');
        return false;
    }else {
        $('#city').next(".red").remove(); // *** this line have been added ***
        
    }
var zip = $("#zip").val();
if(zip.length == 0){
        $('#zip').after('<div class="red">zip is Required</div>');
        return false;
    }else {
        $('#zip').next(".red").remove(); // *** this line have been added ***
        
    }
var note = $("textarea#notes").val();
//("textarea#message").val();
var user_id = $("#user_id").val();

var payment = $("#payment").val();
alert(product_id);


var options = {
// "key": "rzp_test_iTDEIO9RmVnpdA",
"key": "rzp_test_PozlmEjlpdef1M",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "nutriann.com",
"description": "nutriann.com",
"image": "{{url('Common/logo.png')}}",

"handler": function (response){
    //alert(response.razorpay_payment_id);
        
    $.ajax({
            url:"{{url('shopping/paysuccess')}}",
            method: 'get',
            dataType: 'json',
            data: {
            razorpay_payment_id: response.razorpay_payment_id ,address: address, city: city, zip: zip, email: email, phone: mobile_number,
            totalAmount: totalAmount,name: name,user_id: user_id,payment:payment,notes : note,product_id :product_id,
            }, 

            success:function(data) {
                alert(response.razorpay_payment_id);
               alert(data);
            window.location.href = "{{url('shopping/razor-thank-you')}}";
            }
        })
        
    
    
},
"prefill": {
"contact": mobile_number,
"email":   'email',
},
"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        $.ajax({
            url:"{{url('shopping/payfail')}}",
            method: 'get',
            dataType: 'json',
            data: {
            razorpay_payment_id: response.razorpay_payment_id , email:email,mobile_number:mobile_number,
            totalAmount : totalAmount,name:names,user_id:user_id
            }, 
            success:function(data) {
                //alert(data);
               
            window.location.href = "{{url('razor-thank-you')}}";
            }
        })
        
        
});

rzp1.open();
e.preventDefault();
});

$('#cal').on('click', function(e){

var points = $("#points").val();

var userPoints = $("#user_points").val();


     $.ajax({
            url:"{{url('shopping/redeem')}}",
            method: 'get',
            dataType: 'json',
            data: {
            point: points , userPoints:userPoints,
            }, 

            success:function(data) {
                //alert(response.razorpay_payment_id);
               //alert(data);
               var totalAmount = $("#price").val();
               
               var abc = totalAmount - data;
               
              $('#xyz').html(abc);
               $('#price').val(abc);
                
            }
        })

    

});
</script>
   
@stop

