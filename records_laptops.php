<?php  
//export.php  
  include 'config.php';
 $query="select * from laptops";
 $result = mysqli_query($conn, $query);
 
 require('fpdf181/fpdf.php');
 $pdf = new FPDF();
 
 $pdf->AddPage();
 
 $pdf->SetFont('Arial', 'B', 16); // Set the font size to 16 and make it bold
 
 // Add customer details and date in the same row
 $pdf->Cell(0, 10, 'LAPTOP RECORDS', 0, 0, 'C'); // Center the text
 
 $pdf->SetFont('Arial', 'B', 12); 
 $pdf->Cell(0, 10, date('d-M-Y'), 0, 1, 'R'); // Right align the text
 
 // Add some space after the heading
 $pdf->Cell(0, 10, '', 0, 1);
 
 $pdf->SetFont('Arial', 'B', 12); // Make the font bold
 
 // Add table headers
 $pdf->Cell(10, 10, 'ID', 1, 0, 'C');
 $pdf->Cell(48, 10, 'Name', 1, 0, 'C');
 $pdf->Cell(30, 10, 'Processor', 1, 0, 'C');
 $pdf->Cell(15, 10, 'Ram', 1, 0, 'C');
 $pdf->Cell(30, 10, 'Storage', 1, 0, 'C');
 $pdf->Cell(19, 10, 'Display', 1, 0, 'C');
 $pdf->Cell(20, 10, 'Price', 1, 0, 'C');
 $pdf->Cell(15, 10, 'Stock', 1, 1, 'C');
 
 // Add a blank row for spacing
 $pdf->SetFont('Arial', '', 12);
 $pdf->Cell(0, 1, '', 0, 1);
 
 // Add table rows
 $pdf->SetFont('Arial', '', 12);
 
 while($row = mysqli_fetch_assoc($result)) {
     $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
     $pdf->Cell(48, 10, $row['name'], 1, 0, 'L');
     $pdf->Cell(30, 10, $row['processor'], 1, 0, 'C');
     $pdf->Cell(15, 10, $row['ram'], 1, 0, 'L');
     $pdf->Cell(30, 10, $row['storage'], 1, 0, 'C');
     $pdf->Cell(19, 10, $row['display'], 1, 0, 'C');
     $pdf->Cell(20, 10, $row['price'], 1, 0, 'C');
     $pdf->Cell(15, 10, $row['stock'], 1, 1, 'C');
 }
 
 $pdf->Output();
 ?>
 