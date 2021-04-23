 @extends('user.master')
@section('main-section')

<main id="content" role="main">
    <div class="container">
                    
                        <center><h1 class="h1 font-weight-bold">My Rewards</h1></center>
                  
                </div>
 <div class="container offset-md-1">
                
                <div class="row">
                   
                    <div class="col-lg-3 mb-5 mb-lg-8" style="border-right:solid;border-color:gray;">
                      <ul class="list-group list-group-flush">
                          @include('user.common.user_link')
                    </ul>
                    </div>
                    
                     <div class="col-lg-9 mb-5 mb-lg-8">
                          <p><b>{{Auth::user()->email}}</b></br>
                          Your Rewards Point Collection : <h2>  {{Auth::user()->points}}    {{ (empty(Auth::user()->points)) ? "Oops!! You have no points Continue Shopping and get benifits" : Auth::user()->points }} </h2>
                          </p>
                    </div>
                   
               
               </div>
            </div>
</main>

@stop
