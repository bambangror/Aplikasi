<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
	if (isset($_POST['filter'])){
		$tgl=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgl'];
		$tgls=$_POST['tgl'].'/'.$_POST['bulan'].'/'.$_POST['tahun'];
		
		$_SESSION['tgl']=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgl'];

	} else {
	   $tgl=date('YYYY-mm-dd');$tglakhir=date('YYYY-mm-dd');
	   $keywords='';
	   $_SESSION['tgl']=$tgl;
	}
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' width='120'><div align='center'><h3>Laporan Harian Kassa</h3></div></td>
		<td><a href="?n=lapkasa_c" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='10'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='30'></td>
	</tr>
	<tr>
		<td colspan='12' height='4'></td>
	</tr>
	<form name='lapkasa' Aksi='?n=lapkasa' method='POST'>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Tanggal</h3></td>
		<td width='3'>:</td>
		<td width='160'><select name="tgl">
				<option selected value="<?php print isset($_POST['tgl'])?$_POST['tgl']:"01"; ?>"><?php print isset($_POST['tgl'])?$_POST['tgl']:"01"; ?></option>
					<?php for($i=1;$i<=31;$i++) {
						print "<option value='".$i."'>".$i."</option>";
						}
						?>
				</select>
				<select name="bulan">
				<option selected value="<?php print date('m') ?>"><?php print date('m') ?></option>
					<?php for($b=1;$b<=12;$b++) {
						print "<option value='".$b."'>".$b."</option>";
						}
					?>
				</select>
				<select name="tahun">
				<option selected value="<?php print date('Y') ?>"><?php print date('Y') ?></option>
					<?php for($t=2010;$t<=2030;$t++) {
						print "<option value='".$t."'>".$t."</option>";
						}
					?>
				</select>		
		</td>
		<td width='10'></td>
		<td width='80'><h3><input type="submit" name="filter" value="Tampil"></h3></td>
		<td width='3'></td>
		<td width='340'></td>
		<td colspan='4' width='65'></td>
	</tr>
	</form>
	<tr>
		<td colspan='12'height='10'></td>
	</tr>
	</table>
	<div id="MidPanL">
		<div class="m2PanL">
<?php
		$qry =mysql_query("SELECT DISTINCT penjualan.s_id FROM penjualan WHERE pjtgl='$tgl' ORDER BY s_id");
		while ($row=mysql_fetch_array($qry)){
				$s_idN[]=$row['s_id'];
		}
		
		echo '<b>Laporan Tanggal :  '.(isset($tgls)?$tgls:null).'</b>';
		echo '<hr>';
		$jnota = 0;
		$jjual = 0;
		$jmodal = 0;
		if (is_array(isset($s_idN)?$s_idN:null)) {
			foreach($s_idN as $key => $value) {
				$qryp =mysql_query("SELECT system.sno, modal.momodal,COUNT(DISTINCT penjualan.pjid) as 'nota',
						SUM(penjualan.pjbayar) as 'pjbayar'
						FROM penjualan,system,modal WHERE 
						penjualan.s_id=system.s_id AND penjualan.s_id='$value' AND pjtgl='$tgl' AND
						modal.modate='$tgl' AND modal.s_id='$value' ORDER BY system.s_id");
				$rowp=mysql_fetch_array($qryp);
			
			echo 'No. Kassa :'. $rowp['sno'].'<br>';
			echo 'Jumlah Nota :'.$rowp['nota'].'<br>';
			echo 'Jumlah Penjualan :Rp. '.number_format($rowp['pjbayar']).'<br>';
			echo 'Modal Awal :Rp. '.number_format($rowp['momodal']).'<br><br><hr>';
				
			$jnota += isset($rowp['nota'])?$rowp['nota']:0;
			$jjual += isset($rowp['pjbayar'])?$rowp['pjbayar']:0;
			$jmodal += isset($rowp['momodal'])?$rowp['momodal']:0;			
			}
		}
				
		echo '<b>Total Transaksi :'.(isset($jnota)?$jnota:0).'</b><br>';
		echo '<b>Total Penjualan : Rp. '.number_format(isset($jjual)?$jjual:0).'</b><br>';
		echo '<b>Total Modal Awal : Rp. '.number_format(isset($jmodal)?$jmodal:0).'</b><br><hr>';
		if(isset($jjual) && isset($jmodal)) {
		   echo '<b>Total Jumlah Uang : Rp. '.number_format($jjual+$jmodal).'</b><br>';
		} else {
			echo '<b>Total Jumlah Uang : Rp. '.number_format(0).'</b><br>';
		}
		?>
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