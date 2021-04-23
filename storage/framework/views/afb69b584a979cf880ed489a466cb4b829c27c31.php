
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main-section'); ?>
<div class="page-content-wrapper">
                <div class="page-content">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                   
                                    <header><?php echo e((isset($editData->id) ? 'Edit Category' : 'Add Category' )); ?></header>
                                     
                                </div>
                                <div class="card-body " id="bar-parent">
                                   
                                    <form method="POST" action="<?php echo e((isset($editData->id) ? route('blog-category.update',$editData->id) : route('blog-category.store'))); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if(isset($editData->id)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Blog Category Name</label>
                                            <input type="text" class="form-control" name="blog_category_name" 
                                            value="<?php echo e(old('category_name',(isset($editData->blog_category_name) ? $editData->blog_category_name : '' ))); ?>"  placeholder="Enter Category Name">
                                        </div>
                                      <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                    </div>
                    <div class="row">
                   <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Blogs Categories</header>
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
                                                <th>Blog category name</th>
                                                <th colspan="2">Action<th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                        <?php $__currentLoopData = $BlogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
                                                <td><?php echo e(ucfirst($Category->blog_category_name)); ?></td>
                                             
                                                     <td>

                                            <a href="<?php echo e(route('delete-blog-category',$Category->id)); ?>" class="" data-toggle="tooltip" title="Delete">  <i class="fa fa-trash"></i>  </a>

                                                       </td>
                                                      <td><a href="<?php echo e(route('blog-category.edit',$Category->id)); ?>" class="" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-check"></i></a>  </a> </td>
                                                
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    </div>
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/Admin/blog_category.blade.php ENDPATH**/ ?>