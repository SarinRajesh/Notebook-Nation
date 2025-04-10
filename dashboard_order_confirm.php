<?php
    session_start();
    include 'config.php';

    $id=$_GET['id'];
    
    $query="select * from  order_tbl where order_id='$id'";
    $result=mysqli_query($conn,$query);
    While($data1=mysqli_fetch_array($result))
    {
                            $status=$data1['order_status'];
                          
    }
    if($status=='Not confirmed')
    {
        $query="update order_tbl set order_status='Confirmed' where order_id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
             window.location.href='dashboard_emp_order_tables.php';
            </script>
            <?php
    }
 
    
  