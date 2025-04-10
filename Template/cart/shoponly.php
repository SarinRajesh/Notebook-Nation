<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css_shop/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css_shop/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css_shop/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css_shop/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css_shop/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css_shop/style.css"/>
		<!-- icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
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
						</div>
						<!-- /store top filter -->
						<?php
						$conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
						if(isset($_POST['add_to_cart'])){

							$product_brand = $_POST['product_brand'];
							$product_name = $_POST['product_name'];
							$product_price = $_POST['product_price'];
							$product_image = $_POST['product_image'];
							$product_quantity = 1;
						 
							$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
						 
							if(mysqli_num_rows($select_cart) > 0){
							   $message[] = 'product already added to cart';
							}else{
							   $insert_product = mysqli_query($conn, "INSERT INTO `cart`(brand,name, price, image, quantity) VALUES('$product_brand','$product_name', '$product_price', '$product_image', '$product_quantity')");
							   $message[] = 'product added to cart succesfully';
							}
						 
						 }
					

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

						$select_products = mysqli_query($conn, "SELECT * FROM `laptops`");
						if(mysqli_num_rows($select_products) > 0){
						while($row = mysqli_fetch_array($select_products)){
                
                 ?>
						   <form action="" method="post">
						<!-- store products -->
						<div class="row">
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
									<img src="./uploads/<?php echo $row['file']; ?>">
									</div>
									<div class="product-body">
									    <h3 class="product-name"><?php echo $row['brand'];?> <?php echo $row['name'];?></h3>
										<h3 class="product-name"><?php echo $row['processor'];?></h3>
										<h3 class="product-name"><?php echo $row['ram'];?></h3>
										<h3 class="product-name"><?php echo $row['storage'];?></h3>
										<h3 class="product-name"><?php echo $row['display'];?> "inch Display</h3>
										<h4 class="product-price">Rs.<?php echo $row['price'];?></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
									<input type="hidden" name="product_brand" value="<?php echo $row['brand']; ?>">
									<input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            						<input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
           						    <input type="hidden" name="product_image" value="<?php echo $row['file']; ?>">
										<button type="submit" value="add to cart" name="add_to_cart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
										</form>
																		
									<?php
										};
									};
									?>
														

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<!-- jQuery Plugins -->
		<script src="js3/jquery.min.js"></script>
		<script src="js3/bootstrap.min.js"></script>
		<script src="js3/slick.min.js"></script>
		<script src="js3/nouislider.min.js"></script>
		<script src="js3/jquery.zoom.min.js"></script>
		<script src="js3/main.js"></script>

	</body>
</html>
