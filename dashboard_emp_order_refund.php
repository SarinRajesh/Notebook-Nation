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


<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid" style="margin-left:-1%">
     
      <div class="row mt-3" style="margin-right:-1229.5px">
        
        <div class="col-lg-6">
          <div class="card" style="width:103%">
            <div class="card-body" style="margin-left:-1%">
              <h5 class="card-title">Refund Table</h5>
			  <div class="table-responsive" id="table">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Order id</th>
                    <th scope="col">Person</th>
                    <th scope="col"></th>
                    <th scope="col">Laptops</th>
                    <th scope="col">Quantity</th>
              
                    <th scope="col">Date orderd</th>
                    <th scope="col">Refund<br>amount</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
             
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                  <form action="#" method="POST">
                    
                    <?php
                  $query="SELECT order_tbl.username,order_tbl.order_id,order_tbl.lap_id,order_tbl.amount,order_tbl.quantity,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,order_tbl.refund, laptops.file,laptops.name,laptops.processor,
                  laptops.ram,laptops.storage,laptops.display,laptops.price
                  FROM order_tbl
                  INNER JOIN laptops
                  ON order_tbl.lap_id = laptops.id 
                  where order_status = 'cancelled'  ORDER BY order_tbl.order_date desc";
            
                  $result=mysqli_query($conn,$query);
                  while($row = mysqli_fetch_array($result)){
                    ?>
                    
                    <form action="#" method="POST">
                    
                      <td><?php echo $row['order_id'];?></td>
                      <td><?php echo $row['username'];?></td>
                      <td><img class="" src="./uploads/<?php echo $row['file']; ?>" alt="" style="width: 40px; height: 40px;"></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['quantity'];?></td>
                      <td><?php echo $row['order_date'];?></td>
                      <td><?php echo $row['amount'];?></td>
                    
                      <input type="hidden"  value="<?php echo $row['amount'];?>" name="amt" id="amt-<?php echo $row['order_id']; ?>">
                      <input type="hidden"  value="<?php echo $row['order_id'];?>" name="order_id" id="order_id-<?php echo $row['order_id']; ?>">
                           
                      <?php 
                      if ($row['refund']=="Completed")
                      { 
                      ?>
                        <td style="color:lightgreen"><?php echo $row['refund'];?></td>
                        <td> <button class="btn btn-success" disabled>Completed</button></td>
                      <?php 
                      } else  {
                      ?>
                        <td style="color:red">Not completed</td>             
                        <td>  
                          <button type="button" class="btn btn-danger"  name="btn" id="btn-<?php echo $row['order_id']; ?>" value="Pay Now" onclick="pay_now('<?php echo $row['order_id']; ?>')">Pay Now</button>
                        </td>
                      <?php 
                      }
                      ?>
                                         
                    </form>
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


      
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    
                    <script>
                      function pay_now(order_id){
                        var amt=jQuery('#amt-'+order_id).val();
        var order_id=jQuery('#order_id-'+order_id).val();

         jQuery.ajax({
               type:'post',
               url:'dashboard_refund_status.php',
               data:"amt="+amt+"&order_id="+order_id,
              success:function(result){
                   var options = {
                        "key": "rzp_test_3ybzcJKABRAGdi", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Notebook Nation",
                        "description": "Test Transaction",
                        "image": "./images/N.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'dashboard_refund_status.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="dashboard_emp_order_refund.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>


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
