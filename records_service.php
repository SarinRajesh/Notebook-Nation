<?php  
//export.php  
include 'config.php';
$query="SELECT * from service";
 $result = mysqli_query($conn, $query); 
 
 require('fpdf181/fpdf.php');
 $pdf = new FPDF();
 
 $pdf->AddPage();
 
 $pdf->SetFont('Arial', 'B', 16); // Set the font size to 16 and make it bold
 
 // Add customer details and date in the same row
 $pdf->Cell(0, 10, 'SERVICE RECORDS', 0, 0, 'C'); // Center the text
 
 $pdf->SetFont('Arial', 'B', 12); 
 $pdf->Cell(0, 10, date('d-M-Y'), 0, 1, 'R'); // Right align the text
 
 // Add some space after the heading
 $pdf->Cell(0, 10, '', 0, 1);
 
 $pdf->SetFont('Arial', 'B', 12); // Make the font bold
 
 // Add table headers
 $pdf->Cell(22, 10, 'ORDER ID', 1, 0, 'C');
 $pdf->Cell(18, 10, 'LAP ID', 1, 0, 'C');
 $pdf->Cell(30, 10, 'CUSTOMER', 1, 0, 'C');
 $pdf->Cell(70, 10, 'COMPLAINT', 1, 0, 'C');
 $pdf->Cell(22, 10, 'STATUS', 1, 0, 'C');
 $pdf->Cell(28, 10, 'DATE', 1, 1, 'C');
 
 // Add a blank row for spacing
 $pdf->SetFont('Arial', '', 12);
 $pdf->Cell(0, 1, '', 0, 1);
 
 // Add table rows
 $pdf->SetFont('Arial', '', 12);
 
 while($row = mysqli_fetch_assoc($result)) {
     $pdf->Cell(22, 10, $row['order_id'], 1, 0, 'C');
     $pdf->Cell(18, 10, $row['lap_id'], 1, 0, 'C');
     $pdf->Cell(30, 10, $row['fullname'], 1, 0, 'C');
     $pdf->Cell(70, 10, $row['complaint'], 1, 0, 'L');
     $pdf->Cell(22, 10, $row['status'], 1, 0, 'C');
     $pdf->Cell(28, 10, $row['date'], 1, 1, 'C');
 }
 
 $pdf->Output();
 ?>
 