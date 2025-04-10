<?php
    session_start();
    include 'config.php';
    
    $a=$_SESSION['name1'];
    $query="update reg set status ='inactive' where username='$a'";
    $result=mysqli_query($conn,$query);

		if($result)
		{
	         
			 ?><script>
             alert("ACCESS REMOVED SUCCESSFULLY");
             window.location.href = 'signin.php';
              
			 </script>
				<?php
		}