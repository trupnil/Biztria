@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    
    .card-box:hover {
    -webkit-transform: translateY(-6px);
    transform: translateY(0px);
    -moz-box-shadow: 0 20px 20px rgba(0,0,0,.1);
    webkit-box-shadow: 0 0 25px -5px #9e9c9e;
    box-shadow: 0 0 25px -5px #9e9c9e;
}
.b-l{
    border-left: 1px dotted gainsboro;
}
h4{
    font-weight: 400;
}
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    display: none;
}
</style>
@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
                     @include('flash-message')
                     
  
<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-body " id="bar-parent">

                                       
                                    <form method="POST" action="{{ (isset($data->id) ? route('update-blog',$data->id) : route('blog.store') ) }}" enctype="multipart/form-data"  >
                                   
                                    @csrf
                                      
                                      <div class="row">
                                            <div class="col-md-10">
                                                <div class="card-head">
                                                    <header>@if(isset($data->id)) Update @else Add @endif New blog </header>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="text-align: right;">
                                                <button type="submit" class="btn btn-primary">@if(isset($data->id)) Update @else Publish @endif</button>
                                            </div>
                                        </div>
                                     <div class="row">
                                        <div class="col-md-9">
                                         <div class="form-group">
                                        <h4 for="simpleFormEmail"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: blue"></i> &nbsp;Title</h4>
                                        <input type="text" class="form-control" value="{{old('blog_title',$data->blog_title)}}" name="blog_title"  >
                                    </div>
                                      <div class="form-group">
                                        <h4 for="simpleFormEmail"><i class="fa fa-list-ol" aria-hidden="true" style="color: gray"></i>&nbsp;Description</h4>
                                         <textarea id="summernote" name="blog_details">{{ (!empty($data->blog_details)) ? $data->blog_details : '' }}</textarea>
                                    </div>
                                  </div>
                                        <div class="col-md-3 b-l">
                                            <div class="aa">
                                                <div class="form-group">
                                                    <h4><i class="fa fa-list-alt" aria-hidden="true" style="color: #1e293c"></i> &nbsp;Category</h4>
                                                    <select class="form-control" name="blog_category_id">
                                                    <option><-- Select Category --></option>
                                                 @foreach ($BlogCategories as $Category)
                                                        <option @if($data->blog_category_id == $Category->id ) selected  @endif value="{{$Category->id }}">{{ ucfirst($Category->blog_category_name) }}</option>
                                                    @endforeach 
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <h4><i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i>&nbsp; Status</h4>
                                                    <select class="form-control" name="status">
                                                    <option @if($data->status == '1' ) selected  @endif  value="1">Active</option>
                                                    <option @if($data->status == '0' ) selected  @endif  value="0">inactive</option>
                                                    </select>
                                                </div>
                                                @if($data->blog_images)
                                                <div class="form-group">
                                                    <label for="simpleFormEmail">Product current  Image</label>
                                                    <input type="text" readonly class="form-control" value="{{$data->blog_images}}" name="old_blog_images">
                                                    <img src="/blogimg/{{$data->blog_images }}" height="50px;" width="50px;">
                                                       
                                                </div>
                                                <div class="form-group">
                                                    <label for="simpleFormEmail">change  Image</label>
                                                    <input type="file" class="form-control" name="blog_images">
                                                        @if ($errors->has('blog_images'))
                                                                {{ $errors->first('blog_images') }}
                                                                  @endif
                                                </div>
                                                @else
                                                <div class="form-group">
                                                    <h4 for="simpleFormEmail"><i class="fa fa-picture-o" aria-hidden="true" style="color: #000"></i> &nbsp;Feature Image</h4>
                                                    <input type="file" class="form-control" name="blog_images" multiple=""  >
                                                </div>
                                                @endif
                                                
                                                <div class="form-group">
                                                    <h4 for="simpleFormEmail"><i class="fa fa-youtube" aria-hidden="true" style="color: red"></i>&nbsp;YouTube Video Link</h4>
                                                    <input type="text" class="form-control" value="{{old('blog_video_link',$data->blog_video_link)}}" name="blog_video_link" >
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>

                   @include('Admin.common.allblogs')
                  
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
