<?php
    session_start();
    include 'config.php';

    $id=$_GET['id'];
    $query="select * from  service where id='$id'";
    $result=mysqli_query($conn,$query);
    While($data1=mysqli_fetch_array($result))
    {
                            $status=$data1['status'];
                          
    }
    if($status=='Not confirmed')
    {
        $query="update service set status='Rejected' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='dashboard_emp_service_tables.php';
            </script>
            <?php
    }
 
    
  