<?php
    session_start();
    ?>
<!doctype html>
<html lang="en">

<head>
       
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notebook Nation</title>
    <link rel="icon" href="./images/bgimg.jpg">
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php
$a=$_SESSION['name1'];
$conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
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
                            <a class="nav-link click-scroll" href="homeaccount.php#section_4">Service</a>
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
				$a=$_SESSION['name1'];
				if($a!=NULL){
				$conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
                $query="select * from reg where username = '$a'";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_array($result);
                ?>
        <section class="side-section section-padding">

            <div class="container">
                <div class="row">

                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>My Profile</h3>
                        <form action="#" method="POST">
                            <div class="input__item">
                            <input type="text" value="<?php echo$row['name']?>"disabled>
                            <span class="fa fa-address-card-o"></span>
                            </div>
                            <div class="input__item">
                            <input  type="text" value="<?php echo$row['phone']?>"disabled>
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="input__item">
                            <input  type="text"value="<?php echo$row['email']?>" disabled>
                                <span class="fa fa-envelope"></span>                   
                            </div>
                            <div class="input__item">
                            <input  type="text"value="<?php echo$row['username']?>"disabled>
                                <span class="fa fa-user-circle-o"></span>              
                            </div>
                                                       
                            <div class="input__item">
                            <input value="<?php echo$row['password']?>"type="password"  disabled >
                                <span  class="fa fa-lock"></span>
                            </div>                           
                            <div class="login__register">
                        <a href="logout.php" class="button">LOGOUT</a>
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
                    <h3 style="margin-top:74px; margin-left:-61px;"><?php echo$row['name']?></h3>
                    <h4 style="color:#fff; margin-left:-61px;">Do you want to edit profile?</h4><br>
                        <a href="editprofile.php" class="button2">EDIT NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="login__register" style="margin-top:-135px; margin-right:-1434px;">
                        <h4 style="color:#fff; margin-left:-61px;  margin-top:73px;">Do you want to deactivate account?</h4><br>
                        <a href="deactivate.php" class="button2">DEACTIVATE NOW</a>
                    </div>
                </div>
            </div>
    </section>
</main>

<?php
if($row['file']!=NULL)
				{
					?>
	<div class="upload"> 
	<div class="viewprof">
                    <img src="./uploads/<?php echo $row['file']; ?>"width="50" height="50">
          </div>
      </div>
               <?php 
               }
               else {
                ?>
               	<div class="upload"> 
	<div class="viewprof">
                <img  src="./images/prof.png " height="50" width="50">
                </div>
      </div>
               <?php }
	 ?>

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
                            <a href="#" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">About</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Artists</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Schedule</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Pricing</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Have a question?</h5>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 090-080-0760" class="site-footer-link">
                            090-080-0760
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:hello@company.com" class="site-footer-link">
                            hello@company.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>

                    <p class="text-white d-flex mt-3 mb-2">
                        Silang Junction South, Tagaytay, Cavite, Philippines</p>

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
                        <p class="copyright-text">Copyright © 2036 Festava Live Company</p>
                        <p class="copyright-text">Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
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