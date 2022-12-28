<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$bid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_ebarang=mysql_query("select * from barang where bid='$bid'");						
	$q_eb=mysql_fetch_array($q_ebarang);
	
	if (isset($_POST['save'])){
		if (empty($_POST['bstock'])) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			TO_STOCK_A();
		</script>
<?php
	}
	else {
		$q_upbarang=mysql_query("UPDATE barang SET bstock='$_POST[bstock]' WHERE bid='$_POST[bid]'");	
		$mssg='Perubahan barang disimpan! ';;
	?>
		<script language="javascript">
 			TO_STOCK_A();
		</script>
<?php
	}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan barang dibatalkan! ';
?>
		<script language="javascript">
 			TO_STOCK_A();
		</script>
<?php
	}
?>
<form Aksi='?n=stock_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kode Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bcode" id="idbcode" disabled='disabled' size=15 maxlength=6 tabindex=1 value="<?php print ($q_eb['bcode']) ?>"></h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td width='10'></td>
		<td width='90'><h3>Nama Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bnama" id="idkbnama" disabled='disabled' size=30 maxlength=35 tabindex=2 value="<?php print($q_eb['bnama']) ?>"></h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Stock</h3></td>
		<td width='3'>:</td>
		<td><input type="text" 	 name="bstock" size=15 maxlength=6 tabindex=3 value="<?php print ($q_eb['bstock']) ?>"></h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=4>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=5>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='bid' type='hidden' value="<?php print $bid ?>"></td>
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