@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
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
                                    <form method="POST" action="{{ route('store-slider') }}" enctype="multipart/form-data" > @csrf     
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card-head">
                                                        <header> Add Slider Images</header>
                                                         <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                                         
                                                </div>

                                            </div>
                                           
                                            
                                            
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-9">
                                               
                                      
                                      
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Slider  Image</label>
                                            <input type="file" class="form-control" name="slider_image">
                                                @if ($errors->has('slider_image'))
                                                        {{ $errors->first('slider_image') }}
                                                          @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" name="slider_text" value="1" >&nbsp;
                                            <label for="simpleFormEmail">Want to show slider content ?</label>
                                           
                                           
                                        </div>

                                      
                                         <div class="form-group">
                                            <label for="simpleFormEmail">H2 Tag Content</label>
                                            <input type="text" name="title_1" value="" class="form-control" name="base_price"  >
                                                       @if ($errors->has('title_1'))
                                                        {{ $errors->first('title_1') }}
                                                          @endif 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">H5 Tag Content</label>
                                            <input type="text" name="title_2" value="" class="form-control" name="base_price"  >
                                                       @if ($errors->has('title_2'))
                                                        {{ $errors->first('tittitle_2le_1') }}
                                                          @endif 
                                        </div>


                                        

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Banner Redirect Link</label>
                                            <input type="text" name="banner_link" value="" class="form-control" name="base_price"  >
                                                       @if ($errors->has('banner_link'))
                                                        {{ $errors->first('banner_link') }}
                                                          @endif 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Banner Position</label>
                                            <input type="number" name="position" value="" class="form-control" name="base_price"  >
                                                       @if ($errors->has('position'))
                                                        {{ $errors->first('position') }}
                                                          @endif 
                                        </div>



                                        </div>
                                          
                                      
                                    </form>

                                </div>

                                     
                            </div>

                      </div>
                    
                 

                    </div>


                  
                        @include('Admin.allbanners')

                 
              
                    
                  
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