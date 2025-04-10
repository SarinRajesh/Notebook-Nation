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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
</head>

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
                            <a class="nav-link click-scroll"  href="home.html#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="home.html#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Shop</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="service.php">Service</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="home.html#section_6">Contact</a>
                        </li>
                        

                        <div class="dropdown " style="margin-right:65px;">
                              <a href=""><img  src="./images/cart.png "  height="50" width="50"/></a>
                               
                            </a>
                          </div> 

                                <div class="dropdown " style="margin-right:-111px;">
                                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" style="color: white" href="#" id="navbarDropdownMenuAvatar"
                                  role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                  <img  src="./images/prof.png " height="50" width="50" class="rounded-circle" 
                                    alt="profile pic" loading="lazy" />
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                  <li>
                                    <a class="dropdown-item" href="signup.php">Sign up</a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="signin.php">Sign in</a>
                                  </li>
                                </ul>
                              </div>    
                </div>
            </div>
        </nav>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
	
    $(document).ready(function(){
		 var mod1=0;
            var mod2=0;
            var mod3=0;
            var mod4=0;
            var mod5=0;
			var mod6=0;
                        $(document).ready(function(){ 
					$('#email').keyup(function(){
					var email = $(this).val();
					var ad = /\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					r_uname=ad.test(email);
					if (!r_uname) {
									$("#text4").html("<span class='error'>Please enter a valid email</span>");
									mod3=1;
								} 
					else
					{
                        mod3=0;
					$('#text4').html('<span class="error"></span>');
                    $('.button').attr("disabled", false);
                
					}
					}
                    )
					

					});

                    $(document).ready(function(){ 
                            $('#username').keyup(function(){
                            var username = $(this).val();
                            var ad = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/;
                            r_uname=ad.test(username);
                            if (!r_uname) {
                                            $("#text5").html("<span class='error'>Please enter a valid username</span>");
                                           mod4=1;
                                        } else {
                          
                                mod4=0;
                            $('#text5').html('<span class="error"></span>');
                            $('.button').attr("disabled", false);
                            }
                            }
                            )
                            
                            });
                           
            

					$(".button").click(function(){
							if(mod3==1 || mod4==1)
                        {
                       $('.button').attr   ("disabled", true);
                          }
                          else{
                            $('.button').attr("disabled", false);
                          }
						})
		
       				  });
               
               
           </script>

        <section class="side-section section-padding">

            <div class="container">
                <div class="row">

                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Change password</h3>
                        <form action="#" method="POST">
                        <div class="input__item">
                            <input placeholder="Enter username" name="username" id="username" type="text" required><br>
                                <span class="fa fa-user-circle-o"></span>
                            </div>
                            <span id="text5" style="position: absolute;margin-top: -21px;"></span><p id="availability"></p>
                            <div class="input__item">
                            <input placeholder="Enter email" name="email" id="email" type="text" required><br>
                                <span class="fa fa-envelope"></span>
                            </div>
                            <span id="text4" style="position: absolute;margin-top: -21px;"></span><p id="availability"></p>
                            <button type="submit" value="Send OTP" name="submit" class="button">Send OTP</button>
                        </form>
                    </div>
                </div>
      
      
    </section>
</main>


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

<?php
session_start();
if(isset($_POST["submit"]))
{
	$a=$_POST["email"];
    $b=$_POST["username"];
	

    $query="select * from reg where username='$b' && email='$a' && status='active' && role='customer'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);

    if($count>0)
    {
        $_SESSION["otp"]=$a
       ?><script>
              window.location.href='changepasswordcontroller.php';
            </script>
            <?php
          
    }
    else{
        ?>
        <script>
              alert("Username and email doesnot match");
            </script>
          <?php  

}

}
?>

</body>
</html>