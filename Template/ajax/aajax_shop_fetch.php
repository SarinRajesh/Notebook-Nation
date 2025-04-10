<?php
$connect = 	mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM laptops
	WHERE brand LIKE '%".$search."%'
	OR name LIKE '%".$search."%' 
	
	";
}
else
{
	$query = "
	SELECT * FROM laptops ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	
						while($row = mysqli_fetch_array($result)){
                
							?>
									  <div class="row">
                        <div class="flex-container">
							<form action="" method="post">
								   <!-- store products -->
								   
									   <!-- product -->
									   <div class=" col-xs-6">
										   <div class="product" >
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
											   
											   </div>
											   <div class="add-to-cart">
											   <input type="hidden" name="product_brand" value="<?php echo $row['brand']; ?>">
											   <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
											   <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
												  <input type="hidden" name="product_image" value="<?php echo $row['file']; ?>">
											   <input type="hidden" name="product_stock" value="<?php echo $row['stock']; ?>">
												   <button type="submit" value="add to cart" name="add_to_cart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											   </div>
										   </div>
									   </div>
												   </form>
																				   
											   <?php
												   
											   };
											   ?>
													 </div>
				   </div>
				   <?php
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>