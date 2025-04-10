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

    <link rel="stylesheet" href="css_form/style.css" type="text/css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   
    
<link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
	
    $(document).ready(function(){
		 var mod1=0;
           


                        $(document).ready(function(){ 
					$('#order_id').keyup(function(){
					var order_id = $(this).val();
									
					$.ajax({
					url:'idvalid.php',
					method:"POST",
					data:{order_id:order_id},
					success:function(data)
					{
                
					if(data == '0')
					{
					$('#text1').html('<span class="error">Order doesnot delivered yet</span>');
                    mod1=1;
					}
					else
					{
                        mod1=0;
					$('#text1').html('<span class="text-success">Order id exists</span>');
					$('.button').attr("disabled", false);
                }
					}
					})
					
					})

					});

					
              

					$(".button").click(function(){
							if(mod1==1)
                        {
                       $('.button').attr   ("disabled", true);
                          }
                          else{
                            $('.button').attr("disabled", false);
                          }
						})
		
       				  });
               
               
   </script>
           

           <section class="side-section1 section-padding" style="width:1519px;">


           <?php
   
   if(isset($_POST['service'])){

$complaint=$_POST['complaint'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$order_id = $_POST['order_id'];

$query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.fullname,laptops.id,laptops.vendor,
laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
FROM order_tbl
INNER JOIN laptops
ON order_tbl.lap_id = laptops.id
where order_tbl.order_id = '$order_id'";

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$name=$row['fullname'];
$vendor=$row['vendor'];
$product_name = $row['name'];
$product_price = $row['price'];
$product_image = $row['file'];
$product_processor = $row['processor'];
$product_storage = $row['storage'];
$product_ram = $row['ram'];
$product_display = $row['display'];
$lap_id = $row['lap_id'];



$q = "select * from service where order_id='$order_id'";
$r = mysqli_query($conn,$q);
$row1 = mysqli_fetch_array($r);
if (mysqli_num_rows($r)>0) { 
    mysqli_query($conn, "UPDATE `service` SET lap_id='$lap_id', order_id='$order_id', fullname='$name', username='$a', phone='$phone', address='$address', vendor='$vendor', image='$product_image', name='$product_name', complaint='$complaint', status='Not confirmed', date='Not confirmed'");
    $message[] = 'Service requested successfully';
 } else { 
$insert_product = mysqli_query($conn, "INSERT INTO `service`(lap_id,order_id,fullname,username,phone,address,vendor,image,name,complaint,status,date) VALUES('$lap_id','$order_id','$name','$a','$phone','$address','$vendor','$product_image','$product_name','$complaint', 'Not confirmed','Not confirmed')");
$message[] = 'Service requested successfully';

}
}

if(isset($message)){
    foreach($message as $message){
       echo '<div class="message" style="color:#db0000;margin-left: 307px;" ><span>'.$message.'</span> <i class="" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
 };


?>

        <?php
				/*$a=$_SESSION['name1'];
				if($a!=NULL){
				$conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
                $query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.username,order_tbl.quantity,order_tbl.amount,order_tbl.phone,order_tbl.pincode,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
                order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,laptops.vendor,
                laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
                FROM order_tbl
                INNER JOIN laptops
                ON order_tbl.lap_id = laptops.id
                where username='$a' ";
                $result=mysqli_query($conn,$query);
                $row1=mysqli_fetch_array($result);
                ?>*/
      
                $query="select * from reg where username = '$a'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>

            <div class="container">
                <div class="row">

                <div class="col-lg-6">
                    <div class="login__form" style="  margin-top: 30px;">
                      
                        <form action="#" method="POST">
                            <div class="input__item">
                            <input type="text" value="<?php echo$row['name']?>"disabled>
                            <span class="fas fa-user-alt"></span>
                            </div>
                            <div class="input__item">
                            <input  type="text" value="<?php echo$row['phone']?>"disabled>
                                <span class="fa fa-phone"></span>
                            </div>
                            <?php if ($row["city"]!=NULL) { ?>
                            <div class="input__item">
                            <input type="text" name="address" value="<?php echo $row['city'];?>, <?php echo $row['district'];?>, <?php echo $row['state'];?>, <?php echo $row['pincode']; ?>"disabled>
                            <span class="fa fa-map-marker"></span>    
                             </div> 
                             <?php } else { ?>
                            <a href="myprofile.php" class="button2"  style="margin-left: 0px;margin-bottom: 18px; width: 371px;"><i class="fa fa-map-marker" style="margin-left:-78px;"></i>&nbsp&nbsp&nbsp&nbspAdd Delivery Address</a>
                              
                            
                            <?php } ?> 

                             <div class="input__item">
                            <input type="text" name="order_id" placeholder="Enter order id" id="order_id" required >
                            <span class="fa fa-laptop"></span>
                            </div>
                            <span id="text1" style="position: absolute;margin-top: -21px;"></span>
                            
                            <div class="input">
                            <textarea placeholder="Enter complaint here...."  rows="7" cols="43" name="complaint" required></textarea>
                            </textarea>
                            <span class="fa fa-mail"></span>
                            </div>

                            <input type="hidden" name="address" value="<?php echo $row['city'];?>, <?php echo $row['district'];?>, <?php echo $row['state'];?>, <?php echo $row['pincode']; ?>">
                                        <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                    

                            <button type="submit" name="service" id="btn" class="button" style="width: 368px;">SUBMIT</button>          
                        </form>           
                    </div>
                </div>

               
               
       
             <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="login__register" style="margin-top:65px;">
                    <div id="result"></div>       
                    </div>
                </div>
            </div>
            <div class="parent"><button id="chat" class="round-6"><li class="fa fa-comments"></li></button></div>
    </section>
</main>


 </div>
 <script>
$(document).ready(function(){
load_data();
function load_data(query)
{
    $.ajax({
        url:"service_fetch.php",
        method:"post",
        data:{query:query},
        success:function(data)
        {
            $('#result').html(data);
        }
    });
}

$('#order_id').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
        load_data(search);
    }
    else
    {
        load_data();			
    }
});
});
</script>


<script>
$(document).ready(function() {
  $('#chat').click(function() {
    load_data($(this).val());
  });

  function load_data(chatValue) {
    $.ajax({
      url: "service_fetch.php",
      method: "post",
      data: { chat: chatValue },
      success: function(data) {
        $('#result').html(data);
      }
    });
  }
});
</script>


    

 <footer class="site-footer" style="width:100%;">
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