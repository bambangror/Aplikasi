<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$cid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_ecust=mysql_query("SELECT * FROM customer WHERE cid='$cid'");	
	$q_ec=mysql_fetch_array($q_ecust);
	
	if (isset($_POST['save'])){
		if (empty($_POST['cnama'])) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			TO_CUSTOMER_A();
		</script>
<?php
	}
	else{
		$q_upusers=mysql_query("UPDATE customer SET cnama='$_POST[cnama]',calamat='$_POST[calamat]',ctelp='$_POST[ctelp]',cket='$_POST[cket]' WHERE cid='$_POST[cid]'");	
		$mssg='Perubahan disimpan! ';
	?>
		<script language="javascript">
 			TO_CUSTOMER_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan dibatalkan! ';
?>
		<script language="javascript">
 			TO_CUSTOMER_A();
		</script>
<?php
	}
?>

<form Aksi='?n=customer_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='110'><h3>ID Customer</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	name="cid" disabled='disabled' size=35 maxlength=15 tabindex=1 value="<?php print($q_ec['cid']) ?>"></h3></td>
		<td width='500'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Customer</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="cnama" size=35 maxlength=25 tabindex=2 value="<?php print($q_ec['cnama']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Alamat Customer</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="calamat" size=35 maxlength=75 tabindex=3 value="<?php print($q_ec['calamat']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>No. Telpon</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="ctelp" size=35 maxlength=15 tabindex=4 value="<?php print($q_ec['ctelp']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Keterangan</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="cket" size=35 maxlength=65 tabindex=5 value="<?php print($q_ec['cket']) ?>"></h3></td>
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
		<td><input name='cid' type='hidden' value="<?php print $cid ?>"></td></tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$cid=$_GET['hapus'];
	$q_dsystem=mysql_query("delete from customer where cid='$cid'");	
?>
		<script language="javascript">
 			TO_CUSTOMER_A();
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