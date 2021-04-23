 @extends('user.master')
@section('main-section')

<main id="content" role="main">
    <div class="container">
                    
                        <center><h1 class="h1 font-weight-bold">My Order</h1></center>
                    
                </div>
 <div class="container offset-md-1">
                <div class="row mb-8">
                   
                    <div class="col-lg-3 mb-5 mb-lg-8" style="border-right:solid;border-color:gray;">
                      <ul class="list-group list-group-flush">
   @include('user.common.user_link')
  
</ul>
                    </div>
                    
                     <div class="col-lg-9 mb-5 mb-lg-8" >
                         <div class="table-responsive">
                         <table id="cart" class="table table-bordered table-hover table-responsive table-condensed">
    				<thead>
						<tr>
							<th>Order Code</th>
							<th>Order name</th>
							<th>Product name</th>
							<th>Order Email</th>
							<th>Order Address</th>
							<th>Order Zip</th>
							<th>City</th>
							<th>Payment</th>
							<th>Status</th>
							<th>Order Date</th>
							<th>Action</th>
						</tr>
					</thead>
					 
					  
					<tbody>
					    @foreach($order as $data)
					    
					  
					    <tr>
					        <td>{{$data->order_code}}</td>
					        <td>{{$data->order_name}}</td>
					        
					        <td>{!! ($data->product_id) !!}</td>
					        
					        <td>{{$data->order_email}}</td>
					        <td>{{$data->order_address}}</td>
					        <td>{{$data->order_zip}}</td>
					        <td>{{$data->city}}</td>
					        <td>{{$data->payment}}</td>
					        <td>{{$data->status}}</td>
					        <td>{{$data->created_at}}</td>
					        <td><a href="{{route('get-invoice',$data->id)}}">Get Invoice</a></td>
					    </tr>
						@endforeach
					</tbody>
					 
					
					
				</table>
				</div>
                    </div>
                   
                </div>
               
            </div>
</main>

@stop
