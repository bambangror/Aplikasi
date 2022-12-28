<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && ($_SESSION['rid']==1)){
	$_SESSION['page']=2;	
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' ><div align='center'><h3>Koreksi Stock</h3></div></td>
		<td><a href="?n=barangrusak_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;</a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</a></td>
		<td width='10'></td>		
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='80'><h3>Tanggal</h3></td>
		<td width='3'>:</td>
		<td width='160'><h3><?php print $date?></h3></td>
		<td width='250'></td>
		<td colspan='2'width='280'></td>
		<td colspan='5' width='80'></td>
	</tr>
	<tr>
		<td colspan='8'height='10'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
    	<td width='60'><div align='center'><h3>Kode Obat</h3></div></td>
		<td width='215'><div align='center'><h3>Nama Obat</h3></div></td>
		<td width='60'><div align='center'><h3>Satuan</h3></div></td>
		<td width='60'><div align='center'><h3>Stock Lalu</h3></div></td>
		<td width='70'><div align='center'><h3>Stock Kini</h3></div></td>
		<td width='40'><div align='center'><h3>Selisih</h3></div></td>
		<td width='200'><div align='center'><h3>Alasan</h3></div></td>
		<td width='20'><div align='center'><h3>Edit</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("select barang_rusak.*,barang.*,pjsatuan.* from barang_rusak,barang,pjsatuan where
						barang_rusak.bid=barang.bid and barang.pjsid=pjsatuan.pjsid and braktif=1 order by brid");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
    	<td width='30'><div align='right'>	<?php print $no ?></div></td>
		<td width='60'><div align='right'>	<?php print $row['bcode']?></div></td>
		<td width='215'><div align='left'>	<?php print $row['bnama']?></div></td>
		<td width='60'><div align='center'><?php print $row['pjsnama']?></div></td>
		<td width='60'><div align='center'><?php print ($row['bstock']+$row['brqty']);?></div></td>
		<td width='70'> <div align='center'>	<?php print $row['bstock']?></div></td>
		<td width='40'> <div align='center'><?php print $row['brqty']?></div></td>
		<td width='200'> <div align='center'><?php print $row['brket']?></div></td>
<?php
		print "<td width='16' align='center'><a href='./?n=barangrusak_e&&edit=$row[brid]'><img src='./misc/edit.gif'></a></td>";
?>
			
		</tr>
<?php
		}
?>
		
		</table>
		<input name='pbbayarn2' type='hidden' value="<?php print $total ?>">
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