<?php
ob_start();
include "../indotgl.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=dafsiswa-".date('d-F-Y').".xls");
$konek=mysql_connect('localhost','root','') or die ('gagal koneksi');
$db=mysql_select_db('sekolah',$konek) or die('database tidak ditemukan');
?>
<h2 align='left'>Data Siswa</h2>
<table border='1'>
<tr>
   <th>No</th>
   <th>NIS</th>
   <th>Nama</th>
   <th>Tgl. Lahir</th>
   <th>JK</th>
</tr>
<?php 
	//query menampilkan data
	$sql = mysql_query("select * from siswa order by nis asc");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
	   echo "<tr>
           <td>$no</td>
		   <td>$data[NIS]</td>
           <td>$data[Nama]</td>
           <td>".tgl_indo($data['Tgl_Lahir'])."</td>
           <td>$data[JK]</td>
        </tr>";
		$no++;
	}
?>
</table>