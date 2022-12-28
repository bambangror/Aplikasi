<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
?>
<script type="text/javascript">
	if (window.print) {
		document.write();
	}
	setTimeout('window.print()', 1000);
</script>
<?php
	CK_ORDER();
	TOTAL_TR();
	//--
?>
<div id="pstruk">
	<form name='struk' Aksi='?n=struk' method='POST'>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='3' height='10' class="top"></td>
		</tr>
		<tr>
			<td width='260'><div align='center'><h3><?php print strtoupper($q_system['ssystem']) ?></h3></div></td>
		</tr>
		<tr>
			<td><div align='center'><?php print $q_system['sinfo'] ?></div></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='5' height='5'><h3>-----------------------------------------------------------------<h3></td>
		</tr>
		<tr>
			<td width='10'></td>
			<td width='60'>No. Order</td>
			<td width='3'>:</td>
			<td width='169'><?php print $order;?></td>
			<td width='10'></td>
		</tr>
		<tr>
			<td></td>
			<td>Kasir/Kassa</td>
			<td>:</td>
			<td><?php print $_SESSION['uname'].'/'.$sid;?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php print $date?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Jam</td>
			<td>:</td>
			<td><?php print $jam?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Pembayaran</td>
			<td>:</td>
			<td>tunai</td>
			<td></td>
		</tr>
		<tr>
			<td colspan='5' height='5'>=====================================</td>
		</tr>
		</table>
<?php
		$q_pjtr=mysql_query("select pjtransaksi.*,barang.* from pjtransaksi,barang 
							where pjtransaksi.bid=barang.bid and pjtaktif=1 and sid='$sid' order by pjtno");		  
		print "<table border=0 cellpadding=1 cellspacing=1 style='border:solid 0px #000;color:#000'>";
		while ($q_pjt=mysql_fetch_array($q_pjtr)){
?>
		<tr>
			<td width='60'><div align='right'><?php print $q_pjt[bid]?></div></td>
			<td width='8'></td>
			<td colspan='2'width='160'><div align='left'><?php print $q_pjt[bnama]?></div></td>
			<td width='20'></td>
		</tr>
		<tr>
			<td><div align='right'><?php print $q_pjt[pjtqty].' x';?></div></td>
			<td></td>
			<td ><div align='left'><?php print number_format($q_pjt[bjual])?></td>
			<td><div align='right'>	<?php print number_format($q_pjt[pjttotal])?></div></td>
			<td></td>
		</tr>
<?php
		}
?>
		<tr>
			<td></td>
			<td colspan='3' height='5'><h3>------------------------------------------------<h3></td>
			<td></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td width='40'></td>
			<td width='60'>Total Item</td>
			<td width='3'>:</td>
			<td width='138'><div align='right'><?php print $item?></div></td>
			<td width='10'></td>
		</tr>
		<tr>
			<td></td>
			<td>Total Belanja</td>
			<td>:</td>
			<td><div align='right'><?php print number_format($total)?></div></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Total Disc.</td>
			<td>:</td>
			<td><div align='right'><?php print number_format($disc)?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Tunai</td>
			<td>:</td>
			<td><div align='right'><?php print number_format($_SESSION['bayar'])?></div></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Kembali</td>
			<td>:</td>
			<td><div align='right'><?php print number_format($_SESSION['kembali'])?></div></td>
			<td></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='5' height='5'><h3>-----------------------------------------------------------------<h3></td>
		</tr>
		<tr>
			<td width='260'><div align='center'><h3>TERIMAKASIH ATAS KUNJUNGAN ANDA</h3></div></td>
		</tr>
		<tr>
			<td><div align='center'>Barang yang sudah dibeli tidak dapat</div></td>
		</tr>
		<tr>
			<td><div align='center'>ditukar/kembali</div></td>
		</tr>
		</table>
	</form>
</div>
<?php 
	SAVE_TR($uid);
	unset($_SESSION['bayar']);
	unset($_SESSION['kembali']);
?>
	<script type="text/javascript">
		TO_INDEX();
	</script>
<?php
} else {
?>
<script language="javascript">
	TO_OUT();
</script>	
<?php
}
?>
