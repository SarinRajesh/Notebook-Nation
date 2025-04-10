<?php
session_start();
  include 'config.php';
$a=$_SESSION["name1"];
$output = '';
if(isset($_POST["sort"]))
{
	$sort = mysqli_real_escape_string($conn, $_POST["sort"]);
	if ($sort == "1") {
        $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
        order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
        laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
        FROM order_tbl
        INNER JOIN laptops
        ON order_tbl.lap_id = laptops.id
        where username='$a'
        ORDER BY order_tbl.order_id desc
		";
	}
    else if ($sort == "2"){
        $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
        order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
        laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
        FROM order_tbl
        INNER JOIN laptops
        ON order_tbl.lap_id = laptops.id
        where username='$a' and order_tbl.order_status='not Confirmed' 
        ORDER BY order_tbl.order_id desc
        ";
	}
    else if ($sort == "3"){
        $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
        order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
        laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
        FROM order_tbl
        INNER JOIN laptops
        ON order_tbl.lap_id = laptops.id
        where username='$a' and order_tbl.order_status='Confirmed' 
        ORDER BY order_tbl.order_id desc
        ";
	}
    else if ($sort == "4"){
        $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
        order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
        laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
        FROM order_tbl
        INNER JOIN laptops
        ON order_tbl.lap_id = laptops.id
        where username='$a' and order_tbl.delivery_status='delivered' 
        ORDER BY order_tbl.order_id desc
        ";
	}
    else if ($sort == "5"){
        $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
        order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
        laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
        FROM order_tbl
        INNER JOIN laptops
        ON order_tbl.lap_id = laptops.id
        where username='$a' and order_tbl.order_status='Cancelled' 
        ORDER BY order_tbl.order_id desc
        ";
	}
}
else
{
    $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
    order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
    laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
                        FROM order_tbl
                        INNER JOIN laptops
                        ON order_tbl.lap_id = laptops.id
                        where username='$a'
						ORDER BY order_tbl.order_id desc";
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
                                <?php echo "<a href='view.php?product_id=$row[lap_id]'>"?><div class="product-img">
									<img src="./uploads/<?php echo $row['file']; ?>">
									</div></a>
									<div class="product-body">
                                        <h4 class="product-price"><?php echo $row['name'];?></h4>
                                        <h4 class="product-price">QTY : <?php echo $row['quantity'];?></h4>
                                        <h4 class="product-price">Rs.<?php echo $row['amount'];?></h4>
										<h3 class="product-name">Order Id : <?php echo $row['order_id'];?></h3>
										<h3 class="product-name">Order placed on<br> <?php echo $row['order_date'];?></h3>
										<h3 class="product-name">Delivery Address : <?php echo $row['city'];?>, <?php echo $row['district'];?>, <?php echo $row['state'];?></h3>
										<h3 class="product-name">Order Status : <br><?php echo $row['order_status'];?></h3>
                                       
                                        <?php
                                         if ($row['order_status']=='Cancelled') {?>
                                           <h3 class="product-name">Delivery Status : <br>Cancelled</h3>

                                          <?php if ($row['refund']=='Completed') {?>
                                         <h3 class="product-name">Delivery on <br><?php echo $row['delivery_date'];?></h3>
                                        <h3 class="product-name">OTP Verification : <br>Cancelled</h3>
                                        <h3 class="product-name">Refund Status : <br><?php echo $row['refund'];?></h3>

                                        <?php } else {?><h3 class="product-name">Delivery on <br><?php echo $row['delivery_date'];?></h3>
                                        <h3 class="product-name">OTP Verification : <br>Cancelled</h3>
                                        <h3 class="product-name">Refund Status : <br> Pending</h3>
                                        
                                        <?php }} else if ($row['delivery_status']=='Delivered'){?>
                                            <h3 class="product-name">Delivery Status : <br><?php echo $row['delivery_status'];?></h3>
                                         <h3 class="product-name">Delivered on <br><?php echo $row['delivery_date'];?></h3>
                                        <h3 class="product-name">OTP Verification : <br><?php echo $row['otp'];?></h3>
                                        <?php 
                                     $order_id=$row['order_id'];
                                     $q = "select * from service where order_id='$order_id'";
                                     $r = mysqli_query($conn,$q);
                                     $row1 = mysqli_fetch_array($r);
                                     if (mysqli_num_rows($r)>0) {
                                     
                                      if ($row1['status']=='Not confirmed') {
                                      ?>
                                       <h3 class="product-name">Service Status : <br>Service requested</h3>
                                      <?php } else  if ($row1['status']=='Serviced'){ ?>
                                          <h3 class="product-name">Serviced on <br><?php echo $row1['date'];?></h3>
                                      <?php } else{ ?>
                                          <h3 class="product-name">Service Status : <br><?php echo $row1['status'];?></h3>
                                     <?php } ?>
                                     
                                     <?php } else{ ?>
                                         <h3 class="product-name">Service Status : <br>Not yet requested</h3>
                                    <?php }
                                    
                                    } else {?>
                                        <h3 class="product-name">Delivery on <br><?php echo $row['delivery_date'];?></h3>
                                            <h3 class="product-name">Delivery Status : <br><?php echo $row['delivery_status'];?></h3>
                                        <h3 class="product-name">OTP Verification : <br><?php echo $row['otp'];?></h3>
                                        <h3 class="product-name">Service Status : <br>Not yet delivered</h3>
                                        <?php } ?>

                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                        <input type="hidden" name="lap_id" value="<?php echo $row['lap_id']; ?>">
                                        <input type="hidden" name="quantity" value="<?php echo $row['quantity']; ?>">
                                        <input type="hidden" name="product_name" id="product_name" value="<?php echo $row['name']; ?>">
                                        <input type="hidden" name="product_price" id="product_price" value="<?php echo $row['price']; ?>">
                                        <input type="hidden" name="product_image" id="product_file" value="<?php echo $row['file']; ?>">
                                        <input type="hidden" name="product_processor" value="<?php echo $row['processor']; ?>">
                                        <input type="hidden" name="product_ram" value="<?php echo $row['ram']; ?>">
                                        <input type="hidden" name="product_storage" value="<?php echo $row['storage']; ?>">
                                        <input type="hidden" name="product_display" value="<?php echo $row['display']; ?>">
                                        <?php
                                        if ($row['order_status']=='Cancelled') {?>
                                            <button type="submit"class="button-62" style=" margin-top: 10px;" disabled>Order Cancelled</button>
                                             <!-- <button type="submit"class="button-64" style=" margin-top: 10px;color:white" disabled>Download Invoice</button>--> 
                                             
                                             <?php } else if ($row['delivery_status']=='Delivered') {?>
                                                 <!--<button type="submit"class="button-63" style=" margin-top: 10px;" disabled>Delivered</button>-->
                                                 <button type="submit"class="button-63" style=" margin-top: 10px;color:white"><?php echo "<a style= 'color:white;' href='invoice.php?id=$row[order_id]'>Download Invoice</a>"?></button>
                                             
                                                 <?php } else { ?>
                                                 <button type="submit" name="cancel" class="button-62" style=" margin-top: 10px;">Cancel Order</button>
                                             <!--<button type="submit"class="button-64" style=" margin-top: 10px;color:white" disabled>Download Invoice</button>-->
                                             <?php } ?>
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