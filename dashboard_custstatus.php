<?php
    session_start();
    include 'config.php';

    $id=$_GET['id'];
 
    
    $query="select * from reg where id='$id'";
    $result=mysqli_query($conn,$query);
    While($data1=mysqli_fetch_array($result))
    {
                            $status=$data1['status'];
                            echo $status;
    }
    if($status=='active')
    {
        $query="update reg set status='inactive' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='dashboard_admin_cust_tables.php';
            </script>
            <?php
    }
    else{
        $query="update reg set status='active' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
            window.location.href='dashboard_admin_cust_tables.php';
            </script>
            <?php
    }
    
  