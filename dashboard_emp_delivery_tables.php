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
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control"  id="searchInput" onkeyup="searchTable()" placeholder="Search for items...">
      </form>
    </li>
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

<?php


if(isset($_POST['update_update_btn'])){
   $update_date = $_POST['update_date'];
   $update_id = $_POST['update_id'];
  $update_boy = $_POST['update_boy'];

  $update_query = mysqli_query($conn, "UPDATE `order_tbl` SET delivery_boy = '$update_boy',delivery_date = '$update_date' WHERE order_id = '$update_id'");
  if($update_query){
     ?><script>window.locatio.href='dashboard_emp_delivery_tables.php';</script>
     <?php
  };
};
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid" style="margin-left:-1%">
     
      <div class="row mt-3" style="margin-right:-1229.5px">
        
        <div class="col-lg-6">
          <div class="card" style="width:103%">
            <div class="card-body" style="margin-left:-1%">
              <h5 class="card-title">Delivery Table of Confirmed Orders</h5>
			  <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                  <th scope="col">Customer</th>
                    <th scope="col">Phone and Address</th>
                    <th scope="col">Laptops</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Assign Delivery date and Delivery boy</th>
             
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                  $query="SELECT order_tbl.fullname,order_tbl.order_id,order_tbl.lap_id,order_tbl.amount,order_tbl.phone,order_tbl.quantity,order_tbl.city,order_tbl.district,order_tbl.state,order_tbl.pincode, order_tbl.order_date,order_tbl.order_status, laptops.file,laptops.name,laptops.processor,
                  order_tbl.delivery_status,order_tbl.delivery_boy,order_tbl.delivery_date,laptops.ram,laptops.storage,laptops.display,laptops.price
                  FROM order_tbl
                  INNER JOIN laptops
                  ON order_tbl.lap_id = laptops.id where order_status='Confirmed'  ORDER BY order_tbl.order_date desc";
            
                  $result=mysqli_query($conn,$query);
                
                  while($row = mysqli_fetch_array($result)){
              
                                
                      ?>  <td><?php echo $row['fullname'];?></td>
                      <td><?php echo $row['phone'];?><br>
                      <?php echo $row['city'];?><br>
                      <?php echo $row['district'];?><br>
                      <?php echo $row['state'];?><br>
                      <?php echo $row['pincode'];?></td>
                      <td><img class="" src="./uploads/<?php echo $row['file']; ?>" alt="" style="width: 40px; height: 40px;"><br><?php echo $row['name'];?><br>
                      Order id : <?php echo $row['order_id'];?><br>
                    Laptop id : <?php echo $row['lap_id'];?></td>
                      <td><?php echo $row['quantity'];?></td>
                      <td><?php echo $row['price'];?></td>
                     
                      <?php if ($row['delivery_status']!='Delivered') { ?>
                      <td> <form action="" method="post">
                                <input type="hidden" name="update_id"  value="<?php echo $row['order_id']; ?>" >
                                <input style="width: 140px; height: 30px" type="date" name="update_date"   value="<?php echo $row['delivery_date']; ?>" required>
                            <br>
                               <select style="width: 158px; height: 30px; background:white; color:black;width: 140px;margin-top: 8px;" type="text" name="update_boy" required >
                                <option style="background:white; color:black;" value="" disabled selected><?php echo $row['delivery_boy']; ?></option>
                              
                                <?php
                                $query1="select * from dashboard where role='delivery boy'";
                                $result1=mysqli_query($conn,$query1);
                                while( $row1=mysqli_fetch_array($result1)) {
                                
                                   if($row1['available']=='not available') { ?>
                                <option style="background:white; color:red;" value="<?php echo $row1['username']; ?>" disabled><?php echo $row1['username']; ?>(not available)</option>
                                   <?php } else { ?>
                                    <option style="background:white; color:green;" value="<?php echo $row1['username']; ?>" required><?php echo $row1['username']; ?></option>
                             <?php  } } ?>
                               </select>
                           <br> <button type="submit" value="update"  class="button-7" name="update_update_btn" style="margin-top:8px;margin-left: 33px;">Assign</button></td> 
                      </form>
                      <?php } else {?>
                        <td> 
                                <input style="width: 140px; height: 30px" type="date" name="update_date"   value="<?php echo $row['delivery_date']; ?>" disabled>
                            <br>
                               <select style="width: 158px; height: 30px; background:white; color:black;width: 140px;margin-top: 8px;" type="text" name="update_boy" disabled >
                                <option style="background:white; color:black;" value="" disabled selected><?php echo $row['delivery_boy']; ?></option>
                              
                                <?php
                                $query1="select * from dashboard where role='delivery boy'";
                                $result1=mysqli_query($conn,$query1);
                                while( $row1=mysqli_fetch_array($result1)) {
                                
                                   if($row1['available']=='not available') { ?>
                                <option style="background:white; color:red;" value="<?php echo $row1['username']; ?>" disabled><?php echo $row1['username']; ?>(not available)</option>
                                   <?php } else { ?>
                                    <option style="background:white; color:green;" value="<?php echo $row1['username']; ?>" required><?php echo $row1['username']; ?></option>
                             <?php  } } ?>
                               </select>
                           <br> <button type="submit" value="update"  class="button-7" name="update_update_btn" style="margin-top:8px;margin-left: 33px;" disabled>Assigned</button></td> 

                      <?php } ?>
                    </tr>
                    <?php
                    } 
                    ?>
              </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
        
      </div><!--End Row-->
      <script>
function searchTable() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
 
  // Loop through all table rows, and hide those that don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      txtValue = td[j].textContent || td[j].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        break;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
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
          Copyright © Notebook Nation Dashboard
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
