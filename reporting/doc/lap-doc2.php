<?php
include "../indotgl.php";
$konek=mysql_connect('localhost','root','') or die ('gagal koneksi');
$db=mysql_select_db('sekolah',$konek) or die('database tidak ditemukan');
$content = "";
$content .= "<h1 align='left'>Data Siswa</h1>
<table border='1' cellspacing='0' cellpadding='2'>";
$qry=mysql_query("select * from siswa order by nis asc");
$no=1;
while($x=mysql_fetch_array($qry)){
$content .="<tr>
          <td align='center' valign='top' rowspan='4'>$no.</td>
          <td align='center' valign='top' rowspan='4'><img src='http://localhost/reporting/img/$x[Foto]' width='80' height='80'></td>
          <td align='left'>NIS</td>
          <td>:</td>
          <td>$x[NIS]</td>
     </tr>
     <tr><td align='left'>Nama</td>
          <td>:</td>
          <td widtd='200'>$x[Nama]</td>
	  </tr>
      <tr><td align='left'>Tanggal Lahir</td>
	      <td>:</td>
	      <td>".tgl_indo($x['Tgl_Lahir'])."</td>
	  </tr>
      <tr><td align='left'>Jenis Kelamin</td>
	      <td>:</td>
          <td>$x[JK]</td>
	  </tr>";
$no++;
}
$content .="</table>";
//modifikasi header
header("Content-type: application/msdownload");
//membuat nama file laporan dengan ekstensi .doc
header("Content-disposition: inline; filename=lap.doc");
header("Content-length: " . strlen($content));
echo $content;
?>