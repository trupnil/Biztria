@extends('user.master')
@section('main-section')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Register</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="post" action="{{ route('user-registration') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="name" placeholder="Enter Your Name">
                                 @error('name')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="email" placeholder="Enter Your Email">
                                 @error('email')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                             <div class="form-group">
                                <input type="text" required="" class="form-control" name="mobile" placeholder="Enter Your Mobile">
                                 @error('mobile')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                  @error('password')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password_confirmation" placeholder="Confirm Password">
                                  @error('password_confirmation')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" checked="" readonly="" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Be A Memeber</button>
                            </div>
                        </form>
                       
                        <div class="form-note text-center">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

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
@stop

