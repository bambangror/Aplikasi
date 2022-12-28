<?php
include "../../indotgl.php";
$konek=mysql_connect('localhost','root','') or die ('gagal koneksi');
$db=mysql_select_db('sekolah',$konek) or die('database tidak ditemukan');
echo "<h1 align='left'>Data Siswa</h1>
<table border='0' cellspacing='0' cellpadding='2'>
<tr>
<th style='border:solid 0.1px #000;' align='center'>No</th>
<th style='border:solid 0.1px #000;' align='center'>NIS</th>
<th style='border:solid 0.1px #000;' align='center'>Nama</th>
<th style='border:solid 0.1px #000;' align='center'>Tanggal Lahir</th>
<th style='border:solid 0.1px #000;' align='center'>JK</th></tr>";
$qry=mysql_query("SELECT * FROM siswa ORDER BY NIS ASC");
$no=1;
while($x=mysql_fetch_array($qry)){
echo "<tr>
<td style='border:solid 0.1px #000;' width='20'>$no</td>
<td style='border:solid 0.1px #000;' width='60'>$x[NIS]</td>
<td style='border:solid 0.1px #000;' width='200'>$x[Nama]</td>
<td style='border:solid 0.1px #000;' width='110'>".tgl_indo($x['Tgl_Lahir'])."</td>
<td style='border:solid 0.1px #000;' width='70'>$x[JK]</td>
</tr>";
$no++;
}
echo "</table>";
?>