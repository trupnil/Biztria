
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
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
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                <form method="POST" <?php if(isset($data->id)): ?> id="adminEditProductValidation" <?php else: ?> id="adminAddProductValidation" <?php endif; ?>   action="<?php echo e((isset($data->id) ? route('update-products',$data->id) : route('store-products') )); ?>" enctype="multipart/form-data" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card-head">
                                                        <header><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?>   Products</header>
                                         
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-primary" style="float: right;"><?php if(isset($data->id)): ?> Update <?php else: ?> Submit <?php endif; ?></button>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                        <label for="simpleFormEmail">Product Name</label>
                                                        <input type="text" id="name" class="form-control" value="<?php echo e(old('name',$data->name)); ?>" name="name"  >
                                                        <?php if($errors->has('name')): ?>
                                                        <?php echo e($errors->first('name')); ?>

                                                          <?php endif; ?>
                                                    </div>
                                       <?php if($data->images): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Main Image</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images); ?>" name="old_images"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>//images/<?php echo e($data->images); ?>" height="100px;" width="100;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Main Image</label>
                                            <input type="file" class="form-control" id="images" name="images">
                                                <?php if($errors->has('images')): ?>
                                                        <?php echo e($errors->first('images')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Product Main Image</label>
                                            <input type="file" class="form-control" name="images">
                                                <?php if($errors->has('images')): ?>
                                                        <?php echo e($errors->first('images')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        
                                        
                                        
                                        <?php if($data->images1): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image1</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images1); ?>" name="old_images1"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>//images/<?php echo e($data->images1); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change  Image 1</label>
                                            <input type="file" class="form-control" id="images1" name="images1">
                                                <?php if($errors->has('images1')): ?>
                                                        <?php echo e($errors->first('images1')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">Product Image1</label>
                                            <input type="file" class="form-control" id="images1" name="images1">
                                                <?php if($errors->has('images1')): ?>
                                                        <?php echo e($errors->first('images1')); ?>

                                                          <?php endif; ?>
                                    </div>
                                    
                                    <?php endif; ?>
                                    
                                    <?php if($data->images2): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image2</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images2); ?>" name="old_images2"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>//images/<?php echo e($data->images2); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 2</label>
                                            <input type="file" class="form-control" id="images2" name="images2">
                                                <?php if($errors->has('images2')): ?>
                                                        <?php echo e($errors->first('images2')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                                
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image2</label>
                                            <input type="file" class="form-control" id="images2" name="images2">
                                                <?php if($errors->has('images2')): ?>
                                                        <?php echo e($errors->first('images2')); ?>

                                                          <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                                
                                                 <?php if($data->images3): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image3</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images3); ?>" name="old_images3"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>//images/<?php echo e($data->images3); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 3</label>
                                            <input type="file" class="form-control" id="images3" name="images3">
                                                <?php if($errors->has('images3')): ?>
                                                        <?php echo e($errors->first('images3')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image3</label>
                                            <input type="file" class="form-control" id="images3" name="images3">
                                                <?php if($errors->has('images3')): ?>
                                                        <?php echo e($errors->first('images3')); ?>

                                                          <?php endif; ?>
                                                </div>
                                                
                                                <?php endif; ?>
                                                
                                                 <?php if($data->images4): ?>
                                       
                                       <div class="form-group">
                                            <label for="simpleFormEmail">Product current Image4</label>
                                            <input type="hidden" readonly class="form-control" value="<?php echo e($data->images4); ?>" name="old_images4"><br>
                                            <img src="<?php echo e(env('APP_URL')); ?>//images/<?php echo e($data->images4); ?>" height="100px;" width="100px;">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">change Image 4</label>
                                            <input type="file" class="form-control" id="images4" name="images4">
                                                <?php if($errors->has('images4')): ?>
                                                        <?php echo e($errors->first('images4')); ?>

                                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                                
                                                
                                                <div class="form-group">
                                            <label for="simpleFormEmail">Product Image4</label>
                                            <input type="file" class="form-control" id="images4" name="images4">
                                                <?php if($errors->has('images4')): ?>
                                                        <?php echo e($errors->first('images4')); ?>

                                                          <?php endif; ?>
                                                </div>
                                                
                                                <?php endif; ?>
                                                            <div class="form-group">
                                            <label for="simpleFormEmail">Short Description</label>
                                            <textarea name="Short_details" id="Short_details" cols="125" rows="8"><?php echo e((!empty($data->Short_details)) ? $data->Short_details : ''); ?></textarea>
                                            <?php if($errors->has('Short_details')): ?>
                                                        <?php echo e($errors->first('Short_details')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                                 <div class="form-group">
                                            <label for="simpleFormEmail">Long Description</label><br>
                                           
                                             <textarea id="summernote"  name="details"><?php echo e((!empty($data->details)) ? $data->details : ''); ?></textarea>
                                           <?php if($errors->has('details')): ?>
                                                        <?php echo e($errors->first('details')); ?>

                                                          <?php endif; ?>  
                                        </div>

                                        
                                        
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                <label>Select Category</label>
                                                <select class="form-control" id="category_id" name="category_id">
                                                <option value=""> <-- Category --></option>
                                                <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($data->category_id == $Category->id ): ?> selected  <?php endif; ?> value="<?php echo e($Category->id); ?>"><?php echo e(ucfirst($Category->category_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                 <?php if($errors->has('category_id')): ?>
                                                        <?php echo e($errors->first('category_id')); ?>

                                                          <?php endif; ?>  
                                            </div>
                                               
                                          
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Base(MARKET) Price</label>
                                            <input type="number" id="base_price" value="<?php echo e(old('base_price',$data->base_price)); ?>" class="form-control" name="base_price"  >
                                                       <?php if($errors->has('base_price')): ?>
                                                        <?php echo e($errors->first('base_price')); ?>

                                                          <?php endif; ?> 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Discount Price</label>
                                            <input type="number" id="discount_price" value="<?php echo e(old('discount_price',$data->discount_price)); ?>" class="form-control" name="discount_price"  >
                                                       <?php if($errors->has('discount_price')): ?>
                                                        <?php echo e($errors->first('discount_price')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">CGST(%)</label>
                                            <input type="number" id="CGST" value="<?php echo e(old('CGST',$data->CGST)); ?>" class="form-control" name="CGST"  >
                                                       <?php if($errors->has('base_price')): ?>
                                                        <?php echo e($errors->first('base_price')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">SGST(%)</label>
                                            <input type="number" id="SGST" value="<?php echo e(old('SGST',$data->SGST)); ?>" class="form-control" name="SGST"  >
                                                       <?php if($errors->has('SGST')): ?>
                                                        <?php echo e($errors->first('SGST')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                        
                                       
                                        
                                        
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if($data->status == '1' ): ?> selected  <?php endif; ?> >Active</option>
                                                    <option value="0" <?php if($data->status == '0' ): ?> selected  <?php endif; ?> >Deactive</option>
                                                </select>
                                            </div>

                                             <?php if($errors->has('status')): ?>
                                                        <?php echo e($errors->first('status')); ?>

                                                          <?php endif; ?> 
                                                          
                                                    <div class="form-group">
                                                <label>Stock Status</label>
                                                <select class="form-control" name="stock_status">
                                                    <option value="1" <?php if($data->stock_status == '1' ): ?> selected  <?php endif; ?> >Instock</option>
                                                    <option value="0" <?php if($data->stock_status == '0' ): ?> selected  <?php endif; ?> >Out of stock</option>
                                                </select>
                                            </div>

                                             <?php if($errors->has('stock_status')): ?>
                                                        <?php echo e($errors->first('stock_status')); ?>

                                                          <?php endif; ?>               
                                               
                                                          
                                          <div class="form-group">
                                            <label for="simpleFormEmail">Size</label><br>
                                            
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('10gm',explode(',',$data->size)) ? 'checked' : ''); ?> value="10gm">&nbsp;10gm&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('100gm',explode(',',$data->size)) ? 'checked' : ''); ?> value="100gm">&nbsp;100gm&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('500gm',explode(',',$data->size)) ? 'checked' : ''); ?> value="500gm">&nbsp;500gm&nbsp;&nbsp;
                                            <input type="checkbox" name="size[]" <?php echo e(in_array('1kg',explode(',',$data->size)) ? 'checked' : ''); ?> value="1kg">&nbsp;1kg&nbsp;&nbsp;
                                            
                                        </div>
                                        
                                        
                                          <div class="form-group">
                                            <label for="simpleFormEmail">Product Affiliate Link</label>
                                            <input type="text" id="product_link" value="<?php echo e(old('product_link',$data->product_link)); ?>" class="form-control" name="product_link"  >
                                                       <?php if($errors->has('product_link')): ?>
                                                        <?php echo e($errors->first('product_link')); ?>

                                                          <?php endif; ?> 
                                        </div>
                                        
                                        
                                         <div class="form-group">
                                            <label for="simpleFormEmail">SKU</label>
                                            <input type="text" id="sku" value="<?php echo e(old('sku',$data->sku)); ?>" class="form-control" name="sku"  >
                                                       <?php if($errors->has('sku')): ?>
                                                        <?php echo e($errors->first('sku')); ?>

                                                          <?php endif; ?> 
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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/js/pages/table/table_data.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" ></script>
<script src="<?php echo e(url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')); ?>" ></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/Admin/product.blade.php ENDPATH**/ ?>