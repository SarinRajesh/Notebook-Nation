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

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-6" style="margin-left: 271px;">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add Laptops</div>
           <hr>
           <form action="#" method="POST" enctype="multipart/form-data">
           <div class="form-group">
            <label for="input-1">Vendor:</label>
            <input type="text" placeholder="Vendor" id="brand" name="brand"  class="form-control" required>
           </div>
           <div class="form-group">
            <label for="input-1">Name:</label>
            <input type="text" placeholder="Name" id="name" name="name"  class="form-control" required>
           </div>
           <div class="form-group">
            <label for="input-2">Processor:</label><br>
            <input type="radio"name="processor"value="AMD Ryzen 5"required>&nbspAMD Ryzen 5&nbsp&nbsp
            <input type="radio"name="processor"value="INTEL i5"required>&nbspINTEL i5&nbsp&nbsp<br>
            <input type="radio"name="processor"value="AMD Ryzen 7"required>&nbspAMD Ryzen 7&nbsp&nbsp
            <input type="radio"name="processor"value="INTEL i7"required>&nbspINTEL i7&nbsp&nbsp<br>
            <input type="radio"name="processor"value="AMD Ryzen 9"required>&nbspAMD Ryzen 9&nbsp&nbsp
            <input type="radio"name="processor"value="INTEL i9"required>&nbspINTEL i9&nbsp
           </div>
           <div class="form-group">
            <label for="input-3">Ram:</label><br>
            <input type="radio"name="ram"value="8GB"required>&nbsp8GB&nbsp
            <input type="radio"name="ram"value="16GB"required >&nbsp16GB&nbsp
            <input type="radio"name="ram"value="32GB" required>&nbsp32GB&nbsp
           </div>
           <div class="form-group">
            <label for="input-4">Storage:</label><br>
            <input type="radio"name="storage"value="1TB HDD" required >&nbsp1TB HDD&nbsp&nbsp
            <input type="radio"name="storage"value="512GB SSD" required >&nbsp512GB SSD&nbsp&nbsp<br>
            <input type="radio"name="storage"value="1TB SSD" required >&nbsp1TB SSD&nbsp&nbsp
            <input type="radio"name="storage"value="1TB HDD+256GB SSD" required >&nbsp1TB HDD + 256GB SSD&nbsp&nbsp
           </div>          
           <div class="form-group">
            <label for="input-5">Display:</label><br>
            <input type="radio"name="display"value="14inch" required >&nbsp14"inch&nbsp
            <input type="radio"name="display"value="15.6inch"  required >&nbsp15.6"inch&nbsp
            <input type="radio"name="display"value="17.3inch"  required >&nbsp17.3"inch&nbsp
           </div>
           <div class="form-group">
            <label for="input-6">Price:</label>
            <input placeholder="Price" id="price" name="price" type="number" class="form-control"  required>
           </div>
           <div class="form-group">
            <label for="input-6">Choose Image:</label>
            <input placeholder="file" id="file" name="file" type="file" class="form-control"  required>
           </div>

           <div class="form-group py-2">
             <div class="icheck-material-white">
            <input type="checkbox" id="user-checkbox1" checked=""/>
            <label for="user-checkbox1">I Agree Terms & Conditions</label>
            </div>
           </div>
           <div class="form-group">
            <button type="submit" id="button" name= "submit" class="btn btn-light px-5"><i class="icon-lock"></i>Add</button>
          </div>
          </form>
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
          Copyright © Notebbok Nation
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
    $brand=$_POST["brand"];
    $name=$_POST["name"];
	$processor=$_POST["processor"];
    $ram=$_POST["ram"];
    $storage=$_POST["storage"];
    $display=$_POST["display"];
    $price=$_POST["price"];
    $cfile=$_FILES["file"]["name"];

	$sql="select * from laptops where vendor='$brand' and name='$name' and processor='$processor'";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0)	
	   {
		?>
		<script>
		alert("LAPTOP ALREADY EXIST!");
		</script>
		<?php
	}
	else
	{

        $query="insert into laptops(vendor,name,processor,ram,storage,display,price,file) 
		values('$brand','$name','$processor','$ram','$storage','$display','$price','$cfile')";
		$result=mysqli_query($conn,$query);

		if($result)
		{
					
			$targetdir="uploads/";
					$targetfilepath=$targetdir.basename($cfile);
					move_uploaded_file($_FILES["file"]["tmp_name"],$targetfilepath);
					
                ?><script>
				alert("LAPTOP ADDED SUCCESSFULLY");
				   window.location.href = 'dashboard_emp_tables.php';
				</script>
				<?php
		}
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
