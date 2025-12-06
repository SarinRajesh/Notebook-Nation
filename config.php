<?php
$conn = mysqli_connect(
    "sql105.infinityfree.com",   // MySQL Host Name
    "if0_40611957",              // MySQL User Name
    "Sarin0606",      // MySQL Password
    "if0_40611957_miniproject"   // Database name
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

 
 #   $conn = mysqli_connect('localhost', 'root', '', 'miniproject');
#    if(!$conn) die('error connecting to database')
?>
