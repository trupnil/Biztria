@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
                @include('flash-message')
                    
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Products List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Product Name</th>
                                                <th>Display Price</th>
                                                <th>Stock Status</th>
                                                <th>Status</th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($allproducts as $value)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                  <td> <img src="{{env('APP_URL')}}/images/{{ $value->images }}" height="60px" width="60px"> </td>
                                                 <td>{{ ucfirst($value->category->category_name) }}</td>
                                                 <td>{{ ucfirst($value->name) }}</td>
                                                <td><b>{{ ucfirst($value->discount_price) }}</b></td>
                                                <td>@if ($value->stock_status == 0) 
                                                <a href="{{route('product-stock-status',["status" => 0,"id" => $value->id])}}">
                                                     <span class="label label-sm label-danger"> Out Of Stock </span>  </a> 
                                                    @else 
                                                     <a href="{{route('product-stock-status',["status" => 1,"id" => $value->id])}}">
                                                    <span class="label label-sm label-success">Instock </span></a>  @endif </td>
                                              
                                                <td>@if ($value->status == 0)
                                                 <a href="{{route('product-status',["status" => 0,"id" => $value->id])}}">
                                                     <span class="label label-sm label-danger"> Inactive </span>   </a>
                                                    @else 
                                                    <a href="{{route('product-status',["status" => 1,"id" => $value->id])}}">
                                                    <span class="label label-sm label-success">Active </span> </a>  @endif </td>
                                               <td> <button class="btn btn-success btn-xs">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                            <a href="{{route('edit-products',$value->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a href="{{route('delete-product',$value->id)}}" onclick="confirmDelete()" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>
                                                           
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  
                </div>
            </div>
@endsection

@push('scripts')
<script>
function confirmDelete() {
  var txt;
  var r = confirm("Want to Delete ?");
 
}
</script>

<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush