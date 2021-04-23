<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Larastore.ml | Admin</title>
  
   <?php echo $__env->make('Admin.common.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->yieldPushContent('css'); ?>
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
       
       <?php echo $__env->make('Admin.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end header -->
      
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			 <?php echo $__env->make('Admin.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             
            <!-- end sidebar menu --> 
            <!-- start page content -->
            
            <?php echo $__env->yieldContent('main-section'); ?>
           
            <!-- end page content -->
           
        </div>
        <!-- end page container -->
        <!-- start footer -->
     
       <?php echo $__env->make('Admin.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
  
    
   <?php echo $__env->make('Admin.common.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->yieldPushContent('scripts'); ?>
    <!-- end js include path -->
  </body>

</html><?php /**PATH C:\xampp\htdocs\larastore\resources\views/Admin/master.blade.php ENDPATH**/ ?>