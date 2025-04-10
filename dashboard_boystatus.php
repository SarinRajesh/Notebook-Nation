<?php
    session_start();
    include 'config.php';

    $id=$_GET['id'];
 
    
    $query="select * from dashboard where id='$id'";
    $result=mysqli_query($conn,$query);
    While($data1=mysqli_fetch_array($result))
    {
                            $status=$data1['status'];
                         
    }
    if($status=='active')
    {
        $query="update dashboard set status='inactive' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='dashboard_admin_delivery_boy_tables.php';
            </script>
            <?php
    }
    else{
        $query="update dashboard set status='active' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
            window.location.href='dashboard_admin_delivery_boy_tables.php';
            </script>
            <?php
    }
    
  