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
<?php 
	//query menampilkan data
	$sql = mysql_query("select * from siswa order by nis asc");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
	   echo "<tr>
          <td align='center' valign='top' rowspan='4'>$no.</td>
          <td align='center' valign='top' rowspan='4'><img src='http://localhost/reporting/img/$data[Foto]' width='80' height='80'></td>
          <td align='left'>NIS</td>
          <td>:</td>
          <td>$data[NIS]</td>
     </tr>
     <tr><td align='left'>Nama</td>
          <td>:</td>
          <td widtd='200'>$data[Nama]</td>
	  </tr>
      <tr><td align='left'>Tanggal Lahir</td>
	      <td>:</td>
	      <td>".tgl_indo($data['Tgl_Lahir'])."</td>
	  </tr>
      <tr><td align='left'>Jenis Kelamin</td>
	      <td>:</td>
          <td>$data[JK]</td>
	  </tr>";
		$no++;
	}
?>
</table>