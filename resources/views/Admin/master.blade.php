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
  
   @include('Admin.common.css')
   @stack('css')
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
       
       @include('Admin.common.header')
        <!-- end header -->
      
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			 @include('Admin.common.sidebar')
             
            <!-- end sidebar menu --> 
            <!-- start page content -->
            
            @yield('main-section')
           
            <!-- end page content -->
           
        </div>
        <!-- end page container -->
        <!-- start footer -->
     
       @include('Admin.common.footer')
        <!-- end footer -->
    </div>
    <!-- start js include path -->
  
    
   @include('Admin.common.script')
   @stack('scripts')
    <!-- end js include path -->
  </body>

</html>