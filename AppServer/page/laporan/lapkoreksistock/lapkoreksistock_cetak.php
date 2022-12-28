<style type="text/css">
#main-contentc td{
	font: 10px/0% tahoma;
}
</style>
<div id="main-contentc">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
?>
<script type="text/javascript">
	if (window.print) {
	document.write();
	}
	function Move()  {
        setTimeout('self.location.href ="?n=lapkoreksistock"',1);
    }
</script>
<?php	
		if ($_SESSION['tglakhir']<>''){ ?>
		<script type="text/javascript">
			setTimeout('window.print()', 1000);
			setTimeout('Move()', 1000);
		</script>
		<?php
		$tglawal  =$_SESSION['tglawal'];
		$tglakhir =$_SESSION['tglakhir'];
		?>
        <h2>Laporan Barang Rusak<br><h3>Periode : <?php echo tgl_indo($tglawal); ?> s.d <?php echo tgl_indo($tglakhir); ?></h3></h2><br>
		<table class='main' cellpadding=0 cellspacing=0 border=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='20'><div align='center'><h3>NO.</h3></div></td>
		<td width='120' align='center'><h3>Tanggal</h3></td>
    	<td width='140' align='center'><h3>Nama Barang</h3></td>
		<td width='60' align='center'><h3>Harga Beli</h3></td>
		<td width='200'align='center'><h3>Keterangan</h3></td>
		<td width='30' align='center'><h3>Qty</h3></td>
		<td width='70'><div align='center'><h3>Kerugian</h3></div></td>
		</tr>

<?php
		$qry=mysql_query("select barang_rusak.*,barang.* from barang_rusak,barang where 
						barang_rusak.bid=barang.bid and 
						brtgl_dicatat>='$tglawal' and brtgl_dicatat<='$tglakhir' ORDER BY brid");			
		$no=0;
		$totqty = 0;
		$totrugi = 0;
		while ($row=mysql_fetch_array($qry)){
		$no++
?>
		<tr height="25px">
		<td width='20' align='center'><?php print $no ?></td>
		<td width='120'><div align='right'>	<?php print tgl_indo($row['brtgl_dicatat']);?></div></td>
    	<td width='140'><div align='left'>	<?php print $row['bnama']?></div></td>
		<td width='60'><div align='right'>	<?php print number_format($row['bbeli'])?></div></td>
		<td width='200'><div align='left'> 	<?php print $row['brket']?></div></td>
		<td width='30'><div align='center'>	<?php print $row['brqty']?></div></td>
		<td width='70'><div align='right'> 	<?php print number_format($row['bbeli']*$row['brqty'])?></div></td>
		</tr>
<?php
           $totqty += $row['brqty'];
		   $totrugi += ($row['bbeli']*$row['brqty']);
		}
?>
         <tr height="25px"><td colspan='5' align='right'>Total:</td><td align='center'><?php echo $totqty; ?></td><td align='right'><?php echo number_format($totrugi); ?></td></tr>
		</table>

<?php
		unset($_SESSION['tglawal']);
		unset($_SESSION['tglakhir']);
	}
		else { ?>
		<script type="text/javascript">
			setTimeout('self.location.href ="?n=lapkoreksistock"',1);
		</script>	
	<?php }?>
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