<?php
    session_start();
    

    $id=$_GET['id'];
    echo $id;
    $conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
    
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
             window.location.href='dashboard_admin.php';
            </script>
            <?php
    }
    else{
        $query="update reg set status='active' where id='$id'";
        $result=mysqli_query($conn,$query);
        ?>
        <script>
            window.location.href='dashboard_admin.php';
            </script>
            <?php
    }
    
  