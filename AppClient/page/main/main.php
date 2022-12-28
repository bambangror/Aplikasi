<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && ($_SESSION['rid']<=2)){	
	//--
	CK_ORDER();
	TOTAL_TR();
	//--
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' class="top"></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='80'><h3>No. Nota</h3></td>
		<td width='3'>:</td>
		<td width='160'><h3><?php print $order?></h3></td>
		<td width='150'></td>
		<td colspan='2'width='280'><h3>Total :</h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Tanggal</h3></td>
		<td>:</td>
		<td><h3><?php print $date?></h3></td>
		<td></td>
		<td rowspan="2" width='20' bgcolor="#000" style="color:#fff"><div align='Left'><h2>&nbsp;Rp.</h2></td>
		<td rowspan="2" bgcolor="#000" style="color:#fff"><div align='right'><h2><?php print number_format($total)?>&nbsp;</h2></div></td>
		<td rowspan="2"></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Jam</h3></td>
		<td>:</td>
		<td><h3><?php print $jam?></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='8'height='10'></td>
	</tr>
	</table>
<div id="MidPan">
		<div class="m1Pan">
		<table cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
    	<td width='35'><div align='center'><h3>No.</h3></div></td>
    	<td width='100'><div align='center'><h3>Kode Obat</h3></div></td>
		<td width='170'><div align='center'><h3>Nama Obat</h3></div></td>
		<td width='90'><div align='center'><h3>Harga @</h3></div></td>
		<td width='80'><div align='center'><h3>Disc.Item</h3></div></td>
		<td width='70'><div align='center'><h3>Qty</h3></div></td>
		<td width='114'><div align='center'><h3>Jumlah</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$q_pjtr=mysql_query("select a.*,b.* from pjtransaksi a,barang b
							where a.bid=b.bid and a.pjtaktif=1 and a.s_id='$sid' order by a.pjtno");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		while ($q_pjt=mysql_fetch_array($q_pjtr)){
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<td width='35'> <div align='center'><?php print $q_pjt['pjtno']?></div></td>
    	<td width='100'><div align='right'>	<?php print $q_pjt['bcode']?></div></td>
		<td width='170'><div align='left'>	<?php print $q_pjt['bnama']?></div></td>
		<td width='90'> <div align='right'>	<?php print number_format($q_pjt['bjual'])?></div></td>
		<td width='80'> <div align='right'>	<?php print $q_pjt['pjtdiskon']?></div></td>
		<td width='70'> <div align='center'><?php print $q_pjt['pjtqty']?></div></td>
		<td width='114'><div align='right'>	<?php print number_format($q_pjt['pjttotal'])?></div></td>
		</tr>
<?php
		}
?>
		</table>
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