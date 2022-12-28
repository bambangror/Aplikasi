<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$id=isset($_GET['edit'])?$_GET['edit']:null;
	$qry=mysql_query("select temp_barcode.*,barang.*,pjsatuan.* from temp_barcode,barang,pjsatuan where
						temp_barcode.bid=barang.bid and barang.pjsid=pjsatuan.pjsid and tbid='$id'");		  					
	$row=mysql_fetch_array($qry);
	if (isset($_POST['save'])){
		//--barang--						
		$q_uptr=mysql_query("UPDATE temp_barcode SET tbqty='$_POST[tbqty]' WHERE tbid='$_POST[tbid]'");	
		$mssg='Keterangan barang disimpan! ';;
	?>
		<script language="javascript">
			TO_BARCODE_A();
		</script>
<?php
	}
	else if (isset($_POST['cancel']))	{
		$mssg='Keterangan barang dibatalkan! ';
?>
		<script language="javascript">
			TO_BARCODE_A();
		</script>
<?php
	}
?>
<form Aksi='?n=barcode_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kode Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bcode" disabled='disabled' size=20 maxlength=15 tabindex=1 value="<?php print ($row['bcode']) ?>"></h3></td>
		<td width='600'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Obat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" disabled='disabled' size=20 maxlength=64 tabindex=2 value="<?php print($row['bnama']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Qty</h3></td>
		<td>:</td>
		<td><h3><input type="text" 	 name="tbqty" size=20 maxlength=15 tabindex=3 value="<?php print($row['tbqty']) ?>"></h3>
		</td>
		<td></td>
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
		<td><input name='tbid' type='hidden' value="<?php print $id ?>"></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$id=$_GET[hapus];
	$q_dbarang=mysql_query("delete from temp_barcode where tbid='$id'");	
?>
		<script language="javascript">
 			TO_BARCODE_A();
		</script>
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