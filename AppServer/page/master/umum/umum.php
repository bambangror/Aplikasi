<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
?>
<div class="u-left">
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td height='10' width='180' ><div align='center'><h3>Data Katagori</h3></div></td>
		<td><a href="?n=kategori_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Tambah&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
	</tr>
	<tr>
		<td colspan='8' height='4'></td>
	</tr>
	</table>
<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='220'><div align='center'><h3>Katagori</h3></div></td>
		<td width='42'><div align='center'><h3>Aksi</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$q_kategori=mysql_query("SELECT * FROM kategori order by kid");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($q_ka=mysql_fetch_array($q_kategori)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<?php
		print "<td width='30' align='center'>$no</td>";
		print "<td width='220' align='left'> $q_ka[knama] </td>";
		print "<td width='16' align='center'><a href='./?n=kategori_e&&edit=$q_ka[kid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $q_ka[knama] ?'); if (ok) return true; else return false\" href=./?n=kategori_e&&hapus=$q_ka[kid]><img src='./misc/delete.gif'></a></td>"; ?>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
</div>
<div class="u-right">
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td height='10' width='100' ><div align='center'><h3>Satuan Beli</h3></div></td>
		<td><a href="?n=satuanb_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Tambah&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
	</tr>
	<tr>
		<td colspan='8' height='4'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='135'><div align='center'><h3>Satuan</h3></div></td>
		<td width='42'><div align='center'><h3>Aksi</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT * FROM pbsatuan order by pbsid");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<?php
		print "<td width='30' align='center'>$no</td>";
		print "<td width='135' align='left'> $row[pbsnama] </td>";
		print "<td width='16' align='center'><a href='./?n=satuanb_e&&edit=$row[pbsid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[pbsnama] ?'); if (ok) return true; else return false\" href=./?n=satuanb_e&&hapus=$row[pbsid]><img src='./misc/delete.gif'></a></td>"; ?>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
</div>
<div class="u-right2">
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td height='10' width='100' ><div align='center'><h3>Satuan Jual</h3></div></td>
		<td><a href="?n=satuanj_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Tambah&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
	</tr>
	<tr>
		<td colspan='8' height='4'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='135'><div align='center'><h3>Satuan</h3></div></td>
		<td width='42'><div align='center'><h3>Aksi</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT * FROM pjsatuan order by pjsid");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<?php
		print "<td width='30' align='center'>$no</td>";
		print "<td width='135' align='left'> $row[pjsnama] </td>";
		print "<td width='16' align='center'><a href='./?n=satuanj_e&&edit=$row[pjsid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[pjsnama] ?'); if (ok) return true; else return false\" href=./?n=satuanj_e&&hapus=$row[pjsid]><img src='./misc/delete.gif'></a></td>"; ?>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
</div>
<?php
}
else{
?>
<script language="javascript">
	TO_OUT();
</script>	
<?php
}	
?>
</div>