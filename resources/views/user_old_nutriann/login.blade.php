@extends('user.master')
@section('main-section')
          <main id="content" role="main">
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My Account</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <div class="mb-4">
                    <h1 class="text-center">Login/Registration</h1>
                     @include('flash-message')
                </div>
                <div class="my-4 my-xl-8">
                    <div class="row">
                        <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-6">
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Login</h3>
                            </div>
                            <p class="text-gray-90 mb-4">Welcome back! Sign in to your account.</p>
                            <!-- End Title -->
                            <form class="js-validate" novalidate="novalidate"  method="post" action="{{ route('user-auth') }}" >

                                 @csrf
                               
                            <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Email address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Username or Email address" aria-label="Username or Email address" required
                                    data-msg="Please enter a valid email address."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrPasswordExample2">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                                <!-- End Form Group -->

                               
                               

                                <!-- Button -->
                                <div class="mb-1">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                                    </div>
                                    <div class="mb-2">
                                        <a class="text-blue" href="#"  data-toggle="modal" id="btnModel" data-target="#myModal" >Lost your password?</a>
                                    </div>
                                </div>
                                <!-- End Button -->
                            </form>
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                            <div class="flex-content-center h-100">
                                <div class="width-1 bg-1 h-100"></div>
                                <div class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">or</div>
                            </div>
                        </div>
                        <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-6">
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Register</h3>
                            </div>
                            <p class="text-gray-90 mb-4">Create new account today to reap the benefits of a personalized shopping experience.</p>
                            <!-- End Title -->
                            <!-- Form Group -->
                            <form class="js-validate" novalidate="novalidate" method="POST"  action="{{ route('user-registration') }}">
                                 @csrf


                                  <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name"  placeholder="Enter Name"  required >
                                    @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Mobile
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="mobile"  placeholder="Enter Mobile"  required >
                                    @if($errors->has('mobile'))
                                    <div class="error">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->
                                <div class="js-form-message form-group mb-5">
                                    <label class="form-label" for="RegisterSrEmailExample3">Email address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="RegisterSrEmailExample3" placeholder="Email address" aria-label="Email address" required
                                    data-msg="Please enter a valid email address."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                    @if($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->
                                 <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrPasswordExample2">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                    @if($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->
                               
                                <!-- Button -->
                                <div class="mb-6">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Register</button>
                                    </div>
                                </div>
                                <!-- End Button -->
                            </form>
                            <h3 class="font-size-18 mb-3">Sign up today and you will be able to :</h3>
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Speed your way through checkout</li>
                                <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Track your orders easily</li>
                                <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Keep a record of all your purchases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lost your password </h5>
                <button type="button" disable class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('forgot-password')}}"> @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="simpleFormEmail"><strong>Email</strong></label>
                                <input type="text" class="form-control" value="" required name="email" placeholder="Enter email" data-validator="required">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="save" diable="false" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop  
    



    