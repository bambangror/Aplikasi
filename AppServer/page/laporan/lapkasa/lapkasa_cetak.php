<style type="text/css">
.MidPanLc{
	background-color:#36630d;
	border-bottom:solid 1px #000;
}
.m2PanLc {
	font: 10px/160% tahoma, Helvetica, sans-serif;
	background-color:#fff;
	padding:10px 15px 10px 15px;
	width:170px;
}
#main-contentc{
	font: 10px/160% tahoma;
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
        setTimeout('self.location.href ="?n=lapkasa"',1);
    }
</script>
<?php
	if ($_SESSION['tgl']<>''){ ?>
		<script type="text/javascript">
			setTimeout('window.print()', 1000);
			setTimeout('Move()', 1000);
		</script>
	<div id="MidPanLc">
		<div class="m2PanLc">
<?php
		$tgl  =$_SESSION['tgl'];
		
		$qry =mysql_query("SELECT DISTINCT penjualan.s_id FROM penjualan WHERE pjtgl='$tgl' ORDER BY s_id");
		while ($row=mysql_fetch_array($qry)){
				$s_idN[]=$row['s_id'];
		}
		echo "<center><b>".strtoupper($q_system['snama'])."</b></br>";
		echo "".$q_system['salamat']."</center></br>";
		echo '<b>Laporan Harian Kassa</b></br>';
		echo '<b>Tanggal :  '.tgl_indo($tgl).'</b>';
		echo '<hr>';
		$jnota = 0;
		$jjual = 0;
		$jmodal = 0;
		if (is_array($s_idN)) {
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
				
			$jnota += $rowp['nota'];
			$jjual += $rowp['pjbayar'];
			$jmodal += $rowp['momodal'];			
			}
		}
				
		echo '<b>Total Transaksi :'.$jnota.'</b><br>';
		echo '<b>Total Penjualan : Rp. '.number_format($jjual).'</b><br>';
		echo '<b>Total Modal Awal : Rp. '.number_format($jmodal).'</b><br><hr>';
		echo '<b>Total Jumlah Uang : Rp. '.number_format(($jmodal+$jjual)).'</b><br>';?>
		</div>
	</div>
<?php
	unset($_SESSION['tgl']);
	}
	else { ?>
		<script type="text/javascript">
			setTimeout('self.location.href ="?n=lapkasa"',1);
		</script>	
	<?php }
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