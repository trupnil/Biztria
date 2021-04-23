@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Invoice</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Back</a>&nbsp;<i class="fa fa-angle-right"></i>
                                
                                <li class="active">Invoice</li>
                            </ol>
                        </div>
                    </div>
	                   <div class="row">
	                    <div class="col-md-12">
	                        <div class="white-box">
	                            <h3><b>INVOICE</b> <span class="pull-right">#{{$order->order_code}}</span></h3>

	                            <hr>
	                            <div class="row">
	                                <div class="col-md-12">
										<div class="pull-left">
											<address>
												<img src="{{url('Users_assets')}}/assets/images/logo_dark.png" width="120px" height="42.52px" alt="logo" class="logo-default" />
												<p class="font-weight-bold mb-4">Billing Address</p>
												<p class="text-muted m-l-5">
												    
													{{$order->order_address}}, <br>
													{{$order->city}}, <br>{{$order->order_zip}}
												</p>

												<p class="font-weight-bold mb-4">Order Details</p>

												 <p>Date : <b> {{ \Carbon\Carbon::parse($order->order_date)->format('j F, Y') }} </b> </p>
                            <p>Payment Type:<b> @if($order->payment == 'cod')  {{ "Pay On Delivery" }}@elseif($order->payment == 'online') {{ "Online" }}  @endif </b> </p>

                           
											</address>
										</div>
										<div class="pull-right text-right">
											<address>
												<p class="addr-font-h3">To,</p>
												<p class="addr-font-h4">{{$order->order_name}}</p>
											    <p class="addr-font-h4">{{$order->order_email}}</p>
                                                <p class="addr-font-h4">{{$order->order_phone}}</p>
                                                
												
											</address>
										</div>
										
										
										
									</div>
									<div class="col-md-12">
									    
											<address>
											    @if(!empty($order->order_notes))
											    <p class="font-weight-bold mb-4">Order Notes:-</p>
												<p class="text-muted m-l-5">{{$order->order_notes}}</p>
											   @endif
                                                
												
											</address>
										
										
									</div>
	                                <div class="col-md-12">
	                                    <div class="table-responsive m-t-40">
	                                        <table class="table table-hover">
	                                            <thead>
	                                                <tr>
	                                                    <th class="text-left">#</th>
	                                                    <th class="text-center"> Product Name</th>
	                                                    <th class="text-center"> Qty</th>
	                                                    <th class="text-right">Price</th>
	                                                    <th class="text-right">Sub Total</th>
	                                                </tr>
	                                            </thead>
	                                            <tbody>
	                                            	@php $srno = 0;  @endphp	
	                                            	@foreach(json_decode($order->order_products) as $key => $value)

	                                            	<tr>
	                                            		<td> {{ ++$srno  }} </td>
	                                            		<td> {{ $value->name }}  </td>
	                                            		<td>  {{ $value->quantity }} </td>
	                                            		<td> &#8377; {{ $value->price }} </td>
	                                            		<td> &#8377; {{ $value->price * $value->quantity }} </td>
		                                            	</tr>

	                                            	@endforeach
	                                               
	                                                
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="pull-right m-t-30 text-right">
	                                       <hr>
	                                        <h4><b>Grand Total :</b>&#8377;{{$order->total_amount}}</h4> </div>
	                                   
	                                  
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                </div>
            </div>
@endsection

@push('scripts')
<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush