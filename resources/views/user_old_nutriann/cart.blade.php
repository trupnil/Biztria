@extends('user.master')
@section('main-section')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
     <style>
         .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
     </style>
             
          <div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Qty</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%">Action</th>
						</tr>
					</thead>
					  <?php $total = 0 ?>
					 @if(Session::get('cart'))
					 @foreach(Session::get('cart') as $iteam)
					  <?php $total += $iteam['price'] * $iteam['quantity'] ?>
					  
					<tbody>
					    
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="/images/{{$iteam['photo'] }}" height="100px" width="100px" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
									   
										<h4> &nbsp;&nbsp;{{ $iteam['name']  }}</h4>
										
									</div>
								</div>
							</td>
							<td data-th="Price">&#x20b9;{{ $iteam['price'] }}</td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center quantity update-cart"   value="{{ $iteam['quantity'] }}" min="1" data-id="{{ $iteam['id']}}">
							</td>
							<td data-th="Subtotal" class="text-center">&#x20b9; {{ $iteam['quantity'] * $iteam['price']  }}</td>
							<td class="actions" data-th="">
								{{--<button class="btn btn-info btn-sm update-cart" data-id="{{ $iteam['id']}}"><i class="fa fa-refresh"></i></button>--}}
							
								<button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $iteam['id']}}"><i class="fa fa-trash-o"></i></button>						
							</td>
						</tr>
					</tbody>
					  @endforeach
					  
					<tfoot>
						
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total ₹{{ $total }}</strong></td>
							
							@auth
							<td><a href="{{route('checkout')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
							@endauth
							
							@guest
							<td><a href="{{route('user-login')}}" class="btn btn-success btn-block">@auth Checkout @endauth @guest Login @endguest <i class="fa fa-angle-right"></i></a></td>
							@endguest
							
						</tr>
					</tfoot>
					@endif
				</table>
</div>            
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
       <script type="text/javascript">
      
       $(document).ready(function(){
           
            $(".update-cart").click(function (e) {
               // alert();
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   
                 location.reload();
                  
               }
            });
        });
           
           $(".remove-from-cart").click(function (e) {
            
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
           
           
       });
        
           
      
    </script>
    
   
@stop

