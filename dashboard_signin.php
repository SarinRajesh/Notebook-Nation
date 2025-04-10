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
  <link rel="icon" href="images/logo.png" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme2">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body" style="height: 437px;">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="images/logo.png" height="120" width="150" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
      <form action="#" method="POST">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input name="usn" id="username" type="text" required class="form-control input-shadow" placeholder="Enter Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input name="psswd" type="password" id="password" required class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 <div class="form-group col-6">
			 </div>
			</div>
			 <button type="submit" name="submit" class="btn btn-light btn-block">Sign In</button>
			 
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
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
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
<!-- Database connectivity -->
<?php

if(isset($_POST["submit"]))
{
    $username=$_POST["usn"];
    $password=$_POST["psswd"];

       
        $query="select * from dashboard where username='$username' && password='$password' && status='active'";
		$result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);

		if($count>0)
		{
            
      if($row['role']=="admin")
      {
      $_SESSION['name2']=$username;
	       ?>
         <script>
				   window.location.href = 'dashboard_admin_cust_tables.php';
				</script>
				<?php
              
		}else  if($row['role']=="employee")
    {
    $_SESSION['name2']=$username;
       ?>
       <script>
         window.location.href = 'dashboard_emp_tables.php';
      </script>
      <?php
      }
      else  if($row['role']=="vendor")
    {
    $_SESSION['name2']=$username;
    $q="select name from dashboard where username='$username'";
    $r=mysqli_query($conn,$q);
    $ro=mysqli_fetch_array($r);

    $_SESSION['vendor']=$ro['name'];
       ?>
       <script>
         window.location.href = 'dashboard_vendor_tables.php';
      </script>
      <?php
      }
      else  if($row['role']=="delivery boy")
    {
    $_SESSION['name2']=$username;
       ?>
       <script>
         window.location.href = 'dashboard_delivery_boy_tables.php';
      </script>
      <?php
      }
      else {
      ?>
      <script>
      alert("Invalid username and password");
      </script>
      <?php
  }
}
}
    
    
 ?>


</body>

</html>