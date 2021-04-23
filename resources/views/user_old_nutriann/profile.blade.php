 @extends('user.master')
@section('main-section')

<main id="content" role="main">
    <div class="container">
                    
                        <center><h1 class="h1 font-weight-bold">My Profile</h1></center>
                    
                </div>
 <div class="container offset-md-1">
                <div class="row mb-8">
                   
                    <div class="col-lg-3 mb-5 mb-lg-8" style="border-right:solid;border-color:gray;">
                      <ul class="list-group list-group-flush">
   @include('user.common.user_link')
  
</ul>
                    </div>
                    
                     <div class="col-lg-9 mb-5 mb-lg-8">
                         @include('flash-message')
                         <div class="container">
                
                    <div class="row">
                        <div class="col-md-5   mr-md-auto mr-xl-0 mb-8 mb-md-0" >
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-6">
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Profile</h3>
                            </div>
                            <!-- End Title -->
                            <form class="js-validate" novalidate="novalidate"  method="post" action="{{ route('profile-update') }}" >

                                 @csrf
                               
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Name
                                        
                                    </label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" 
                                    >
                                </div>
                                <!-- End Form Group -->
                                
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Mobile
                                        
                                    </label>
                                    <input type="text" class="form-control" name="mobile" value="{{Auth::user()->mobile}}" >
                                </div>
                                <!-- End Form Group -->
                                
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Email address
                                        
                                    </label>
                                    <input type="email" class="form-control" name="email" readonly="" value="{{Auth::user()->email}}" >
                                </div>
                                <!-- End Form Group -->

                                
                                <!-- Button -->
                                <div class="mb-1">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Update</button>
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
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Change Password</h3>
                            </div>
                            
                            <form class="js-validate" novalidate="novalidate" method="POST"  action="{{route('update-password')}}">
                                 @csrf


                                  <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Old Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control" name="old_password"  placeholder="Enter Password"  required >
                                    @if($errors->has('old_password'))
                                    <div class="error">{{ $errors->first('old_password') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->
                                
                                 <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">New Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control" name="new_password"  placeholder="Enter Password"  required >
                                    @if($errors->has('new_password'))
                                    <div class="error">{{ $errors->first('new_password') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->
                                
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Confirm Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control" name="confirm_password"  placeholder="Enter Password"  required >
                                    @if($errors->has('confirm_password'))
                                    <div class="error">{{ $errors->first('confirm_password') }}</div>
                                    @endif
                                </div>
                                <!-- End Form Group -->
                                
                                

                               
                               
                                <!-- Button -->
                                <div class="mb-6">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Change Password</button>
                                    </div>
                                </div>
                                <!-- End Button -->
                            </form>
                        
                        </div>
                    </div>
                
            </div>
                    </div>
                   
                </div>
               
            </div>
</main>

@stop
