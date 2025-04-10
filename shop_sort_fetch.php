<?php
  include 'config.php';
$output = '';
if(isset($_POST["sort"]))
{
	$sort = mysqli_real_escape_string($conn, $_POST["sort"]);
	if ($sort == "1") {
		$query = "
			SELECT * FROM laptops ORDER BY id DESC
		";
	}
    else if ($sort == "2"){
		$query = "
			SELECT * FROM laptops ORDER BY LENGTH(price),price ASC
		";
	}
    else if ($sort == "3"){
		$query = "
			SELECT * FROM laptops ORDER BY LENGTH(price)DESC ,price DESC
		";
	}
}
else
{
	$query = "
	SELECT * FROM laptops ORDER BY id";
}
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
                <?php echo "<a href='view.php?product_id=$row[id]'>"?><div class="product-img">
                <img src="./uploads/<?php echo $row['file']; ?>">
                </div></a>
                <div class="product-body">
                    <h3 class="product-name"><?php echo $row['name'];?></h3>
                    <h3 class="product-name"><?php echo $row['processor'];?></h3>
                    <!--<h3 class="product-name"><?php echo $row['ram'];?></h3>
                    <h3 class="product-name"><?php echo $row['storage'];?></h3>-->
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
                     <button class="add-to-wishlist" name="wish"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                         <button class="add-to-compare" name="compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                       <button class="quick-view" name="view"><i class="fa fa-eye"></i><span class="tooltipp">view</span></button>
                   </div>
                </div>
                <div class="add-to-cart">
                <input type="hidden" name="lap_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="product_name" id="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" id="product_price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="product_image" id="product_file" value="<?php echo $row['file']; ?>">
                <input type="hidden" name="product_processor" value="<?php echo $row['processor']; ?>">
                <input type="hidden" name="product_ram" value="<?php echo $row['ram']; ?>">
                <input type="hidden" name="product_storage" value="<?php echo $row['storage']; ?>">
                <input type="hidden" name="product_display" value="<?php echo $row['display']; ?>">
                    <button type="submit" value="add to cart" name="add_to_cart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button><br><br>
                    <!--<button type="submit" value="add to cart" name="buy_now" class="add-to-cart-btn"><i class="fa fa-credit-card"></i> buy now</button>-->
                </div>
            </div>
        </div>
                    </form>
                                                    
                <?php
                    
                };
                ?>
				   <?php
	echo $output;
}
else
{
	echo 'Laptops Not Found';
}
?>