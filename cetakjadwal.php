<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "siakad";

$conn       = mysqli_connect ($servername, $username, $password, $dbname);
	           if (!$conn){ 
                die ("Connection Failed: ". mysqli_connect_error());
                }

// Koneksi library FPDF
require('fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'JADWAL PELAJARAN',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'UNIVERSITAS BANTEN JAYA',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Id Jadwal',1,0);
$pdf->Cell(15,6,'Kode Matakul',1,0);
$pdf->Cell(35,6,'NIP Jadwal',1,0);
$pdf->Cell(8,6,'Kode Ruangan',1,0);
$pdf->Cell(8,6,'Kode Jurusan',1,0);
$pdf->Cell(30,6,'Hari',1,0);
$pdf->Cell(30,6,'Jam',1,0);

$pdf->SetFont('Arial','',10);
$query = mysqli_query($conn, "SELECT * FROM jadwal");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(20,6,$row['Id_Jadwal'],1,0);
    $pdf->Cell(15,6,$row['Kode_Matakuliah_Jadwal'],1,0);
    $pdf->Cell(35,6,$row['NIP_Jadwal'],1,0);
    $pdf->Cell(8,6,$row['Kode_Ruangan_Jadwal'],1,0);
    $pdf->Cell(30,6,$row['Kode_Jurusan_Jadwal'],1,0);
    $pdf->Cell(30,6,$row['Hari'],1,0);
    $pdf->Cell(27,6,$row['Jam'],1,1);
}
$pdf->Output();
?>