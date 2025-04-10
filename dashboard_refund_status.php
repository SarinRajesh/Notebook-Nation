<?php  
include 'config.php';

if(isset($_POST['amt']) && isset($_POST['order_id'])){
    $id=$_POST['order_id'];
    
    $query = "UPDATE order_tbl SET refund='Completed' WHERE order_id='$id'";
    if(mysqli_query($conn, $query)){
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
