<?php
    session_start();
    include 'config.php';

    $id=$_GET['id'];
 
    
    $query="select * from dashboard where id='$id'";
    $result=mysqli_query($conn,$query);
    While($data1=mysqli_fetch_array($result))
    {
                            $available=$data1['available'];
                         
    }
    if($available=='not available')
    {
        $query="update dashboard set available='available' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='dashboard_delivery_boy_status.php';
            </script>
            <?php
    }
    else{
        $query="update dashboard set available='not available' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
            window.location.href='dashboard_delivery_boy_status.php';
            </script>
            <?php
    }
    
  