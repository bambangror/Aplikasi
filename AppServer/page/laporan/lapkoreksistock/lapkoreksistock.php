<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
	if (isset($_POST['filter'])){
		$tglawal=$_POST['tahuna'].'-'.$_POST['bulana'].'-'.$_POST['tgla'];
		$tglakhir=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgl'];
		
		$_SESSION['tglawal']=$_POST['tahuna'].'-'.$_POST['bulana'].'-'.$_POST['tgla'];
		$_SESSION['tglakhir']=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgl'];

	} else {$tglawal=date('YYYY-mm-dd');$tglakhir=date('YYYY-mm-dd');$keywords=''; }
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' width='120'><div align='center'><h3>Laporan Koreksi Stock</h3></div></td>
		<td><a href="?n=lapkoreksistock_c" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='10'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='60'></td>
	</tr>
	<tr>
		<td colspan='12' height='4'></td>
	</tr>
	<form name='lapkoreksistock' Aksi='?n=lapkoreksistock' method='POST'>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Tanggal awal</h3></td>
		<td width='3'>:</td>
		<td width='160'><select name="tgla">
				<option selected value="<?php print isset($_POST['tgla'])?$_POST['tgla']:"01"; ?>"><?php print isset($_POST['tgla'])?$_POST['tgla']:"01"; ?></option>
					<?php for($i=1;$i<=31;$i++) {
						print "<option value='".$i."'>".$i."</option>";
						}
						?>
				</select>
				<select name="bulana">
				<option selected value="<?php print date('m') ?>"><?php print date('m') ?></option>
					<?php for($b=1;$b<=12;$b++) {
						print "<option value='".$b."'>".$b."</option>";
						}
					?>
				</select>
				<select name="tahuna">
				<option selected value="<?php print date('Y') ?>"><?php print date('Y') ?></option>
					<?php for($t=2010;$t<=2030;$t++) {
						print "<option value='".$t."'>".$t."</option>";
						}
					?>
				</select>		
		</td>
		<td width='10'></td>
		<td width='100'></td>
		<td width='3'></td>
		<td width='260'></td>
		<td colspan='4' width='15'></td>
	</tr>
	<tr>
		<td colspan='12' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Tanggal akhir</h3></td>
		<td>:</td>
		<td>
		<select name="tgl">
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
		<td></td>
		<td width='10'><input type="submit" name="filter" value="Tampil"></td>
		<td width='3'></td>
		<td width='260'><h3>
		</h3>
		</td>
		<td colspan='4' width='15'></td>
	</tr>
	</form>
	<tr>
		<td colspan='12' height='2'></td>
	</tr>
	<tr>
		<td colspan='12'height='10'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='80' align='center'><h3>Tanggal</h3></td>
    	<td width='180' align='center'><h3>Nama Barang</h3></td>
		<td width='70' align='center'><h3>Harga Beli</h3></td>
		<td width='200'align='center'><h3>Keterangan</h3></td>
		<td width='40' align='center'><h3>Qty</h3></td>
		<td width='70'><div align='center'><h3>Kerugian</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("select barang_rusak.*,barang.* from barang_rusak,barang where 
						barang_rusak.bid=barang.bid and 
						brtgl_dicatat>='$tglawal' and brtgl_dicatat<='$tglakhir' ORDER BY brid");			
		print "<table class='main' cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='80'><div align='right'>	<?php print $row['brtgl_dicatat']?></div></td>
    	<td width='180'><div align='left'>	<?php print $row['bnama']?></div></td>
		<td width='70'><div align='right'>	<?php print number_format($row['bbeli'])?></div></td>
		<td width='200'><div align='left'> 	<?php print $row['brket']?></div></td>
		<td width='40'><div align='center'>	<?php print $row['brqty']?></div></td>
		<td width='70'><div align='right'> 	<?php print number_format($row['bbeli']*$row['brqty'])?></div></td>
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