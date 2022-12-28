<?php
session_start();
$_SESSION['jenisf'] = "times"; //jenis font -> times new roman
$_SESSION['ukurf'] = 12; //ukuran font
$_SESSION['cetak'] = "../lap-pdf2.php";
$_SESSION['jeneng']="dafsiswa-".date('d-F-Y').".pdf";
			
$_SESSION['formatpg']="P";
$_SESSION['kiri']= 22; //margin bagian kiri
$_SESSION['atas']= 5; //margin bagian atas
$_SESSION['kanan']= 10; //margin bagian kanan
$_SESSION['bawah']= 5; //margin bagian bawah

print "<meta http-equiv='refresh' content='0; url=pdf/prv-pdf.php'>";
?>