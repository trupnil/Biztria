@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
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
                                
                                <div class="card-body " id="bar-parent">
                <form method="POST" @if(isset($data->id)) id="adminEditProductValidation" @else id="adminAddProductValidation" @endif   action="{{ (isset($data->id) ? route('update-products',$data->id) : route('store-products') ) }}" enctype="multipart/form-data" > @csrf     
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card-head">
                                                        <header>@if(isset($data->id)) Update @else Add @endif   Products</header>
                                         
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-primary" style="float: right;">@if(isset($data->id)) Update @else Submit @endif</button>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                        <label for="simpleFormEmail">Product Name</label>
                                                        <input type="text" id="name" class="form-control" value="{{old('name',$data->name)}}" name="name"  >
                                                        @if ($errors->has('name'))
                                                        {{ $errors->first('name') }}
                                                          @endif
                                                    </div>
                                       @if($data->images)
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Main Image</label>
                                            <input type="hidden" readonly class="form-control" value="{{$data->images}}" name="old_images"><br>
                                            <img src="{{env('APP_URL')}}//images/{{$data->images }}" height="100px;" width="100;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Main Image</label>
                                            <input type="file" class="form-control" id="images" name="images">
                                                @if ($errors->has('images'))
                                                        {{ $errors->first('images') }}
                                                          @endif
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Product Main Image</label>
                                            <input type="file" class="form-control" name="images">
                                                @if ($errors->has('images'))
                                                        {{ $errors->first('images') }}
                                                          @endif
                                        </div>
                                        @endif
                                        
                                        
                                        
                                        @if($data->images1)
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image1</label>
                                            <input type="hidden" readonly class="form-control" value="{{$data->images1}}" name="old_images1"><br>
                                            <img src="{{env('APP_URL')}}//images/{{$data->images1 }}" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change  Image 1</label>
                                            <input type="file" class="form-control" id="images1" name="images1">
                                                @if ($errors->has('images1'))
                                                        {{ $errors->first('images1') }}
                                                          @endif
                                        </div>
                                        @else
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Product Image1</label>
                                            <input type="file" class="form-control" id="images1" name="images1">
                                                @if ($errors->has('images1'))
                                                        {{ $errors->first('images1') }}
                                                          @endif
                                    </div>
                                    
                                    @endif
                                    
                                    @if($data->images2)
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image2</label>
                                            <input type="hidden" readonly class="form-control" value="{{$data->images2}}" name="old_images2"><br>
                                            <img src="{{env('APP_URL')}}//images/{{$data->images2 }}" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 2</label>
                                            <input type="file" class="form-control" id="images2" name="images2">
                                                @if ($errors->has('images2'))
                                                        {{ $errors->first('images2') }}
                                                          @endif
                                        </div>
                                        @else
                                                
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image2</label>
                                            <input type="file" class="form-control" id="images2" name="images2">
                                                @if ($errors->has('images2'))
                                                        {{ $errors->first('images2') }}
                                                          @endif
                                                </div>
                                                @endif
                                                
                                                 @if($data->images3)
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image3</label>
                                            <input type="hidden" readonly class="form-control" value="{{$data->images3}}" name="old_images3"><br>
                                            <img src="{{env('APP_URL')}}//images/{{$data->images3 }}" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 3</label>
                                            <input type="file" class="form-control" id="images3" name="images3">
                                                @if ($errors->has('images3'))
                                                        {{ $errors->first('images3') }}
                                                          @endif
                                        </div>
                                        @else
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image3</label>
                                            <input type="file" class="form-control" id="images3" name="images3">
                                                @if ($errors->has('images3'))
                                                        {{ $errors->first('images3') }}
                                                          @endif
                                                </div>
                                                
                                                @endif
                                                
                                                 @if($data->images4)
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image4</label>
                                            <input type="hidden" readonly class="form-control" value="{{$data->images4}}" name="old_images4"><br>
                                            <img src="{{env('APP_URL')}}//images/{{$data->images4 }}" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 4</label>
                                            <input type="file" class="form-control" id="images4" name="images4">
                                                @if ($errors->has('images4'))
                                                        {{ $errors->first('images4') }}
                                                          @endif
                                        </div>
                                        @else
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image4</label>
                                            <input type="file" class="form-control" id="images4" name="images4">
                                                @if ($errors->has('images4'))
                                                        {{ $errors->first('images4') }}
                                                          @endif
                                                </div>
                                                
                                                @endif
                                                            <div class="form-group">
                                            <label for="simpleFormEmail">Short Description</label>
                                            <textarea name="Short_details" id="Short_details" cols="125" rows="8">{{ (!empty($data->Short_details)) ? $data->Short_details : '' }}</textarea>
                                            @if ($errors->has('Short_details'))
                                                        {{ $errors->first('Short_details') }}
                                                          @endif 
                                        </div>
                                                 <div class="form-group">
                                            <label for="simpleFormEmail">Long Description</label><br>
                                           
                                             <textarea id="summernote"  name="details">{{ (!empty($data->details)) ? $data->details : '' }}</textarea>
                                           @if ($errors->has('details'))
                                                        {{ $errors->first('details') }}
                                                          @endif  
                                        </div>

                                        
                                        
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                <label>Select Category</label>
                                                <select class="form-control" id="category_id" name="category_id">
                                                <option value=""> <-- Category --></option>
                                                @foreach ($Categories as $Category)
                                                    <option @if($data->category_id == $Category->id ) selected  @endif value="{{ $Category->id }}">{{ ucfirst($Category->category_name) }}</option>
                                                @endforeach
                                                </select>
                                                 @if ($errors->has('category_id'))
                                                        {{ $errors->first('category_id') }}
                                                          @endif  
                                            </div>
                                               
                                          
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Base(MARKET) Price</label>
                                            <input type="number" id="base_price" value="{{old('base_price',$data->base_price)}}" class="form-control" name="base_price"  >
                                                       @if ($errors->has('base_price'))
                                                        {{ $errors->first('base_price') }}
                                                          @endif 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Discount Price</label>
                                            <input type="number" id="discount_price" value="{{old('discount_price',$data->discount_price)}}" class="form-control" name="discount_price"  >
                                                       @if ($errors->has('discount_price'))
                                                        {{ $errors->first('discount_price') }}
                                                          @endif 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">CGST(%)</label>
                                            <input type="number" id="CGST" value="{{old('CGST',$data->CGST)}}" class="form-control" name="CGST"  >
                                                       @if ($errors->has('base_price'))
                                                        {{ $errors->first('base_price') }}
                                                          @endif 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">SGST(%)</label>
                                            <input type="number" id="SGST" value="{{old('SGST',$data->SGST)}}" class="form-control" name="SGST"  >
                                                       @if ($errors->has('SGST'))
                                                        {{ $errors->first('SGST') }}
                                                          @endif 
                                        </div>
                                        
                                        
                                       
                                        
                                        
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" @if($data->status == '1' ) selected  @endif >Active</option>
                                                    <option value="0" @if($data->status == '0' ) selected  @endif >Deactive</option>
                                                </select>
                                            </div>

                                             @if ($errors->has('status'))
                                                        {{ $errors->first('status') }}
                                                          @endif 
                                                          
                                                    <div class="form-group">
                                                <label>Stock Status</label>
                                                <select class="form-control" name="stock_status">
                                                    <option value="1" @if($data->stock_status == '1' ) selected  @endif >Instock</option>
                                                    <option value="0" @if($data->stock_status == '0' ) selected  @endif >Out of stock</option>
                                                </select>
                                            </div>

                                             @if ($errors->has('stock_status'))
                                                        {{ $errors->first('stock_status') }}
                                                          @endif               
                                               
                                                          
                                          <div class="form-group">
                                            <label for="simpleFormEmail">Size</label><br>
                                            
                                            <input type="checkbox" name="size[]" {{ in_array('10gm',explode(',',$data->size)) ? 'checked' : '' }} value="10gm">&nbsp;10gm&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" {{ in_array('100gm',explode(',',$data->size)) ? 'checked' : '' }} value="100gm">&nbsp;100gm&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" {{ in_array('500gm',explode(',',$data->size)) ? 'checked' : '' }} value="500gm">&nbsp;500gm&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" {{ in_array('1kg',explode(',',$data->size)) ? 'checked' : '' }} value="1kg">&nbsp;1kg&nbsp;&nbsp;
                                            
                                        </div>
                                        
                                        
                                          <div class="form-group">
                                            <label for="simpleFormEmail">Product Affiliate Link</label>
                                            <input type="text" id="product_link" value="{{old('product_link',$data->product_link)}}" class="form-control" name="product_link"  >
                                                       @if ($errors->has('product_link'))
                                                        {{ $errors->first('product_link') }}
                                                          @endif 
                                        </div>
                                        
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">SKU</label>
                                            <input type="text" id="sku" value="{{old('sku',$data->sku)}}" class="form-control" name="sku"  >
                                                       @if ($errors->has('sku'))
                                                        {{ $errors->first('sku') }}
                                                          @endif 
                                        </div>
                                        
                                        
                                     </div>

                                         </div> 
                                      
                                    </form>

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
