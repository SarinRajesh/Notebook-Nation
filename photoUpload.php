<?php
   session_start();
  include 'config.php';
  
   $a=$_SESSION['name1'];

if(isset($_POST['photoStore'])) {
    $encoded_data = $_POST['photoStore'];
    $binary_data = base64_decode($encoded_data);

    $photoname = uniqid().'.jpeg';

    $result = file_put_contents('uploads/'.$photoname, $binary_data);
    $query = "UPDATE reg SET file = '$photoname' WHERE username = '$a'";
		$result =  mysqli_query($conn, $query);

    if($result) {
        echo 'success';
    } else {
        echo die('Could not save image! check file permission.');
    }
}
?>