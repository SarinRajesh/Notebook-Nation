<?php
  include 'config.php';
  
// echo "Working..";
if(isset($_POST["password"]))
{
  
    // echo $email;
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$query = "SELECT * FROM reg WHERE password = '".$password."'";
$result = mysqli_query($conn, $query);
echo mysqli_num_rows($result);
}
?>