<?php
    session_start();
    
if(isset( $_SESSION['name1']))
{
 session_destroy();
 echo "<script> location.href = 'signin.php'</script>";
}
else
{
 echo "<script> location.href = 'signin.php'</script>";
}
?>