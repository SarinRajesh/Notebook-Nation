<?php
    session_start();
      include 'config.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Notebook Nation</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="images/N.png" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
  
</head>

<?php
				$a=$_SESSION['name2'];
                $query="select * from dashboard where username = '$a'";
                $result=mysqli_query($conn,$query);
                 $row=mysqli_fetch_array($result);
                    

                    if ($a!=NULL) {
?>
<body class="bg-theme bg-theme8">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
		 		<img src="images/logo.png" height="60" width="60" alt="logo icon">
       <h5 class="logo-text">Notebook Nation</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">DASHBOARD</li>
      <li>
      
      <li>
        <a href="dashboard_emp_tables.php">
          <i class="zmdi zmdi-grid"></i> <span>Laptops Table</span>
        </a>
      </li>

      <li>
        <a href="dashboard_emp_order_tables.php">
          <i class="zmdi zmdi-grid"></i> <span>Orders Table</span>
        </a>
      </li>
      <li>
        <a href="dashboard_emp_delivery_tables.php">
          <i class="zmdi zmdi-grid"></i> <span>Delivery Table</span>
        </a>
      </li>
      <li>
        <a href="dashboard_emp_service_tables.php">
          <i class="zmdi zmdi-grid"></i> <span>Service Table</span>
        </a>
      </li>
      <li>
        <a href="dashboard_emp_addlap.php">
          <i class="zmdi zmdi-laptop"></i> <span>Add Laptops</span>
        </a>
      </li>

   
      <li><a href="dashboard_emp_order_refund.php"><i class="zmdi zmdi-coffee text-danger"></i> <span>Refund</span></a></li>



      <li class="sidebar-header">PROFILE</li>
      <li>
        <a href="dashboard_emp_profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>



      <li>
        <a href="dashboard_emp_calendar.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <!--<li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>-->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
				

    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
      <?php if($row['file']==NULL)
                       {?>
        <span class="user-profile"><img src="./images/prof.png " class="img-circle" alt="user avatar"></span>
                       <?php
                       }  else {
                        ?>
                         <span class="user-profile"><img src="./uploads/<?php echo $row['file']; ?>" class="img-circle" alt="user avatar"></span>
                       <?php
                       }
                       ?>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar">
             <?php if($row['file']==NULL)
                       {?>
                       <img class="align-self-start mr-3" src="./images/prof.png" alt="user avatar"></div>
                        <?php
                       }  else {
                        ?>
              <img class="align-self-start mr-3" src="./uploads/<?php echo $row['file']; ?>" alt="user avatar"></div>
              <?php
                       }
                       ?>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $row['name']; ?></h6>
            <p class="user-subtitle"><?php echo $row['email']; ?></p>
            </div>
           </div>
          </a>
        </li>
        
        <li class="dropdown-divider"></li>
        <a href="dashboard_emp_profile.php"> <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li></a>
        <li class="dropdown-divider"></li>
        <a href="dashboard_logout.php"><li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mt-3">
        <div class="col-lg-4">
           <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="images/bgimg.jpg" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
            <?php if($row['file']==NULL)
                       {?>
                     <img src="./images/prof.png" alt="profile-image" class="profile">
                        <?php
                       }  else {
                        ?>

                <img src="./uploads/<?php echo $row['file']; ?>" alt="profile-image" class="profile">
                        <?php
                       }
                       ?>

                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text">Our vision is to provide the best product discovery and shopping experience for our customers.</p>
                <div class="icon-block">
                  <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                </div>
            </div>

        </div>

        </div>

        <div class="col-lg-8">
           <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                </li>
              
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>
                                Employee, Notebook Nation
                            </p>
                            <br>
                           
                        </div>
            
                        <div class="col-md-12">
                        
                             <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>Name:</strong>  &nbsp&nbsp <?php echo $row['name']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Email:</strong> &nbsp &nbsp<?php echo $row['email']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Phone:</strong>   &nbsp&nbsp<?php echo $row['phone']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Username:</strong>  &nbsp &nbsp<?php echo $row['username']; ?>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>

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
							  $('#button').attr("disabled", false);
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
					url:'dashboard_phonevalid.php',
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
					$('#button').attr("disabled", false);
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
					url:'dashboard_emailvalid.php',
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
					$('#button').attr("disabled", false);
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
                            url:'dashboard_usernamevalid.php',
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
                            $('#button').attr("disabled", false);
                            }
                            }
                            })
                            }
                            })
                            });

                  $("#psswd").keyup(function () {
                    var n6 = document.getElementById("psswd");
                    var ps = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                    
                    if (!n6.value.match(ps)) {
                        document.getElementById("text6").innerHTML = "<span class='error'>This is not a valid Password</span>";
                        
                        mod5=1;

                    }
                    else  {
                        document.getElementById("text6").innerHTML = "<span class='error'></span>";
                        $('#button').attr("disabled", false);
                        mod5=0;

                    }
                }),

                $("#cpsswd").keyup(function () {
                    var n7 = document.getElementById("psswd");
                    var n8 = document.getElementById("cpsswd");
    

                    if (n7.value == n8.value) {
                       
                        document.getElementById("text7").innerHTML = "<span class='error'></span>";
                        $('#button').attr("disabled", false);
						mod6=0;

                    }
                    else {
                        document.getElementById("text7").innerHTML = "<span class='error'> Password Missmatch</span>";
                        mod6=1;

                    }

					$("#button").click(function(){
							if(mod1==1 || mod2==1 || mod3==1 || mod4==1 || mod5==1 || mod6==1)
                        {
                       $('#button').attr   ("disabled", true);
                          }
                          else{
                            $('#button').attr("disabled", false);
                          }
						})
		
       				  });
               
                });
   </script>


                <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissible" role="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-info"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
				    </div>
                  </div>
             
                </div>
                <div class="tab-pane" id="edit">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name:</label>
                            <div class="col-lg-9">
                            <input type="text" value= <?php echo $row['name']; ?> id="name" name="name"  class="form-control" disabled>
                            </div>
                            <span id="text1" style="position: absolute;margin-top: 35px;    margin-left: 210px;"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control"placeholder= <?php echo $row['phone']; ?> id="phone" name="phone" maxlength="10"  required>
                            </div>
                            <span id="text3" style="position: absolute;margin-top: 35px;    margin-left: 210px;"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email:</label>
                            <div class="col-lg-9">
                            <input type="text" class="form-control"placeholder= <?php echo $row['email']; ?> id="email" name="email" required>
                              </div>
                              <span id="text4" style="position: absolute;margin-top: 35px;    margin-left: 210px;"></span>
                        </div>
              
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username:</label>
                            <div class="col-lg-9">
                            <input  type="text"  class="form-control" placeholder= <?php echo $row['username']; ?> id="username" name="username"  required>
                            </div>
                            <span id="text5" style="position: absolute;margin-top: 35px;    margin-left: 210px;"></span><p id="availability"></p>           
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password:</label>
                            <div class="col-lg-9">
                            <input placeholder="Enter New Password" id="psswd" name="psswd" type="password" class="form-control"  required >
                            </div>
                            <span id="text6" style="position: absolute;margin-top: 35px;    margin-left: 210px;"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm Password:</label>
                            <div class="col-lg-9">
                            <input placeholder="Confirm Password" id="cpsswd" name="cpsswd" type="password" class="form-control"  required>
                            </div>
                            <span id="text7" style="position: absolute;margin-top: 35px; margin-left: 210px;"></span>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change profile:</label>
                            <div class="col-lg-9">
                                <input class="form-control"  name="file" type="file">
                            </div>
                        </div>
          
                        <div class="form-group">
            <button type="submit" id="button" name= "submit" class="btn btn-light px-5" style="margin-left: 320px;"><i class="icon-lock"></i> Update</button>
          </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
	
    </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © Notebook Nation
        </div>
      </div>
    </footer>
	<!--End footer-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->


  
<!-- Database connectivity -->
    
<?php

if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["psswd"];
    $cfile=$_FILES["file"]["name"];


    $query="update dashboard set phone='$phone',email='$email',username='$username',password='$password',file='$cfile' where username = '$a'";
    $result=mysqli_query($conn,$query);

		if($result)
		{
      $targetdir="uploads/";
      $targetfilepath=$targetdir.basename($cfile);
      move_uploaded_file($_FILES["file"]["tmp_name"],$targetfilepath);
			?><script>
				   window.location.href = 'dashboard_signin.php';
				</script>
				<?php
		}
	}
	

 ?>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <?php
      }
      else {
        echo "<script> location.href = 'dashboard_signin.php'</script>";
      }
      ?>
</body>
</html>
