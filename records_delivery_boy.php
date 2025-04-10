<?php  
//export.php  
  include 'config.php';
    $query="select * from dashboard where role = 'delivery boy'";
    $result = mysqli_query($conn, $query);
    
    require('fpdf181/fpdf.php');
    $pdf = new FPDF();
    
    $pdf->AddPage();
    
    $pdf->SetFont('Arial', 'B', 16); // Set the font size to 16 and make it bold
    
    // Add customer details and date in the same row
    $pdf->Cell(0, 10, 'DELIVERY BOY RECORDS', 0, 0, 'C'); // Center the text
    
    $pdf->SetFont('Arial', 'B', 12); 
    $pdf->Cell(0, 10, date('d-M-Y'), 0, 1, 'R'); // Right align the text
    
    // Add some space after the heading
    $pdf->Cell(0, 10, '', 0, 1);
    
    $pdf->SetFont('Arial', 'B', 12); // Make the font bold
    
    // Add table headers
    $pdf->Cell(10, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Name', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Phone', 1, 0, 'C');
    $pdf->Cell(62, 10, 'Email', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Username', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Status', 1, 1, 'C');
    
    // Add a blank row for spacing
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 1, '', 0, 1);
    
    // Add table rows
    $pdf->SetFont('Arial', '', 12);
    
    while($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['name'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['phone'], 1, 0, 'C');
        $pdf->Cell(62, 10, $row['email'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['username'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['status'], 1, 1, 'C');
    }
    
    $pdf->Output();
    ?>
    