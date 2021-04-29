@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<style type="text/css">
    label{
        font-weight: bold;
    }

    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }

</style>

@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>@if(isset($data->id)) Update @else Add @endif  Category</header>
                                     
                                </div>
                                <div class="card-body " id="bar-parent">
            <form method="POST" id="adminCategory" action="{{ (isset($data->id) ? route('update-category',$data->id) : route('add-category') ) }}
                                    ">
                                    @csrf
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Category Name</label>
                                            <input type="text" id="category_name" class="form-control" name="category_name"  value="{{old('category_name',$data->category_name)}}" placeholder="Enter Category Name">
                                        </div>
                            <button type="submit" class="btn btn-primary">@if(isset($data->id)) Update @else Add @endif Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    

                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Categories</header>
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
                                                <th>category name</th>
                                               
                                                <th>status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($Categories as $Category)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ ucfirst($Category->category_name) }}</td>
                                               
                                                <td>@if ($Category->status == 0)            <a href="{{route('category-status',["status" => 0 , "id" => $Category->id])}}">     
                                                     <span class="label label-sm label-danger"> Inactive </span>  </a> 
                                                    @else 
                                                    <a href="{{route('category-status',["status" => 1 , "id" => $Category->id])}}"> 
                                                    <span class="label label-sm label-success"> Active </span></a>   @endif </td>
                                                <td>
                                                    <a href="{{ route('edit-category',$Category->id) }}" class="label label-sm label-success" > Edit </a>
                                                    <a href="{{ route('delete-category',$Category->id) }}" class="label label-sm label-danger" > Delete</a>
                                                    
                                                </td>
                                                
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
<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush