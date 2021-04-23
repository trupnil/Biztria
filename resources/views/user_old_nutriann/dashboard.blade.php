 @extends('user.master')
@section('main-section')

<main id="content" role="main">
    <div class="container">
                    
                        <center><h1 class="h1 font-weight-bold">My Account</h1></center>
                  
                </div>
 <div class="container offset-md-1">
                
                <div class="row">
                   
                    <div class="col-lg-3 mb-5 mb-lg-8" style="border-right:solid;border-color:gray;">
                      <ul class="list-group list-group-flush">
                          @include('user.common.user_link')
                    </ul>
                    </div>
                    
                     <div class="col-lg-9 mb-5 mb-lg-8">
                          <h4>Hello, </h4>
                          <p><b>{{Auth::user()->email}}</b></br>
                          From your account dashboard you can view your recent orders, and edit your password and account details.</p>
                    </div>
                   
               
               </div>
            </div>
</main>

@stop
