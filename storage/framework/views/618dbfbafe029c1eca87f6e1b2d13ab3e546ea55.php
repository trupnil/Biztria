
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
                                    <form method="POST" id="adminSiteConfigValidation" enctype="multipart/form-data" action="<?php echo e(route('update.site.config',["id" => $site_config->id])); ?>" > <?php echo csrf_field(); ?>     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header>Site Settings</header>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                          <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Name</label>
                                            <input type="text"   value="<?php echo e($site_config->store_name); ?>" class="form-control" id="store_name" name="store_name">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Logo</label>
                                            <input type="file" id="logo"  value="" class="form-control" name="logo">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Current Logo</label>
                                            <img src="<?php echo e(url('Users_assets')); ?>/assets/images/<?php echo e($site_config->logo); ?>">
                                            <input type="text" hidden=""   value="<?php echo e($site_config->logo); ?>" class="form-control" name="old_logo">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Favicon</label>
                                            <input type="file" id="fevicon"  value="" class="form-control" name="fevicon">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Current Favicon</label>
                                            <img src="<?php echo e(url('Users_assets')); ?>/assets/images/<?php echo e($site_config->fevicon); ?>">
                                            <input type="text" hidden=""   value="<?php echo e($site_config->fevicon); ?>" class="form-control" name="old_fevicon">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Location</label>
                                            <input type="text" id="location"  value="<?php echo e($site_config->location); ?>" class="form-control" name="location">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Store Currency</label>
                                            <input type="text" id="currency"  value="<?php echo e($site_config->currency); ?>" class="form-control" name="currency">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Contact No</label>
                                            <input type="text"  id="mobile" value="<?php echo e($site_config->mobile); ?>" class="form-control" name="mobile">
                                            </div>

                                        
                                        
                                      </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="simpleFormEmail">Facebook</label>
                                            <input type="text"  id="facebook" value="<?php echo e($site_config->facebook); ?>" class="form-control" name="facebook">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Twitter </label>
                                            <input type="text"  id="twitter" value="<?php echo e($site_config->twitter); ?>" class="form-control" name="twitter">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">pinterest</label>
                                            <input type="text"  id="pinterest" value="<?php echo e($site_config->pinterest); ?>" class="form-control" name="pinterest">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Skype</label>
                                            <input type="text" id="skype"  value="<?php echo e($site_config->skype); ?>" class="form-control" name="skype">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Email</label>
                                            <input type="text" id="email"  value="<?php echo e($site_config->email); ?>" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Footer Text</label>
                                            <input type="text" id="footer_text"  value="<?php echo e($site_config->footer_text); ?>" class="form-control" name="footer_text">
                                            </div>
                                             <div class="form-group">
                                            <label for="simpleFormEmail">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="4"> <?php echo e($site_config->address); ?>  </textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                           
                                               <div class="col-md-4"> 
                                                <button type="submit" name="submit"  class="btn btn-success">UPDATE</button>
                                                
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/Admin/site_config.blade.php ENDPATH**/ ?>