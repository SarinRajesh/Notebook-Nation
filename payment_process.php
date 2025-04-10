<?php
session_start();
  include 'config.php';

$b=$_SESSION['lap_id'];
if(isset($_POST['amt']) && isset($_POST['username'])){

    $lap_id=$_POST['lap_id'];
    $name=$_POST["name"];
    $username=$_POST["username"];
    $amount=$_POST["amt"];
    $add=date('Y-m-d');
    $payment_status="pending";

    $phone=$_POST["phone"];
    $pincode=$_POST["pincode"];
    $city=$_POST["city"];
    $district=$_POST["district"];
    $state=$_POST["state"];

    

    mysqli_query($conn,"insert into payment(lap_id,username,payment_status,added_on) values('$lap_id','$username','$payment_status','$add')");
    $_SESSION['OID']=mysqli_insert_id($conn);


    mysqli_query($conn,"insert into order_tbl (lap_id,quantity,amount,fullname,username,phone,pincode,city,district,state,order_date,order_status,delivery_boy,delivery_date,delivery_status,otp) 
    values('$lap_id',1,'$amount','$name','$username','$phone','$pincode','$city','$district','$state','$add','Not confirmed','Not assigned','Pending','Pending','Pending')");

    mysqli_query($conn,"update laptops set stock=stock-1 where id='$lap_id'");

}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>



