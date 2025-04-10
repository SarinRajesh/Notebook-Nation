<?php
session_start();
  include 'config.php';

$a=$_SESSION['name1'];

if(isset($_POST['amt']) && isset($_POST['username'])){
  
    $username=$_POST["username"];
   
    $name=$_POST["name"];
    $add=date('Y-m-d');
    $payment_status="pending";
    
    $phone=$_POST["phone"];
    $pincode=$_POST["pincode"];
    $city=$_POST["city"];
    $district=$_POST["district"];
    $state=$_POST["state"];

    
    $cart_query = "SELECT * FROM cart where selected='yes' and  person='$a'";
    $cart_result = mysqli_query($conn, $cart_query);

// loop through cart items
while ($cart_row = mysqli_fetch_assoc($cart_result)) {
  $lap_id = $cart_row['lap_id'];
  $quantity=$cart_row['quantity'];
  $amount=$cart_row['price']* $cart_row['quantity']+70;

  // insert purchased products into order table
  $order_query = "INSERT INTO payment (lap_id,username,payment_status,added_on) VALUES ('$lap_id','$username','$payment_status','$add')";
  mysqli_query($conn, $order_query);
  $_SESSION['OID']=mysqli_insert_id($conn);

   mysqli_query($conn,"insert into order_tbl (lap_id,quantity,amount,fullname,username,phone,pincode,city,district,state,order_date,order_status,delivery_boy,delivery_date,delivery_status,otp) 
    values('$lap_id','$quantity','$amount','$name','$username','$phone','$pincode','$city','$district','$state','$add','Not confirmed','Not assigned','Pending','Pending','Pending')");
}
    



    $query = "SELECT lap_id, quantity FROM cart where selected='yes' and person = '$a'";
    $result = mysqli_query($conn, $query);
    
    // Loop through each cart item
    while ($row = mysqli_fetch_assoc($result)) {
      $lap_id = $row['lap_id'];
      $quantity = $row['quantity'];
    
      // Decrement the lap quantity in the laps table
      $updateQuery = "UPDATE laptops SET stock = stock - '$quantity' WHERE id = '$lap_id'";
      mysqli_query($conn, $updateQuery);
    }
    
    

}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>



