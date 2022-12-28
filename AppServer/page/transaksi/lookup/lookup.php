<div id="main-con-stock">
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['rid']<=2){	
	if(isset($_POST['sfilter'])){
		$keywords	= isset($_POST['tsnama'])?$_POST['tsnama']:'';
	} 
	else if (isset($_POST['sok'])){
		$bid		=$_POST['bid'];
		if ($bid<>'') {
		if ($_SESSION['page']==1){
		CK_ORDER();
		TRANSAKSI($bid);
?>
		<script type="text/javascript">
			TO_PEMBELIAN_A();
		</script>
<?php
		} else if ($_SESSION['page']==2){
			TRANSAKSI_R($bid);
?>
		<script type="text/javascript">
			TO_BARANGRUSAK_A();
		</script>
<?php
		}
		}
	} else{$keywords='';}
?>
	<form name='lookup' Aksi='?n=lookup' method='POST'>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='6' height='10' class="top"></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td width='10'></td>
			<td width='100'><h3>Nama Obat</h3></td>
			<td width='3'>:</td>
			<td width='200'>
			<input type="text" 	 name="tsnama" id="idtsnama" size=25 maxlength=25 tabindex=1></td>
			<td><?php if ($_SESSION['page']==1){?>
				<a href='?n=pembelian' style="border: 1px solid #666; background-color:#fff"> <?php } 
				else { ?>
				<a href='?n=barangrusak' style="border: 1px solid #666; background-color:#fff">
				<?php } ?>&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</a></td>
			<td width='100'></td>
		</tr>
		<tr>
			<td colspan='6'height='10'></td>
		</tr>
		</table>
		<!-- -->
		<div id="MidPan">
			<div class="m1Pan">		
				<table cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
				<tr height="25px" bgcolor="#000">
					<td width='100'><div align='center'><h3>Kode Obat</h3></div></td>
					<td width='170'><div align='center'><h3>Nama Obat</h3></div></td>
					<td width='80'><div align='center'><h3>Satuan Beli</h3></div></td>
					<td width='90'><div align='center'><h3>Harga Beli @</h3></div></td>
					<td width='15'></td>
				</tr>
				</table>
			</div>
			<div class="m2Pan">
<?php
                $keywords = isset($_POST['tsnama'])?$_POST['tsnama']:'';
				$q_barang=mysql_query("select barang.*,pbsatuan.pbsnama from barang,pbsatuan 
							where barang.bnama LIKE '%$keywords%' AND barang.pbsid=pbsatuan.pbsid order by bid");		  
				print "<table border=0 cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
				while ($q_ba=mysql_fetch_array($q_barang)){
				if (mysql_num_rows($q_barang)==1) {$bid=$q_ba['bid'];$bcode=$q_ba['bcode'];} else {$bid='';$bcode='';}
?>
				<tr height="25px" bgcolor="#F8F8F8" 
				onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
				onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
					<td width='100'><div align='right'> <?php print $q_ba['bcode']?></div></td>
					<td width='170'><div align='left'>	<?php print $q_ba['bnama']?></div></td>
					<td width='80'> <div align='right'>	<?php print $q_ba['pbsnama']?></div></td>
					<td width='90'> <div align='center'><?php print $q_ba['bbeli']?></div></td>
				</tr>
<?php
				}
?>
				</table>
			</div>
			<div class="m3Pan">
				<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
				<tr>
					<td colspan='6' height='10' class="top"></td>
				</tr>
				<tr>
					<td width='10'></td>
					<td width='100'><h3>Kode Obat</h3></td>
					<td width='3'>:</td>
					<td width='200'><input type="text" 	 name="tskode" id="idtskode" disabled='disabled' size=25 maxlength=25 tabindex=2 value="<?php print $bcode ?>"><input name='bid' type='hidden' value="<?php print $bid ?>"></td>
					<td width='130'><input type="submit" name="sok" value="   OK   " style="border: solid 1px #000; color:#fff;background-color:#000" tabindex=1></td>
					<td width='15'><input type="submit" name="sfilter" value="" style="border: 0px; background-color:transparent" tabindex=2></td>
				</tr>
				<tr>
					<td colspan='6'height='5'></td>
				</tr>
				</table>
			</div>
		</div>
	</form>
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
<script type="text/javascript">
	setST_focus();
	AksiST();
</script>