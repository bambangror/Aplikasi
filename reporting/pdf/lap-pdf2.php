<?php
include "../../indotgl.php";
$konek=mysql_connect('localhost','root','') or die ('gagal koneksi');
$db=mysql_select_db('sekolah',$konek) or die('database tidak ditemukan');
echo "<h1 align='left'>Data Siswa</h1>
<table border='0' cellspacing='0' cellpadding='2'>";
$qry=mysql_query("SELECT * FROM siswa ORDER BY NIS ASC");
$no=1;
while($x=mysql_fetch_array($qry)){
echo "<tr>
   <td style='border:solid 0.1px #000;' align='center' valign='top' rowspan='4'>$no.</td>
   <td style='border:solid 0.1px #000;' align='center' valign='top' rowspan='4'><img src='../../img/$x[Foto]' width='80'></td>
   <td style='border:solid 0.1px #000;' align='left'>NIS</td>
   <td style='border:solid 0.1px #000;'>:</td>
   <td style='border:solid 0.1px #000;'>$x[NIS]</td>
</tr>";
echo "<tr><td style='border:solid 0.1px #000;' align='left'>Nama</td>
          <td style='border:solid 0.1px #000;'>:</td>
          <td style='border:solid 0.1px #000;' widtd='200'>$x[Nama]</td>
	  </tr>
      <tr><td style='border:solid 0.1px #000;' align='left'>Tanggal Lahir</td>
	      <td style='border:solid 0.1px #000;'>:</td>
	      <td style='border:solid 0.1px #000;'>".tgl_indo($x['Tgl_Lahir'])."</td>
	  </tr>
      <tr><td style='border:solid 0.1px #000;' align='left'>Jenis Kelamin</td>
	      <td style='border:solid 0.1px #000;'>:</td>
          <td style='border:solid 0.1px #000;'>$x[JK]</td>
	  </tr>";
$no++;
}
echo "</table>";
?>