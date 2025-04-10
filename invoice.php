<?php

session_start();
  include 'config.php';

$a=$_SESSION["name1"];

$id=$_GET['id'];
 

$query="SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.fullname,order_tbl.username,order_tbl.pincode,order_tbl.phone,order_tbl.quantity,order_tbl.amount,order_tbl.city,order_tbl.district,order_tbl.state, order_tbl.order_date,order_tbl.order_status,
order_tbl.delivery_date,order_tbl.delivery_status,order_tbl.delivery_status,order_tbl.otp,order_tbl.refund, laptops.id,
laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
                    FROM order_tbl
                    INNER JOIN laptops
                    ON order_tbl.lap_id = laptops.id
                    where order_tbl.order_id='$id' and username='$a'";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

require('fpdf181/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(55, 5, 'Order id', 0, 0);
$pdf->Cell(58, 5, ": $row[order_id]", 0, 0);

$pdf->Cell(30, 10, '', 0, 0);
$pdf->Cell(52, 5, 'NOTEBOOK NATION', 0, 1);

$pdf->Cell(55, 5, 'Status', 0, 0);
$pdf->Cell(58, 5, ": Complete", 0, 0);


$pdf->Cell(30, 10, '', 0, 0);
$pdf->Cell(15, 13, 'Date', 0, 0);
$pdf->Cell(20, 13, ": $row[order_date]", 0, 1);

$pdf->Cell(55, -8, 'Laptop', 0, 0);
$pdf->Cell(58, -8, ": $row[name]", 0, 1);

$pdf->Cell(55, 19, 'QTY', 0, 0);
$pdf->Cell(58, 19, ": $row[quantity]", 0, 1);



$pdf->Line(10, 40, 200, 40);

$pdf->Ln(6);
$pdf->Cell(55, 5, 'Paid by', 0, 0);
$pdf->Cell(58, 5, ": $row[fullname]", 0, 1);
$pdf->Cell(55, 8, 'Phone', 0, 0);
$pdf->Cell(58, 8, ": $row[phone]", 0, 1);
$pdf->Cell(55, 8, 'Delivery Address', 0, 0);
$pdf->Cell(58, 8, ":  $row[city]", 0, 1);
$pdf->Cell(55, 5,' ', 0, 0);
$pdf->Cell(58, 5, "   $row[district]", 0, 1);
$pdf->Cell(55, 5,' ', 0, 0);
$pdf->Cell(58, 5, "   $row[state]", 0, 1);
$pdf->Cell(55, 5,' ', 0, 0);
$pdf->Cell(58, 5, "   $row[pincode]", 0, 1);

$pdf->Line(10, 90, 200, 90);


$pdf->Line(125, 111, 200, 111);


$pdf->Ln(11);//Line break

$pdf->Cell(120, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Price', 40, 0);
$price=$row['amount']-70;
$pdf->Cell(20, 10, ": $price Rs", 0, 1);

$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(50, 5, 'Delivery Charge', 0, 0);
$pdf->Cell(20, 5, ': 70 Rs', 0, 1);

$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(50, 20, 'Total', 0, 0);
$pdf->Cell(20, 20, ": $row[amount] Rs", 0, 1);

$pdf->Output();
?>