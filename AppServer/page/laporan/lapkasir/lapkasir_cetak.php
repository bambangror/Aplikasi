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
        setTimeout('self.location.href ="?n=lapkasir"',1);
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
		
		$qry =mysql_query("SELECT DISTINCT penjualan.uid FROM penjualan WHERE pjtgl='$tgl' ORDER BY uid");
		while ($row=mysql_fetch_array($qry)){
				$uidN[]=$row['uid'];
		}
		
		echo "<center><b>".strtoupper($q_system['snama'])."</b></br>";
		echo "".$q_system['salamat']."</center></br>";
		echo '<b>Laporan Harian Kasir</b></br>';
		echo '<b>Tanggal :  '.tgl_indo($tgl).'</b>';
		echo '<hr>';
		$jnota = 0;
		$jjual = 0;
		$jmodal = 0;
		if (is_array(isset($uidN)?$uidN:null)) {
			foreach($uidN as $key => $value) {
				$qryp =mysql_query("SELECT users.uid,users.uname, modal.momodal,COUNT(DISTINCT penjualan.pjid) as 'nota',
						SUM(penjualan.pjbayar) as 'pjbayar'
						FROM users,modal,penjualan WHERE 
						users.uid=modal.uid AND penjualan.uid='$value' AND pjtgl='$tgl' AND
						modal.modate='$tgl' AND modal.uid='$value'");
				$rowp=mysql_fetch_array($qryp);
			
			echo 'No. Pegawai :'. $rowp['uid'].' ('.$rowp['uname'].')<br>';
			echo 'Jumlah Nota :'.$rowp['nota'].'<br>';
			echo 'Jumlah Penjualan :Rp. '.number_format($rowp['pjbayar']).'<br>';
			echo 'Modal Awal :Rp. '.number_format($rowp['momodal']).'<br><br><hr>';
				
			$jnota += isset($rowp['nota'])?$rowp['nota']:0;
			$jjual += isset($rowp['pjbayar'])?$rowp['pjbayar']:0;
			$jmodal += isset($rowp['momodal'])?$rowp['momodal']:0;				
			}
		}
				
		echo '<b>Total Transaksi :'.$jnota.'</b><br>';
		echo '<b>Total Penjualan : Rp. '.number_format($jjual).'</b><br>';
		echo '<b>Total Modal Awal : Rp. '.number_format($jmodal).'</b><br><hr>';
		echo '<b>Total Jumlah Uang : Rp. '.number_format(($jmodal+$jjual)).'</b><br>';
?>
		</div>
	</div>
<?php
	unset($_SESSION['tgl']);
	}
	else { ?>
		<script type="text/javascript">
			setTimeout('self.location.href ="?n=lapkasir"',1);
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