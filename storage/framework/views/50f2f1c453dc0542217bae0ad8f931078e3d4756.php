
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>
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
                                <div class="card-head">
                                    <header><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?>  Category</header>
                                     
                                </div>
                                <div class="card-body " id="bar-parent">
            <form method="POST" id="adminCategory" action="<?php echo e((isset($data->id) ? route('update-category',$data->id) : route('add-category') )); ?>

                                    ">
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Category Name</label>
                                            <input type="text" id="category_name" class="form-control" name="category_name"  value="<?php echo e(old('category_name',$data->category_name)); ?>" placeholder="Enter Category Name">
                                        </div>
                            <button type="submit" class="btn btn-primary"><?php if(isset($data->id)): ?> Update <?php else: ?> Add <?php endif; ?> Category</button>
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
                                            <?php $i=0; ?>
                                        <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$i); ?></td>
                                                <td><?php echo e(ucfirst($Category->category_name)); ?></td>
                                               
                                                <td><?php if($Category->status == 0): ?>            <a href="<?php echo e(route('category-status',["status" => 0 , "id" => $Category->id])); ?>">     
                                                     <span class="label label-sm label-danger"> Inactive </span>  </a> 
                                                    <?php else: ?> 
                                                    <a href="<?php echo e(route('category-status',["status" => 1 , "id" => $Category->id])); ?>"> 
                                                    <span class="label label-sm label-success"> Active </span></a>   <?php endif; ?> </td>
                                                <td>
                                                    <a href="<?php echo e(route('edit-category',$Category->id)); ?>" class="label label-sm label-success" > Edit </a>
                                                    <a href="<?php echo e(route('delete-category',$Category->id)); ?>" class="label label-sm label-danger" > Delete</a>
                                                    
                                                </td>
                                                
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
<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larastore\resources\views/Admin/categories.blade.php ENDPATH**/ ?>