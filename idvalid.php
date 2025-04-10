<?php
session_start();
include 'config.php';

$a=$_SESSION['name1'];
if(isset($_POST["order_id"]))
{
$order_id = mysqli_real_escape_string($conn, $_POST["order_id"]);
$query = "SELECT * FROM order_tbl WHERE username='$a' and delivery_status='Delivered' and order_id = '".$order_id."'";
$result = mysqli_query($conn, $query);
echo mysqli_num_rows($result);
}


?>