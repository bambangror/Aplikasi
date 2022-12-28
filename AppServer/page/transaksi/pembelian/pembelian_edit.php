<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$pbtid=isset($_GET['edit'])?$_GET['edit']:null;
	$qry=mysql_query("select b.*, pbsatuan.*,pbtransaksi.* from barang b, pbsatuan, pbtransaksi where
						b.pbsid=pbsatuan.pbsid and b.bid=pbtransaksi.bid and pbtransaksi.pbtaktif=1 and pbtransaksi.pbtid='$pbtid'");						
	$rowb=mysql_fetch_array($qry);
	if (isset($_POST['save'])){
		$bstock		=($_POST['bstock']+($_POST['qty']*$_POST['bisinew'])-($_POST['qty']*$_POST['bisi']));
		//--barang--						
		$q_uptr=mysql_query("UPDATE barang SET pbsid='$_POST[pbsid]',bisi='$_POST[bisinew]',bstock='$bstock',bbeli='$_POST[bbeli]' WHERE bid='$_POST[bid]'");	

		//--UPDATE--
		$diskon	=$_POST['ptdisc'];		
		$diskon =str_replace('%', '',$diskon);
		$pbtbeli =(($_POST['bbeli'])-(($diskon/100)*($_POST['bbeli'])))*$_POST['qty'];
		$pbtrpdiskon=(($diskon/100)*($_POST['bbeli']))*$_POST['qty'];
		//--
		$q_update = mysql_query("UPDATE pbtransaksi SET pbtrpdiskon='$pbtrpdiskon',pbtbeli='$pbtbeli' WHERE pbtaktif=1 and pbtid='$_POST[pbtid]'");
		
		$mssg='Perubahan barang disimpan! ';;
	?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
	else if (isset($_POST['cancel']))	{
		$mssg='Perubahan barang dibatalkan! ';
?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
?>
<form Aksi='?n=pembelian_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kode Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bcode" disabled='disabled' size=20 maxlength=15 tabindex=1 value="<?php print ($rowb['bcode']) ?>"></h3></td>
		<td width='600'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Obat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" disabled='disabled' size=20 maxlength=64 tabindex=2 value="<?php print($rowb['bnama']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Satuan</h3></td>
		<td>:</td>
		<td><h3><select name="pbsid" tabindex=3>
				<option selected value="<?php print($rowb['pbsid']) ?>"><?php print($rowb['pbsnama']) ?></option>
<?php
				$q_satuan=mysql_query("select * from pbsatuan order by pbsid");		  
				if (mysql_num_rows($q_satuan)>0) {
					while ($row=mysql_fetch_array($q_satuan)){
						print '<option value="'.$row['pbsid'].'">'.$row['pbsnama'].'</option>';
					}
				}
?>
		</select></h3>
		</td><td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>	
	<tr>
		<td></td>
		<td><h3>Isi</h3></td>
		<td>:</td>
		<td width='160'><input type="text" 	 name="bisinew" size=8 maxlength=6 tabindex=4 value="<?php print($rowb['bisi']) ?>"></h3></td>
	<tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>	
	<tr>
		<td></td>
		<td><h3>Harga Beli</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bbeli" size=8 maxlength=6 tabindex=5 value="<?php print $rowb['bbeli'] ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=7>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='pbtid' type='hidden' value="<?php print $pbtid ?>"></td>
		<td><input name='bid' type='hidden' value="<?php print ($rowb['bid']) ?>"></td>
		<td><input name='bstock' type='hidden' value="<?php print ($rowb['bstock']) ?>"></td>
		<td><input name='qty' type='hidden' value="<?php print ($rowb['pbtqty']) ?>"></td>
		<td><input name='bisi' type='hidden' value="<?php print ($rowb['bisi']) ?>"></td>
		<td><input name='pbtid' type='hidden' value="<?php print ($rowb['pbtid']) ?>"></td>
		<td><input name='ptdisc' type='hidden' value="<?php print$rowb['pbtdiskon'] ?>"></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
<?php
}
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