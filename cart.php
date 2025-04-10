<?php
    session_start();
    include 'config.php';
    ?>
<!doctype html>
<html lang="en">

<head>
       
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notebook Nation</title>
    <link rel="icon" href="./images/N.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/bootstrap-icons.css" rel="stylesheet">

<!-- icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- Libraries Stylesheet -->
<link href="lib_cart/animate/animate.min.css" rel="stylesheet">
<link href="lib_cart/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css_cart/style.css" rel="stylesheet">

</head>
<?php
				$a=$_SESSION['name1'];
                $query="select * from reg where username = '$a'";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_array($result);
                    ?>
<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" style="color: white;" href="homeaccount.php">
                    Notebook Nation
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="homeaccount.php#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="homeaccount.php#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="shop.php">Shop</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="service.php">Service</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="homeaccount.php#section_6">Contact</a>
                        </li>
                                  
                        <?php
                                    
                          $select_rows = mysqli_query($conn, "SELECT * FROM `cart` where person='$a'") or die('query failed');
                          $row_count = mysqli_num_rows($select_rows);

                          ?>

                        <div class="dropdown " style="margin-right:65px;">
                              <a href="cart.php"><img  src="./images/cart.png "  height="50" width="50"/></a><div class="qty"><?php echo $row_count; ?></div>
                               
                            </a>
                          </div> 
                    
                          <?php

if($a!=NULL && $row['file']!=NULL)
{
    ?>
     <div class="dropdown " style="margin-right:-111px;">
     <a class="dropdown-toggle d-flex align-items-center hidden-arrow" style="color: white" href="#" id="navbarDropdownMenuAvatar"
      role="button" data-mdb-toggle="dropdown" aria-expanded="false">
     <img src="./uploads/<?php echo $row['file']; ?>"width="50" height="50"class="rounded-circle" 
                    alt="profile pic" loading="lazy" />
                    </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                  <li>
                    <a class="dropdown-item" href="myprofile.php">My Account</a>
                  </li>
                  <li>
                <a class="dropdown-item" href="order.php">My Orders</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>

            <?php
}elseif($a!=NULL && $row['file']==NULL){

    ?>
     <div class="dropdown " style="margin-right:-111px;">
     <a class="dropdown-toggle d-flex align-items-center hidden-arrow" style="color: white" href="#" id="navbarDropdownMenuAvatar"
      role="button" data-mdb-toggle="dropdown" aria-expanded="false">
      <?php echo $row['name']; ?>
                    </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                  <li>
                    <a class="dropdown-item" href="myprofile.php">My Account</a>
                  </li>
                  <li>
             <a class="dropdown-item" href="order.php">My Orders</a>
                </li>
                  <li>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
            <?php


} else {
?>
    <script>
    window.location.href = 'home.html';
 </script><?php
}?>
</ul>       
</div>
</div>
</nav>

                
<?php


if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      ?><script>window.locatio.href='cart.php';</script>
      <?php
   };
};

if(isset($_POST['checked'])){

    $select_id = $_POST['select'];
    
    $query="select * from cart where id='$select_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    

    if($row['selected']=='yes' )
    {
        $query="update cart set selected ='no' where id='$select_id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='cart.php';
            </script>
            <?php
    }
    else{
        $query="update cart set selected='yes' where id='$select_id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='cart.php';
            </script>
            <?php
    }
    
 };
 
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   ?><script>window.location.href='cart.php';</script>
   <?php
}
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   ?><script>window.location.href='cart.php';</script>
   <?php
}


?>
      <section class="section-padding">

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="homeaccount.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr><th></th>
                            <th>Images</th>
                            <th>Laptops</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` where person='$a'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
                 <tr>

                          <td class="align-middle">
                            <form action="" method="post">
                                <input type="hidden" name="select" value="<?php echo $fetch_cart['id']; ?>" >
                                
                      <?php 
                       $lapid=$fetch_cart['lap_id'];
                       $query="SELECT `stock` FROM `laptops` WHERE `id` =$lapid ";  
                       $result=mysqli_query($conn,$query);
                       $row=mysqli_fetch_array($result);
                      
                      if($fetch_cart ['selected']=='yes' and $fetch_cart['quantity']< $row['stock'] ) { ?>
                        
                         <div><button type="submit"  class="button-5" name="checked"><i class="fa fa-check" style=" font-size: 15px;" aria-hidden="true"></i></button></div> </form>
                     <?php   } 
                     
                     elseif($fetch_cart['quantity']> $row['stock'] ) { ?>
                    
                        <div ><button type="submit"  class="button-5" name="checked" style="width: 28px;height: 31px" disabled></button></div>

                    <?php } else { ?>

                          <div ><button type="submit"  class="button-5" name="checked" style="width: 28px;height: 31px"></button></div>
                       
                          <?php } ?>
                    
                    </form>

                           
                        </td>
                        <td class="align-middle"><img src="uploads/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                            <td class="align-middle"><?php echo $fetch_cart['name']; ?></td>
                            <td class="align-middle">Rs <?php echo number_format($fetch_cart['price']); ?>/-</td>
                            <td class="align-middle">
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                                <input style="width: 50px; height: 30px" type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                                <div style="margin-top:10px"><input type="submit" value="update"  class="button-7" name="update_update_btn"></div>
                            </form>   
                            </td>

                            
                            <?php 
                           
                            
    
                            if ($fetch_cart['quantity']<= $row['stock'] and $row['stock']> 0 and $row['stock']!=NULL)
                            { 
                            ?>
                            <td class="align-middle">Rs <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                               <?php          
                               
                               }
                               else { ?>
                                <td class="align-middle"><button class=" btn-danger">Out of stock</button></a></td>
                              <?php } ?>      

                            <td class="align-middle"><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')"><button class=" btn-danger"><i class="fa fa-times"></i></button></a></td>
   
                        </tr>
                        <?php
                        $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);

if ($fetch_cart['selected']=='yes' and $fetch_cart['quantity']<= $row['stock'])
{ 
    $grand_total += $sub_total; 

         }   };?>
            <td class="align-middle"><a href="cart.php?delete_all" onclick="return confirm('remove all items from cart?')"><button class=" btn-danger">Delete all</button></a></td>
        <?php };
         ?>
                       
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs <?php echo $grand_total; ?>/-</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs 70</h6>
                        </div>
                    </div>
                  <?php $total = $grand_total+ 70; ?>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rs <?php echo $total; ?>/-</h5>
                        </div><br>
                        <form method="post">

                         <?PHP
                         
                         if ($total > 70 )
                         { ?>
                         <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="button" name="buy_now" ><b>Proceed To Checkout</b></button></a>
                        <?php } else { ?>
                             <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="button2" name="buy_now" style="margin-top:19px;border: none;background: orange; width: 396px;" disabled><b>Proceed To Checkout</b></button>
                          <?php }  ?>
                     </form>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
                  
            </div>
        </div>
    </section>
</main>



           

<?php
$query="select * from reg where username = '$a'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
	?>



<!-- Edit profile modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="side-section section-padding">

                    <div class="login__form"  style="margin-left: -96px;margin-top: -69px;">
                     
                    <form action="#" method="POST">
                            
                           CUSTOMER DETAILS
                            <div class="input__item">
                            <input type="text" value="<?php echo$row['name']?>" id="name" name="name" disabled>
                            <span class="fa fa-address-card-o"></span>
                           
                            <div class="input__item">
                            <input  type="text" value="<?php echo$row['phone']?>" id="phone" name="phone" maxlength="10"  disabled>
                                <span class="fa fa-phone"></span>
                            
                                             
                           
                            <?php if ($row["city"]!=NULL) { ?>
                                <div class="input__item">
                            <input  type="text" value="<?php echo$row['pincode']?>" id="pincode" name="pincode"  disabled>
                            <span class="fa fa-map-pin"></span>   
                            <div class="input__item">
                            <input  type="text"value="<?php echo$row['city']?>, <?php echo$row['district']?>, <?php echo$row['state']?>"  disabled>
                            <span class="fa fa-map-marker"></span>           
                        </div></div></div></div>
                        <?php } else { ?>
                            <a href="myprofile.php" class="button2"  style="margin-left: 0px;margin-bottom: 18px; width: 371px;margin-top: 16px"><i class="fa fa-map-marker" style="margin-left:-78px;"></i>&nbsp&nbsp&nbsp&nbspAdd Delivery Address</a>
                              </div></div>
                            
                            <?php } ?>

                           <input  type="hidden"value="<?php echo$row['city']?>" id="city" name="city"   disabled>
                          
                            <input  type="hidden"value="<?php echo$row['district']?>" id="district" name="district"  disabled>
                           
                            <input  type="hidden"value="<?php echo$row['state']?>" id="state" name="state" disabled>
                        
                            
                        LAPTOP DETAILS
                           <?php
                            $cart_query = "SELECT * FROM cart where selected='yes' and person='$a'";
                            $cart_result = mysqli_query($conn, $cart_query);
                            while ($row_result = mysqli_fetch_array($cart_result)) {
                            ?>
                            <div class="input__item">
                            <input  type="text"value="<?php echo $row_result['name']; ?>" disabled>
                            <span class="fa fa-laptop"></span>

                           
                              <?php } ?>
                            <div class="input__item">
                            <input  type="text"value="<?php echo $total?> Rs"  disabled>
                            <span class="fa fa-money"></span>
                            </div></div>
                            
                           
                            <input value="<?php echo $a?>" type="hidden" name="username" id="username" disabled >
                            <input  type="hidden"value="<?php echo $total?>" name="amt" id="amt" disabled>
  
                            <?php if ($row["city"]==NULL) { ?>
                            <button type="button" class="button"  name="btn" id="btn" value="Pay Now" style="width: 368px;border:none;" disabled>Pay Now</button>
                            <?php } else { ?>
                                <button type="button" class="button"  name="btn" id="btn" value="Pay Now" style="width: 368px;border:none;" onclick="pay_now()">Pay Now</button>
                           <?php } ?>

                        </form>                
                    </div>
                </div>
      </div>

    </div>
  </div>
</div>
 </section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var username=jQuery('#username').val();
        var amt=jQuery('#amt').val();
        var quantity=jQuery('#quantity').val();

        var phone=jQuery('#phone').val();
        var pincode=jQuery('#pincode').val();
        var city=jQuery('#city').val();
        var district=jQuery('#district').val();
        var state=jQuery('#state').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process_cart.php',
               data:"amt="+amt+"&name="+name+"&username="+username+"&phone="+phone+"&pincode="+pincode+"&city="+city+"&district="+district+"&state="+state,
               success:function(result){
                   var options = {
                        "key": "rzp_test_3ybzcJKABRAGdi", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Notebook Nation",
                        "description": "Test Transaction",
                        "image": "./images/N.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process_cart.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="cart.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>


<footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="text-white mb-lg-0">NOTEBOOK NATION</h2>
                    </div>

                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                        <ul class="social-icon d-flex justify-content-lg-end">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-apple"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-youtube"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-pinterest"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 pb-2">
                    <h5 class="site-footer-title mb-3">Links</h5>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="home.html" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="home.html#section_2" class="site-footer-link">About</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="shop_guest.php" class="site-footer-link">Shop</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="signin.php" class="site-footer-link">Service</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="home.html#section_6" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Have a question?</h5>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 090-080-0760" class="site-footer-link">
                            9497449297
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:notebooknation@gmail.com" class="site-footer-link">
                            notebooknation@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>

                    <p class="text-white d-flex mt-3 mb-2">
                        S N Junction Palarivattom, Ernakulam</p>

                    <a class="link-fx-1 color-contrast-higher mt-3" href="#">
                        <span>Our Maps</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mt-5">
                        <p class="copyright-text">Copyright © Notebook Nation</p>
                    </div>

                    <div class="col-lg-8 col-12 mt-lg-5">
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Privacy Policy</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Your Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    
       <!--

T e m p l a t e M o

-->
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>
    <!-- MDB -->
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script> 

</body>
</html>