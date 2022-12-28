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
        setTimeout('self.location.href ="?n=lappembelian"',1);
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
		 <h2>Laporan Pembelian<br><h3>Periode : <?php echo tgl_indo($tglawal); ?> s.d <?php echo tgl_indo($tglakhir); ?></h3></h2><br>
		<table class='main' cellpadding=0 cellspacing=0 border=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='20'><div align='center'><h3>NO.</h3></div></td>
		<td width='70' align='center'><h3>ID Pembelian</h3></td>
    	<td width='120' align='center'><h3>Tanggal</h3></td>
		<td width='70' align='center'><h3>No. Nota</h3></td>
		<td width='102'align='center'><h3>Supplier</h3></td>
		<td width='100'><div align='center'><h3>Nominal Pembelian</h3></div></td>
		</tr>
<?php
		$keywords = $_SESSION['keywords'];
		$qry=mysql_query("select pembelian.*,supplier.* from pembelian,supplier where 
						pembelian.spid=supplier.spid and supplier.spnama LIKE '%$keywords%' and
						pbtgl>='$tglawal' and pbtgl<='$tglakhir' ORDER BY pbid");			
		$no=0;
		$totbeli = 0;
		while ($row=mysql_fetch_array($qry)){
		$no++
?>
		<tr height="25px">
		<td width='20' align='center'><?php print $no; ?></td>
		<td width='70' align='right'>	<?php print $row['pbid'];?></td>
    	<td width='120' align='right'>	<?php print tgl_indo($row['pbtgl']);?></td>
		<td width='70' align='center'>	<?php print $row['pbnota'];?></td>
		<td width='100' align='center'> 	<?php print $row['spnama'];?></td>
		<td width='100' align='right'> 	<?php print number_format($row['pbbayar']);?></td>
		</tr>
<?php
           $totbeli += $row['pbbayar'];
		}
?>
        <tr height="25px"><td colspan='5' align='right'>Total:</td><td align='right'><?php echo number_format($totbeli); ?></td></tr>
		</table>
<?php
		unset($_SESSION['tglawal']);
		unset($_SESSION['tglakhir']);
	}
		else { ?>
		<script type="text/javascript">
			setTimeout('self.location.href ="?n=lappembelian"',1);
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