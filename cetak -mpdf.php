<?php  

require_once __DIR__ . '/vendor/autoload.php';

require 'koneksi.php';
//function query
$querymhs=query($conn,"SELECT * FROM mahasiswa ORDER BY NIM ASC");


$mpdf = new \Mpdf\Mpdf();

$html='


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Faeshal Course</title>
    <meta name="viewport" content="width=device-width" />

    
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    
    <link href="aset/css/cetak.css" rel="stylesheet">
</head>
<body>


 <div class="content">
            <div class="container-fluid">
                <div class="row">

<!-- TABEL PEMBELIAN -->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">REPORT MAHASISWA</h4>
                                <p class="category">Data lengkap semua mahasiswa </p><br>
                                
                            </div>

                      
                            <div class="content table-responsive table-full-width">
                                <table border="1" cellpadding="10" cellspacing="0">
                                    <tr styles="center">
                                        <th styles="center">NIM</th>
                                        <th styles="center">Nama</th>
                                        <th styles="center">Tanggal Lahir</th>
                                        <th styles="center">Jenis Kelamin</th>
                                        <th styles="center">NO Telp</th>
                                        <th styles="center">Alamat</th>
                                        <th styles="center">Kode Jurusan</th>
                                    </tr>';

                                    
                                    $i=1;
                                    while ($row = mysqli_fetch_array ($querymhs))
						{
					?>
                                        $html.='<tr>
                                        <td>'.$i++.'</td>
                                        <td>'.$row["NIM"].'</td>
                                        <td>'.$row["Nama_Mahasiswa"].'</td>
                                        <td>'.$row["Tanggal_Lahir"].'</td>
                                        <td>'.$row["JK"].'</td>
                                        <td>'.$row["No_Telp"].'</td>
                                        <td>'.$row["Alamat"].'</td>
                                        <td>'.$row["Kode_jurusan_Mhs"].'</td>
                                        </tr>';
                                    <?php
					}
				?>

$html.='</table>


';

$mpdf->WriteHTML($html);
$mpdf->Output('Report-User.pdf','D');

?>

