<?php
require('../fpdf186/fpdf.php');

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'LAPORAN DATA MATA KULIAH', 0, 1, 'C');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 5, 'Dicetak pada: ' . date('d/m/Y H:i'), 0, 1, 'C');
        $this->Ln(10);
    }

    // Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create PDF in Landscape mode
$pdf = new PDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(15);
$pdf->AddPage();

// Column headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 8, 'No.', 1, 0, 'C');
$pdf->Cell(30, 8, 'Kode MK', 1, 0, 'C');
$pdf->Cell(80, 8, 'Nama Mata Kuliah', 1, 0, 'C');
$pdf->Cell(20, 8, 'SKS', 1, 0, 'C');
$pdf->Cell(30, 8, 'Semester', 1, 1, 'C');

// Data
$pdf->SetFont('Arial', '', 10);
include '../connection.php';
$no = 1;
$result = mysqli_query($con, "SELECT * FROM matakuliah ORDER BY semester, kode");

while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $data['kode'], 1, 0);
    $pdf->Cell(80, 6, $data['nama'], 1, 0);
    $pdf->Cell(20, 6, $data['sks'], 1, 0, 'C');
    $pdf->Cell(30, 6, 'Semester ' . $data['semester'], 1, 1, 'C');

    // Add new page if the content is too long
    if ($pdf->GetY() > 180) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 8, 'No.', 1, 0, 'C');
        $pdf->Cell(30, 8, 'Kode MK', 1, 0, 'C');
        $pdf->Cell(80, 8, 'Nama Mata Kuliah', 1, 0, 'C');
        $pdf->Cell(20, 8, 'SKS', 1, 0, 'C');
        $pdf->Cell(30, 8, 'Semester', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
    }
}

$pdf->Output('D', 'Laporan_Mata_Kuliah_' . date('Ymd') . '.pdf');
