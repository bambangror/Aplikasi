<?php
if (isset($_SESSION['loggedin']) && $_SESSION['rid']<=2){
?>
<script type="text/javascript">
	if (window.print) {
		document.write();
	}
	setTimeout('window.print()', 1000);
</script>
<?php
	CK_ORDER();
	CK_MODAL();
	//--
?>
<div id="rekapp">
	<form name='frekap' action='?n=rekap' method='POST'>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='3' height='10' class="top"></td>
		</tr>
		<tr>
			<td width='300'><div align='center'><h3><?php print strtoupper('Rekap Penjualan Harian') ?></h3></div></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='5' height='5'>===============================</td>
		</tr>
		<tr>
			<td width='10'></td>
			<td width='60'>Kasir/Kassa</td>
			<td width='3'>:</td>
			<td width='169'><?php print $_SESSION['uname'].'/'.$sno;?></td>
			<td width='10'></td>
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
			<td colspan='5' height='5'></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='3'>REKAPITULASI HARIAN</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='3' height='2'>------------------------------</td>
			<td></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td width='12'></td>
			<td width='120'>No. Struk Awal</td>
			<td width='5'>:</td>
			<td colspan='2' width='140'><?php print $orderSR ?></td>
			<td width='10'></td>
		</tr>
		<tr>
			<td></td>
			<td>No. Struk Akhir </td>
			<td>:</td>
			<td colspan='2'><?php print $orderST ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td colspan='3' height='2'>---------------------------------</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Jumalah Transaksi</td>
			<td>:</td>
			<td colspan='2'><?php print $JumlahTR ?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='5' height='5'></td>
		</tr>
		<tr>
			<td></td>
			<td>Modal Awal</td>
			<td>:</td>
			<td width='15'>Rp.</td>
			<td><?php print number_format($modalS)?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Jumlah Penjualan</td>
			<td>:</td>
			<td width='15'>Rp.</td>
			<td><?php print number_format($TBayar)?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td height='2'>------------------------------</td>
			<td colspan='2'></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Total Kasir</td>
			<td>:</td>
			<td width='15'>Rp.</td>
			<td><?php print number_format(($modalS)+($TBayar))?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='5' height='20'></td>
		</tr>
		<tr>
			<td></td>
			<td><div align='center'>Kasir</div></td>
			<td></td>
			<td ></td>
			<td><div align='center'>Supervisor</div></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><div align='center'><?php print $_SESSION['uname'];?></div></td>
			<td></td>
			<td></td>
			<td><div align='center'>(___________)<div></td>
			<td></td>
		</tr>
		</table>
		<table border=1 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='3' height='10' class="top"></td>
		</tr>
		<tr>
			<td colspan='3' height='10' class="top"></td>
		</tr>
		</table>
	</form>
</div>
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