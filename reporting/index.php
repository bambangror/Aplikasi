<?php
include "indotgl.php";
$konek=mysql_connect('localhost','root','') or die ('gagal koneksi');
$db=mysql_select_db('sekolah',$konek) or die('database tidak ditemukan');
echo "<h1 align='left'>Data Siswa</h1>
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
echo "<tr>
<td width='20'>$no</td>
<td width='60'>$x[NIS]</td>
<td width='200'>$x[Nama]</td>
<td width='130'>".tgl_indo($x['Tgl_Lahir'])."</td>
<td width='70'>$x[JK]</td>
</tr>";
$no++;
}
echo "</table>";
echo "Export : | <a href='doc/lap-doc.php' target=_blank>Format *.doc</a> |";
echo "<a href='xls/lap-xls.php' target=_blank>Format *.xls</a> |";
echo "<a href='pdf/index.php' target=_blank>Format *.pdf</a> |";
?>