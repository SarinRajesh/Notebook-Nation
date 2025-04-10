<?php
  include 'config.php';

if(isset($_POST["username"]))
{
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$query = "SELECT * FROM reg WHERE username = '".$username."'";
$result = mysqli_query($conn, $query);
echo mysqli_num_rows($result);
}
?>