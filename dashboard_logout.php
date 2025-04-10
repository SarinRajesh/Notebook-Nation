<?php
    session_start();
    
if(isset( $_SESSION['name2']))
{
 session_destroy();
 echo "<script> location.href = 'dashboard_signin.php'</script>";
}
else
{
    echo "<script> location.href = 'dashboard_signin.php'</script>";
}
?>