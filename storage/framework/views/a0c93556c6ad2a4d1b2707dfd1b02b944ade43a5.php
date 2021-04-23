
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
    }
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
                                    <form method="POST" action="<?php echo e(route('store-slider')); ?>" enctype="multipart/form-data" > <?php echo csrf_field(); ?>     
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
                                                <?php if($errors->has('slider_image')): ?>
                                                        <?php echo e($errors->first('slider_image')); ?>

                                                          <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" name="slider_text" value="1" >&nbsp;
                                            <label for="simpleFormEmail">Want to show slider content ?</label>
                                           
                                           
                                        </div>

                                      
                                         <div class="form-group">
                                            <label for="simpleFormEmail">H2 Tag Content</label>
                                            <input type="text" name="title_1" value="" class="form-control" name="base_price"  >
                                                       <?php if($errors->has('title_1')): ?>
                                                        <?php echo e($errors->first('title_1')); ?>

                                                          <?php endif; ?> 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">H5 Tag Content</label>
                                            <input type="text" name="title_2" value="" class="form-control" name="base_price"  >
                                                       <?php if($errors->has('title_2')): ?>
                                                        <?php echo e($errors->first('tittitle_2le_1')); ?>

                                                          <?php endif; ?> 
                                        </div>


                                        

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Banner Redirect Link</label>
                                            <input type="text" name="banner_link" value="" class="form-control" name="base_price"  >
                                                       <?php if($errors->has('banner_link')): ?>
                                                        <?php echo e($errors->first('banner_link')); ?>

                                                          <?php endif; ?> 
                                        </div>

                                         <div class="form-group">
                                            <label for="simpleFormEmail">Banner Position</label>
                                            <input type="number" name="position" value="" class="form-control" name="base_price"  >
                                                       <?php if($errors->has('position')): ?>
                                                        <?php echo e($errors->first('position')); ?>

                                                          <?php endif; ?> 
                                        </div>



                                        </div>
                                          
                                      
                                    </form>

                                </div>

                                     
                            </div>

                      </div>
                    
                 

                    </div>


                  
                        <?php echo $__env->make('Admin.allbanners', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 
              
                    
                  
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/Admin/add_sliders.blade.php ENDPATH**/ ?>