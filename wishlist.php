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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link type="text/css" rel="stylesheet" href="css_shop/style.css"/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
                <a class="navbar-brand" style="color: white;" href="home.html">
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
    window.location.href = 'shop_guest.php';
 </script><?php
}?>
       </ul>
       </div>    
       </div>
      </div>
        </nav>

        <section class=" section-padding">
        <!--<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>

<div class="form-group">
				<div class="input-group" style="width: 22%;margin-left:37%;margin-bottom:-48px;">
					<span class="input-group-addon"></span>
					<input type="text" name="search_text" id="search_text" placeholder="Search Laptops By Brand And Name" class="form-control" style="border-color: red;" />
                    <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button></div>
			</div>-->
        
				<div id="store" class="col-md-9">
						<!-- store top filter -->
						<!--<div class="store-filter clearfix">
							<div class="store-sort">
                            <label>
									Sort By:
									<select id="sort-select" class="input-select">
                                        <option value="1">Newest arrivals</option>
                                        <option value="2">Price : low to high</option>
                                        <option value="3">Price : high to low</option>
                                        </select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>-->
						<!-- /store top filter -->
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

if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {

    $product_id = $_GET['product_id'];
    $delete_product = mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$product_id'");

}
?>
                        
     <div class="row">
    <div class="flex-container">
   <?php
    $query = "SELECT * FROM wishlist where person='$a'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result)){

?>
 
       <form action="" method="post">
    <!-- store products -->
    
        <!-- product -->
        <div class=" col-xs-6">
            <div class="product" >
                <?php echo "<a href='view.php?product_id=$row[lap_id]'>"?><div class="product-img">
                <img src="./uploads/<?php echo $row['image']; ?>">
                </div></a>
                <div class="product-body" >
                    <h3 class="product-name"><?php echo $row['name'];?></h3>
                    <!--<h3 class="product-name"><?php echo $row['processor'];?></h3>
                    <h3 class="product-name"><?php echo $row['ram'];?></h3>
                    <h3 class="product-name"><?php echo $row['storage'];?></h3>
                    <h3 class="product-name"><?php echo $row['display'];?> "inch Display</h3>-->
                    <h4 class="product-price">Rs.<?php echo $row['price'];?></h4>
                    <!--<div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>-->
                    <button type="submit" value="add to cart" name="add_to_cart" class="button-63" style=" margin-top: 8px;"><i class="fa fa-shopping-cart"></i> add to cart</button><br>
                    <button class="button-62" style=" margin-top: 10px;"><?php echo "<a style='color:white' href='wishlist.php?product_id=$row[id]'>Remove</a>"?></button>
                    <!--<div class="product-btns">
                         <button class="add-to-wishlist" name="wish"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                         <button class="add-to-compare" name="compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                       <button class="quick-view" name="view"><i class="fa fa-eye"></i><span class="tooltipp">view</span></button>
                   </div>-->
                </div>
                <!--<div class="add-to-cart">-->
                <input type="hidden" name="lap_id" value="<?php echo $row['lap_id']; ?>">
                <input type="hidden" name="product_name" id="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" id="product_price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="product_image" id="product_file" value="<?php echo $row['image']; ?>">
                    <!--<button type="submit" value="add to cart" name="add_to_cart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button><br><br>-->
                    <!--<button type="submit" value="add to cart" name="buy_now" class="add-to-cart-btn"><i class="fa fa-credit-card"></i> buy now</button>-->
                <!--</div>-->
            </div>
        </div>
                    </form>
                                                    
                <?php
                   
 };
                };
                ?>
</div>
</div>


</section>
</main>						


						<!-- store bottom filter -->
					<!--	<div class="store-filter clearfix" style="margin-top:100px">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>-->
						<!-- /store bottom filter -->
  


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