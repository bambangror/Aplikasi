<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && ($_SESSION['rid']==1)){	
	$_SESSION['page']=1;
	//--
	CK_ORDER();
	TOTAL_TR();
	//--
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' width='720' ><div align='center'><h3>Transaksi Pembelian</h3></div></td>
		<td><a href="?n=pembelian_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;</a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</a></td>
		<td width='10'></td>		
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='80'><h3>No. Bukti</h3></td>
		<td width='3'>:</td>
		<td width='160'><h3><?php print $order?></h3></td>
		<td width='250'></td>
		<td colspan='2'width='280'><h3>Total :</h3></td>
		<td colspan='5' width='80'></td>
	</tr>
	<tr>
		<td colspan='8'height='2'></td>
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
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td height='10'></td>
	</tr>
	<tr>
		<td colspan='8'height='2'></td>
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
		<td width='30'><div align='center'><h3>Qty</h3></div></td>
		<td width='55'><div align='center'><h3>Disc.</h3></div></td>
		<td width='70'><div align='center'><h3>Harga Beli @</h3></div></td>
		<td width='100'><div align='center'><h3>Jumlah</h3></div></td>
		<td width='140'><div align='center'><h3>Kategori</h3></div></td>
		<td width='20'><div align='center'><h3>Edit</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$q_tr=mysql_query("select pbtransaksi.*,b.*,k.*,pbsatuan.* from pbtransaksi,barang b,kategori k,pbsatuan where 
							pbtransaksi.bid=b.bid and b.kid=k.kid and b.pbsid=pbsatuan.pbsid and pbtaktif=1 order by pbtno");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($q_tr)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
    	<td width='30'><div align='right'>	<?php print $no ?></div></td>
		<td width='60'><div align='right'>	<?php print $row['bcode']?></div></td>
		<td width='215'><div align='left'>	<?php print $row['bnama']?></div></td>
		<td width='60'><div align='center'><?php print $row['pbsnama']?></div></td>
		<td width='30'><div align='center'><?php print $row['pbtqty']?></div></td>
		<td width='55'><div align='center'><?php print $row['pbtdiskon']?></div></td>
		<td width='70'> <div align='right'>	<?php print number_format($row['bbeli'])?></div></td>
		<td width='100'> <div align='center'><?php print number_format($row['pbtbeli'])?></div></td>
		<td width='140'> <div align='center'><?php print $row['knama']?></div></td>
<?php
		print "<td width='16' align='center'><a href='./?n=pembelian_e&&edit=$row[pbtid]'><img src='./misc/edit.gif'></a></td>";
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