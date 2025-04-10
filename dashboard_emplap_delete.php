<?php
    session_start();
      include 'config.php';
    
    $id=$_GET['id'];
        $query="delete from laptops where id= '$id'";
		$result=mysqli_query($conn,$query);

		if($result)
		{
	
			 ?><script>
             alert("LAPTOP REMOVED SUCCESSFULLY");
             window.location.href = 'dashboard_emp_tables.php';
              
			 </script>
				<?php
		}
        ?>