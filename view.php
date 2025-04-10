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
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css_view/style.css" type="text/css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

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
                <a class="navbar-brand" href="home.html">
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
                         <div class="dropdown "style="margin-right:-111px;">
                         <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" style="color: white" id="navbarDropdownMenuAvatar"
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
                         <div class="dropdown "style="margin-right:-111px;">
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
        if (isset($_GET['product_id'])) {
    // Retrieve the product details from your database or any other data source
    $product_id = $_GET['product_id'];
    

   
$select_cart = mysqli_query($conn, "SELECT * FROM `laptops` where id = '$product_id'");
         if(mysqli_num_rows($select_cart) > 0){
            $ro = mysqli_fetch_assoc($select_cart)

                ?>
        <section class="side-section1 section-padding">

            <div class="container">
                <div class="row">

                <div class="col-lg-6">
                    <div class="login__form" style="  margin-top: 26px;">
                      
                        <form action="#" method="POST">
                            <div class="input__item">
                                
                            <input type="text" value="<?php echo$ro['name']?>"disabled>
                          
                            <input  type="text" value="Processor :  <?php echo$ro['processor']?>"disabled>
                               
                            <input  type="text"value="<?php echo$ro['ram']?> RAM" disabled>
                                         
                    
                            <input  type="text"value="<?php echo$ro['storage']?> Storage"disabled>
                                         
                    
                            <input value="<?php echo$ro['display']?> Display"type="text"  disabled >

                            <input value="<?php echo$ro['price']?> Rs"type="text"  disabled >

                            <input value="1 Year Onsite Warranty"type="text"  disabled >
                            <input value="7 Days Replacement Policy"type="text"  disabled >
                            

                            <input type="hidden" name="lap_id" value="<?php echo $ro['id']; ?>">
                            <input type="hidden" name="product_name" id="product_name" value="<?php echo $ro['name']; ?>">
                            <input type="hidden" name="product_price" id="product_price" value="<?php echo $ro['price']; ?>">
                            <input type="hidden" name="product_image" id="product_file" value="<?php echo $ro['file']; ?>">
                       
                            <?php
                            
                            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$ro[name]' && person ='$a'");
						 
							
                            
                            if ($ro['stock']> 0 and $ro['stock']!=NULL)
                            { 
                                if(mysqli_num_rows($select_cart) > 0){
					         ?> 
                            <br><button type="submit" name="go_to_cart" class="button3" style="margin-top:19px;width:100%;"><i class="fa fa-shopping-cart"></i>  Go to cart</button>
                            <?php } else {?>
                                <br><button type="submit" name="add_to_cart" class="button3" style="margin-top:19px;width:100%;"><i class="fa fa-shopping-cart"></i>   Add to cart</button>
                                <?php } ?>

                           <br><a data-bs-toggle="modal" data-bs-target="#exampleModal" class="button" style="margin-top:19px;width:100%;">Buy Now</a>
                                <?php } else {?>
                                    <br><a class="button" style="background-color:red;margin-top:19px;width:100%;" disabled>Out of stock</a>
                             <?php } ?>

                            </div>                           
                        </form>           
                    </div>
                </div>
           <?php
            }else{
					?><script>
				   window.location.href = 'home.html';
				</script>
				<?php
				}
                
                ?>
                

             <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="login__register" style="margin-top:65px;">
                    <img src="./uploads/<?php echo $ro['file']; ?>"width="300" height="300">
                   <div style="color:black; font-size:40px" ><?php echo$ro['name']?></div>
                        
                    </div>
                </div>
            </div>
    </section>
</main>

 <?php } ?>

 <?php
 
						if(isset($_POST['add_to_cart'])){

							
							$product_name = $_POST['product_name'];
							$product_price = $_POST['product_price'];
							$product_image = $_POST['product_image'];
                            $lap_id = $_POST['lap_id'];
							$product_quantity = 1;
                            
						 
							$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' && person ='$a'");
						 
							if(mysqli_num_rows($select_cart) > 0){
							   $message[] = 'Product already added to cart';
							}else{
							   $insert_product = mysqli_query($conn, "INSERT INTO `cart`(lap_id,person,name, price, image, quantity) VALUES('$lap_id','$a','$product_name', '$product_price', '$product_image', '$product_quantity')");
							   $message[] = 'Product added to cart succesfully';
							}
						 
						 }

					

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" style="color:#db0000;" ><span>'.$message.'</span> <i class="" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

if(isset($_POST['go_to_cart'])){

    ?><script>
    window.location.href = 'cart.php';
 </script><?php
 
 }

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
                             
                            <div class="input__item">
                            <input  type="text"value="<?php echo$ro['name']?>" name="brandandname" id="brandandname"  disabled>
                            <span class="fa fa-laptop"></span>
                           
                             
                            <div class="input__item">
                            <input  type="text"value="<?php echo$ro['price']  + 70 ?> Rs"   disabled>
                            <span class="fa fa-money"></span>
                            </div> </div>


                            <input value="<?php echo$ro['price']+70?>" type="hidden" name="amt" id="amt" disabled >
                            <input value="<?php echo $a?>" type="hidden" name="username" id="username" disabled >
                            <input value="<?php echo$ro['id']?>" type="hidden" name="lap_id" id="lap_id" disabled >
  
                            
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
        var lap_id=jQuery('#lap_id').val();

        var phone=jQuery('#phone').val();
        var pincode=jQuery('#pincode').val();
        var city=jQuery('#city').val();
        var district=jQuery('#district').val();
        var state=jQuery('#state').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name+"&username="+username+"&phone="+phone+"&pincode="+pincode+"&city="+city+"&district="+district+"&state="+state+"&lap_id="+lap_id,
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
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="shop.php";
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


<div style="margin-top: -24px;">
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

    </div>
    
       
<!-- Database connectivity -->
    


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