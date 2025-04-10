<?php  
//export.php  
include 'config.php';
$query="SELECT order_tbl.fullname,order_tbl.order_id,order_tbl.lap_id,order_tbl.amount,order_tbl.phone,order_tbl.quantity,order_tbl.city,order_tbl.district,order_tbl.state,order_tbl.pincode, order_tbl.order_date,order_tbl.order_status, laptops.file,laptops.name,laptops.processor,
  order_tbl.delivery_status,order_tbl.delivery_boy,order_tbl.delivery_date,laptops.ram,laptops.storage,laptops.display,laptops.price
  FROM order_tbl
  INNER JOIN laptops
  ON order_tbl.lap_id = laptops.id where order_status='Confirmed'";
 $result = mysqli_query($connect, $query);
  
  require('fpdf181/fpdf.php');
  $pdf = new FPDF();
  
  $pdf->AddPage();
  
  $pdf->SetFont('Arial', 'B', 16); // Set the font size to 16 and make it bold
  
  // Add customer details and date in the same row
  $pdf->Cell(0, 10, 'DELIVERY RECORDS', 0, 0, 'C'); // Center the text
  
  $pdf->SetFont('Arial', 'B', 12); 
  $pdf->Cell(0, 10, date('d-M-Y'), 0, 1, 'R'); // Right align the text
  
  // Add some space after the heading
  $pdf->Cell(0, 10, '', 0, 1);
  
  $pdf->SetFont('Arial', 'B', 12); // Make the font bold
  
  // Add table headers
  $pdf->Cell(22, 10, 'ORDER ID', 1, 0, 'C');
  $pdf->Cell(30, 10, 'CUSTOMER', 1, 0, 'C');
  $pdf->Cell(25, 10, 'PHONE', 1, 0, 'C');
  $pdf->Cell(65, 10, 'ADDRESS', 1, 0, 'C');
  $pdf->Cell(22, 10, 'DATE', 1, 0, 'C');
  $pdf->Cell(22, 10, 'STATUS', 1, 1, 'C');
  
  // Add a blank row for spacing
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(0, 1, '', 0, 1);
  
  // Add table rows
  $pdf->SetFont('Arial', '', 12);
  
  while($row = mysqli_fetch_assoc($result)) {
      $pdf->Cell(22, 10, $row['order_id'], 1, 0, 'C');
      $pdf->Cell(30, 10, $row['fullname'], 1, 0, 'C');
      $pdf->Cell(25, 10, $row['phone'], 1, 0, 'C');
      $pdf->Cell(65, 10, $row['city'].','. $row['district'].','.$row['state'].','.$row['pincode'], 1, 0, 'C');
      $pdf->Cell(22, 10, $row['delivery_date'], 1, 0, 'C');
      $pdf->Cell(22, 10, $row['delivery_status'], 1, 1, 'C');
  }
  
  $pdf->Output();
  ?>
  