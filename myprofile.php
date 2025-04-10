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
            var mod2=0;
            var mod3=0;
            var mod4=0;
            var mod5=0;
			var mod6=0;
            $("#name").keyup(function(){
         			 var n=document.getElementById("name");
         			 var letter=/[A-Za-z]+$/;
         			
                     if(!n.value.match(letter))
        			  {
         				   document.getElementById("text1").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
						  
						mod1=1;
          			  }
         					 else 
        			  {
             				 document.getElementById("text1").innerHTML = "<span class='error'></span>";
							  $('.button').attr("disabled", false);
                         mod1=0;
          			   }
          			}),


                        $(document).ready(function(){ 
					$('#phone').keyup(function(){
					var phone = $(this).val();
					var ad = /([789][0-9]{9})+$/;
					r_uname=ad.test(phone);
					if (!r_uname) {
									$("#text3").html("<span class='error'>Please enter a valid phone number</span>");
									mod2=1;
								} else {
									
					$.ajax({
					url:'phonevalid.php',
					method:"POST",
					data:{phone:phone},
					success:function(data)
					{
                
					if(data != '0')
					{
					$('#text3').html('<span class="error">Phone number already exist</span>');
                    mod2=1;
					}
					else
					{
                        mod2=0;
					$('#text3').html('<span class="text-success">Phone number valid</span>');
					$('.button').attr("disabled", false);
                }
					}
					})
					}
					})

					});

					
                        $(document).ready(function(){ 
					$('#email').keyup(function(){
					var email = $(this).val();
					var ad = /\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					r_uname=ad.test(email);
					if (!r_uname) {
									$("#text4").html("<span class='error'>Please enter a valid email</span>");
									mod3=1;
								} else {
									
					$.ajax({
					url:'emailvalid.php',
					method:"POST",
					data:{email:email},
					success:function(data)
					{
                
					if(data != '0')
					{
					$('#text4').html('<span class="error">Email Already exist</span>');
                    mod3=1;
					}
					else
					{
                        mod3=0;
					$('#text4').html('<span class="text-success">Email valid</span>');
					$('.button').attr("disabled", false);
                }
					}
					})
					}
					})

					});


                            $(document).ready(function(){ 
                            $('#username').keyup(function(){
                            var username = $(this).val();
                            var ad = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/;
                            r_uname=ad.test(username);
                            if (!r_uname) {
                                            $("#text5").html("<span class='error'>Please enter a valid user name</span>");
                                           mod4=1;
                                        } else {
                                            
                            $.ajax({
                            url:'usernamevalid.php',
                            method:"POST",
                            data:{username:username},
                            success:function(data)
                            {
                            if(data != '0')
                            {
                            $('#text5').html('<span class="error">Username Already exist</span>');
                            mod4=1;
                            }
                            else
                            {
                                mod4=0;
                            $('#text5').html('<span class="text-success">Username valid</span>');
                            $('.button').attr("disabled", false);
                            }
                            }
                            })
                            }
                            })
                            });


                            $("#pincode").keyup(function(){
         			 var n=document.getElementById("pincode");
         			 var letter= /([6789][0-9]{5})+$/;
         			
                     if(!n.value.match(letter))
        			  {
         				   document.getElementById("text8").innerHTML = "<span class='error'>This is not a valid pincode.</span>";
						  
						mod7=1;
          			  }
         					 else 
        			  {
             				 document.getElementById("text8").innerHTML = "<span class='error'></span>";
							  $('.button').attr("disabled", false);
                         mod7=0;
          			   }
          			}),


                      $("#city").keyup(function(){
         			 var n=document.getElementById("city");
         			 var letter=/[A-Za-z]+$/;
         			
                     if(!n.value.match(letter))
        			  {
         				   document.getElementById("text9").innerHTML = "<span class='error'>This is not a valid city name.</span>";
						  
						mod8=1;
          			  }
         					 else 
        			  {
             				 document.getElementById("text9").innerHTML = "<span class='error'></span>";
							  $('.button').attr("disabled", false);
                         mod8=0;
          			   }
          			}),

                      $("#district").keyup(function(){
         			 var n=document.getElementById("district");
         			 var letter=/[A-Za-z]+$/;
         			
                     if(!n.value.match(letter))
        			  {
         				   document.getElementById("text10").innerHTML = "<span class='error'>This is not a valid district name.</span>";
						  
						mod9=1;
          			  }
         					 else 
        			  {
             				 document.getElementById("text10").innerHTML = "<span class='error'></span>";
							  $('.button').attr("disabled", false);
                         mod9=0;
          			   }
          			}),

                      $("#state").keyup(function(){
         			 var n=document.getElementById("state");
         			 var letter=/[A-Za-z]+$/;
         			
                     if(!n.value.match(letter))
        			  {
         				   document.getElementById("text11").innerHTML = "<span class='error'>This is not a valid state name.</span>";
						  
						mod10=1;
          			  }
         					 else 
        			  {
             				 document.getElementById("text11").innerHTML = "<span class='error'></span>";
							  $('.button').attr("disabled", false);
                         mod10=0;
          			   }
          			}),

                  $("#psswd").keyup(function () {
                    var n6 = document.getElementById("psswd");
                    var ps = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                    
                    if (!n6.value.match(ps)) {
                        document.getElementById("text6").innerHTML = "<span class='error'>This is not a valid Password</span>";
                        
                        mod5=1;

                    }
                    else  {
                        document.getElementById("text6").innerHTML = "<span class='error'></span>";
                        $('.button').attr("disabled", false);
                        mod5=0;

                    }
                }),

                $("#cpsswd").keyup(function () {
                    var n7 = document.getElementById("psswd");
                    var n8 = document.getElementById("cpsswd");
    

                    if (n7.value == n8.value) {
                       
                        document.getElementById("text7").innerHTML = "<span class='error'></span>";
                        $('.button').attr("disabled", false);
						mod6=0;

                    }
                    else {
                        document.getElementById("text7").innerHTML = "<span class='error'> Password Missmatch</span>";
                        mod6=1;

                    }

					$(".button").click(function(){
							if(mod1==1 || mod2==1 || mod3==1 || mod4==1 || mod5==1 || mod6==1)
                        {
                       $('.button').attr   ("disabled", true);
                          }
                          else{
                            $('.button').attr("disabled", false);
                          }
						})
		
       				  });
               
                });
   </script>
           
           

        <?php
				$a=$_SESSION['name1'];
				if($a!=NULL){
                $query="select * from reg where username = '$a'";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_array($result);
                ?>
        <section class="side-section section-padding">

            <div class="container">
                <div class="row">

                <div class="col-lg-6">
                    <div class="login__form" style="  margin-top: 197px;">
                      
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
                          
                          
                            
                            <?php if ($row['city']==NULL) { ?>
                                <a href="editprofile.php" class="button6" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="margin-left: 0px;margin-bottom: 18px; width: 369px;"><i class="fa fa-map-marker" style="margin-left:-78px;"></i>&nbsp&nbsp&nbsp&nbspAdd Address</a>
                            <?php } else {?> 

                                <div class="input__item">
                            <input  type="text" value="<?php echo$row['pincode']?>"   disabled>
                            <span class="fa fa-map-pin"></span>                  
                            </div>
                                <div class="input__item">
                            <input  type="text"value="<?php echo$row['city']?>, <?php echo$row['district']?>, <?php echo$row['state']?>"  disabled>
                            <span class="fa fa-map-marker"></span>           
                            </div>

                                <?php } ?>       
        
                            
                            <div class="input__item">
                            <input  type="text"value="<?php echo$row['username']?>"disabled>
                                <span class="fa fa-user-circle-o"></span>              
                            </div>
                                                       
                            <div class="input__item">
                            <input value="<?php echo$row['password']?>"type="password"  disabled >
                                <span  class="fa fa-lock"></span>
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
                    <button  id="accesscamera" data-toggle="modal" data-target="#photoModal"class="button-7" style="margin-left: -114px; width: 245%;"><h6><i class="fa fa-camera" style="color:white;" aria-hidden="true">&nbsp Capture photo</i></h6></button><br><br>
                        <a href="editprofile.php" class="button4" id="edit" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: -114px; width: 245%;">EDIT PROFILE</a><br><br>
                        <a href="order.php" class="button4"  style="margin-left: -114px; width: 245%;">MY ORDERS</a><br><br>
                        <a href="wishlist.php" class="button4"  style="margin-left: -114px; width: 245%;">MY WISHLIST</a><br><br>
                        <a href="logout.php" class="button5"  style="margin-left: -114px; width: 245%;">LOGOUT NOW</a><br><br>
                        <a href="deactivate.php" class="button5"  style="margin-left: -114px; width: 245%;">DEACTIVATE ACCOUNT</a>
                        
                    </div>
                </div>
            </div>
            </section>
</main>

<!-- Edit profile modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE PROFILE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="side-section section-padding">

                    <div class="login__form"  style="margin-left: -96px;">
                     
                        <form action="#" method="POST">
                            <div class="input__item">
                            <input type="text" value="<?php echo$row['name']?>" id="name" name="name" required>
                            <span class="fa fa-address-card-o"></span>
                            </div>
                            <span id="text1" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input  type="text" placeholder="<?php echo$row['phone']?>" id="phone" name="phone" maxlength="10"  required>
                                <span class="fa fa-phone"></span>
                            </div>
                            <span id="text3" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input  type="text"placeholder="<?php echo$row['email']?>" id="email" name="email" required>
                                <span class="fa fa-envelope"></span>                   
                            </div>
                            <span id="text4" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input  type="text"placeholder="<?php echo$row['username']?>" id="username" name="username"  required>
                                <span class="fa fa-user-circle-o"></span>              
                            </div>
                            <span id="text5" style="position: absolute;margin-top: -21px;"></span><p id="availability"></p>                  
                            <div class="input__item">
                            <input placeholder="Enter New Password" id="psswd" name="psswd" type="password"  required >
                                <span  class="fa fa-lock"></span>
                            </div>  
                            <span id="text6" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input placeholder="Confirm Password" id="cpsswd" name="cpsswd" type="password" required>
                                <span  class="fa fa-lock"></span> 
                            </div>
                            <span id="text7" style="position: absolute;margin-top: -21px;"></span>                     
                            <button type="submit" name="submit" id="btn" class="button" style="width: 368px;">UPDATE NOW</button>
                
                        </form>           
                    </div>
                </div>
      </div>

    </div>
  </div>
</div>
 </section>


 
<!-- Edit address modal-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD ADDRESS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="side-section section-padding">

                    <div class="login__form"  style="margin-left: -96px;">
                     
                        <form action="#" method="POST">

                            <div class="input__item">
                            <input  type="text"placeholder="Pincode" id="pincode" name="pincode" required>
                                <span class="fa fa-map-pin"></span>                   
                            </div>
                            <span id="text8" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input  type="text"placeholder="City" id="city" name="city" required>
                                <span class="fa fa-map-marker"></span>                   
                            </div>
                            <span id="text9" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input  type="text"placeholder="District" id="district" name="district" required>
                                <span class="fa fa-map-marker"></span>                   
                            </div>
                            <span id="text10" style="position: absolute;margin-top: -21px;"></span>
                            <div class="input__item">
                            <input  type="text"placeholder="State" id="state" name="state" required>
                                <span class="fa fa-map-marker"></span>                   
                            </div>
                            <span id="text11" style="position: absolute;margin-top: -21px;"></span>
                    
                            <button type="submit" name="submit1" id="btn" class="button" style="width: 368px;">ADD DETAILS</button>
                
                        </form>           
                    </div>
                </div>
      </div>

    </div>
  </div>
</div>
 </section>


    <!--photo capture modal-->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                    </div>
                    <div id="results" class="d-none"></div>
                    <form method="post" id="photoForm">
                        <input type="hidden" id="photoStore" name="photoStore" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-7" id="takephoto">Capture Photo</button>
                    <button type="button" class="button-7 d-none" id="retakephoto" >Retake</button>&nbsp&nbsp&nbsp
                    <button type="submit" class="button-7 d-none" id="uploadphoto" form="photoForm" onclick = "window.location.href='myprofile.php';">Upload</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="./plugin/sweetalert/sweetalert.min.js"></script>
    <script src="./plugin/webcamjs/webcam.min.js"></script>
    <script src="main.js"></script>


    
    <?php
if($row['file']!=NULL and $row['city']==NULL)
				{
					?>
<form class="form" id = "form" action=""method="POST" enctype="multipart/form-data">	
	
	<div class="upload"> 
	<div class="editprof">
                    <img src="./uploads/<?php echo $row['file']; ?>"width="50" height="50">
					</form>
        <div class="round">
          <input type="file" name="file" id = "file" accept=".jpg, .jpeg, .png">
		  <div style="margin-top:1px">  <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
	  </div>
	  </div>
            </form>
                <?php
                }
            else if($row['file']!=NULL and $row['city']!=NULL){
                ?>

    <form class="form" id = "form" action=""method="POST" enctype="multipart/form-data">	
	
	<div class="upload1"> 
	<div class="viewprof">
    <img src="./uploads/<?php echo $row['file']; ?>"width="50" height="50">
					</form>
        <div class="round">
          <input type="file" name="file" id = "file" accept=".jpg, .jpeg, .png">
		  <div style="margin-top:1px">  <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
	  </div>
	  </div>
     </form>

         <?php
            } 
            else if($row['file']==NULL and $row['city']==NULL){
                ?>

    <form class="form" id = "form" action=""method="POST" enctype="multipart/form-data">	
	
	<div class="upload"> 
	<div class="editprof">
    <img  src="./images/prof.png " height="50" width="50">
					</form>
        <div class="round">
          <input type="file" name="file" id = "file" accept=".jpg, .jpeg, .png">
		  <div style="margin-top:1px">  <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
	  </div>
	  </div>
     </form>

         <?php
            }
            else if($row['file']==NULL and $row['city']!=NULL){
                ?>

    <form class="form" id = "form" action=""method="POST" enctype="multipart/form-data">	
	
	<div class="upload1"> 
	<div class="viewprof">
    <img  src="./images/prof.png " height="50" width="50">
					</form>
        <div class="round">
          <input type="file" name="file" id = "file" accept=".jpg, .jpeg, .png">
		  <div style="margin-top:1px">  <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
	  </div>
	  </div>
     </form>

         <?php
            }
            ?>



<script type="text/javascript">
	document.getElementById("file").onchange = function(){
		document.getElementById("form").submit();
	};
  </script>

	<?php
	if(isset($_FILES["file"]["name"])){

  
		$imageName = $_FILES["file"]["name"];
		$imageSize = $_FILES["file"]["size"];
		$tmpName = $_FILES["file"]["tmp_name"];
  
		// Image validation
		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $imageName);
		$imageExtension = strtolower(end($imageExtension));
		if (!in_array($imageExtension, $validImageExtension)){
		  echo
		  "
		  <script>
			alert('Invalid Image Extension');
		  </script>
		  ";
		}
		else{
		  $newImageName =  $imageName; // Generate new image name
		  $query = "UPDATE reg SET file = '$newImageName' WHERE username = '$a'";
		  mysqli_query($conn, $query);
		  move_uploaded_file($tmpName, 'uploads/' . $newImageName);
          ?><script>
		  window.location.href = 'myprofile.php';
	   </script>
	   <?php
		}
	  }

 ?>
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
    
<?php

if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["psswd"];


    $query="update reg set phone='$phone',email='$email',username='$username',password='$password' where username = '$a'";
    $result=mysqli_query($conn,$query);

    mysqli_query ($conn,"update cart set person='$username' where person = '$a'");

    mysqli_query ($conn,"update compare set person='$username' where person = '$a'");
    
    mysqli_query ($conn,"update wishlist set person='$username' where person = '$a'");
    
    mysqli_query ($conn,"update order_tbl set username='$username' where username = '$a'");
    
    mysqli_query ($conn,"update payment set username='$username' where username = '$a'");
    
    mysqli_query ($conn,"update service set username='$username' where username = '$a'");

		if($result)
		{
					
			?><script>
				   window.location.href = 'signin.php';
				</script>
				<?php
		}
	}
	

    
if(isset($_POST["submit1"]))
{
    $pincode=$_POST["pincode"];
    $city=$_POST["city"];
    $district=$_POST["district"];
    $state=$_POST["state"];

    $query="update reg set pincode='$pincode',city='$city',district='$district',state='$state' where username = '$a'";
    $result=mysqli_query($conn,$query);

		if($result)
		{
					
			?><script>
				   window.location.href = 'myprofile.php';
				</script>
				<?php
		}
	}

 ?>

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