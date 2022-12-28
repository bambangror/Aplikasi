<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$spid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_esupp=mysql_query("SELECT * FROM supplier WHERE spid='$spid'");	
	$q_esp=mysql_fetch_array($q_esupp);
	
	if (isset($_POST['save'])){
		if (empty($_POST['spnama'])) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			TO_SUPPLIER_A();
		</script>
<?php
	}
	else{
		$q_upsupp=mysql_query("UPDATE supplier SET spnama='$_POST[spnama]',spalamat='$_POST[spalamat]',sptelp='$_POST[sptelp]',spfax='$_POST[spfax]' WHERE spid='$_POST[spid]'");	
		$mssg='Perubahan disimpan! ';
	?>
		<script language="javascript">
 			TO_SUPPLIER_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan data dibatalkan! ';
?>
		<script language="javascript">
 			TO_SUPPLIER_A();
		</script>
<?php
	}
?>

<form Aksi='?n=supplier_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='110'><h3>ID Supplier</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="spid" disabled='disabled' size=35 maxlength=15 tabindex=1 value="<?php print($q_esp['spid']) ?>"></h3></td>
		<td width='500'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Supplier</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="spnama" size=35 maxlength=35 tabindex=2 value="<?php print($q_esp['spnama']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Alamat Supplier</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="spalamat" size=35 maxlength=85 tabindex=3 value="<?php print($q_esp['spalamat']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Telp.</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="sptelp" size=35 maxlength=25 tabindex=4 value="<?php print($q_esp['sptelp']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Fax.</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="spfax" size=35 maxlength=25 tabindex=5 value="<?php print($q_esp['spfax']) ?>"></h3></td>
		<td width='15'></td>
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
		<td><input name='spid' type='hidden' value="<?php print $spid ?>"></td></tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$spid=$_GET['hapus'];
	$q_dsupp=mysql_query("delete from supplier where spid='$spid'");	
?>
		<script language="javascript">
 			TO_SUPPLIER_A();
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