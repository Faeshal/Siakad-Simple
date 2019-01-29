<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "siakad";

$conn    = mysqli_connect ($servername, $username, $password, $dbname);
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
$pdf->Cell(190,7,'REPORT DATA MAHASISWA',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'UNIVERSITAS BANTEN JAYA',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NIM',1,0);
$pdf->Cell(45,6,'Nama Mahasiswa',1,0);
$pdf->Cell(35,6,'Tanggal Lahir',1,0);
$pdf->Cell(8,6,'JK',1,0);
$pdf->Cell(30,6,'No Telp',1,0);
$pdf->Cell(30,6,'Alamat',1,0);
$pdf->Cell(27,6,'Kode Jurusan',1,1);

$pdf->SetFont('Arial','',10);
$query = mysqli_query($conn, "SELECT * FROM mahasiswa");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(20,6,$row['NIM'],1,0);
    $pdf->Cell(45,6,$row['Nama_Mahasiswa'],1,0);
    $pdf->Cell(35,6,$row['Tanggal_Lahir'],1,0);
    $pdf->Cell(8,6,$row['JK'],1,0);
    $pdf->Cell(30,6,$row['No_Telp'],1,0);
    $pdf->Cell(30,6,$row['Alamat'],1,0);
    $pdf->Cell(27,6,$row['Kode_Jurusan_Mhs'],1,1);
}
$pdf->Output();
?>