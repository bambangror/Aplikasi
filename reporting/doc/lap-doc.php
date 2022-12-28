<?php
include "../indotgl.php";
$konek=mysql_connect('localhost','root','') or die ('gagal koneksi');
$db=mysql_select_db('sekolah',$konek) or die('database tidak ditemukan');
$content = "";
$content .= "<h1 align='left'>Data Siswa</h1>
<table border='1' cellspacing='0' cellpadding='2'>
<tr>
<th>No</th>
<th>NIS</th>
<th>Nama</th>
<th>Tgl. Lahir</th>
<th>JK</th></tr>";
$qry=mysql_query("select * from siswa order by nis asc");
$no=1;
while($x=mysql_fetch_array($qry)){
$content .="<tr>
<td>$no</td>
<td>$x[NIS]</td>
<td>$x[Nama]</td>
<td>".tgl_indo($x['Tgl_Lahir'])."</td>
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