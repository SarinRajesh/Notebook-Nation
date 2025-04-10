<?php 
 include 'config.php';
// echo "Working..";
if(isset($_POST["email"]))
{
  
    // echo $email;
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$query = "SELECT * FROM dashboard WHERE email = '".$email."'";
$result = mysqli_query($conn, $query);
echo mysqli_num_rows($result);
}
?>