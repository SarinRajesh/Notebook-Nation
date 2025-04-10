<?php
  include 'config.php';

if(isset($_POST["phone"]))
{
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$query = "SELECT * FROM reg WHERE phone = '".$phone."'";
$result = mysqli_query($conn, $query);
echo mysqli_num_rows($result);
}
?>