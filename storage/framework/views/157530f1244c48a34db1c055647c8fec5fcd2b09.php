<!DOCTYPE html>
<html lang="en">
<head>
<title>Larastore.ml</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="_token" content="<?php echo e(csrf_token()); ?>">
<?php echo $__env->make('user.common.link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<?php echo $__env->make('user.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('main-section'); ?>
<?php echo $__env->make('user.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('user.common.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
  <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
    switch(type){
        case 'info':
         toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;
        
        case 'warning':
         toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;

        case 'success':
        toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;

        case 'error':
         toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false
  }
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
    }
  <?php endif; ?>
</script>



<script type="text/javascript">
  function addToCart($id,$qty)
{
  $(document).ready(function(){

    
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
       

        $.ajax({
            type:'POST',
            data:{'product_id':$id,"qty":$qty},
            url:"http://127.0.0.1:8000/add-to-cart/",
            success:function(response)
            {

              relaodCart();
               toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false,
    

  }
            toastr.success("Product Added in Cart !!");
                
                
                         
                

            }

    });

    });
}

function relaodCart(){
      
     $('.cart-items-header').load(location.href + ' .cart-items-header');
    
    }


</script>

<script type="text/javascript">





    $(document).ready(function(){

        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            var qty = 	ele.parents("tr").find(".qty").val()
      
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
            $.ajax({
               url: "update-cart",
               method: "patch",
               data: {_token: '<?php echo e(csrf_token()); ?>', id: ele.attr("data-id"), quantity: qty},
               success: function (response) {
                   //alert(response);
                   window.location.reload();
               }
            });
        });



        $(".remove-from-cart").click(function (e) {


        
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
        
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {



                $.ajax({
                    url: 'remove-from-cart',
                    method: "DELETE",
                    data: {_token: '<?php echo e(csrf_token()); ?>', id: ele.attr("data-id")},
                    success: function (response) {
                       //alert(response);

                        window.location.reload();
                    }
                });
            }
        });




});


    


</script>



<script type="text/javascript">
  function addToWishlist()
  {

    toastr.options =
  {
    "closeButton" : true,
    "progressBar" : false,
    

  }
            toastr.warning("Please Login first to add Wishlist");

  }


  function addWishlist($product_id,$user_id)
  {
      
  
    $(document).ready(function(){

       $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });

      $.ajax({

          method:"POST",
          url:'dashboard/add-to-wishlist',
          data:{_token: '<?php echo e(csrf_token()); ?>',user_id:$user_id,product_id:$product_id},
          success:function(response){

            if(response == 200)
            {
                toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : false,
                }
            toastr.success("Added In Wishlist");
            }
            else
            {
              toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : false,
                }
            toastr.error("Already Added");

            }
          
          }


      });

    });



  }
</script>


</body>
</html><?php /**PATH C:\xampp\htdocs\larastore\resources\views/user/master.blade.php ENDPATH**/ ?>