<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$prid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_eprodusen=mysql_query("SELECT * FROM produsen WHERE prid='$prid'");	
	$q_epr=mysql_fetch_array($q_eprodusen);
	
	if (isset($_POST['save'])){
		if (empty($_POST['prnama'])) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			TO_PRODUSEN_A();
		</script>
<?php
	}
	else{
		$q_upusers=mysql_query("UPDATE produsen SET prnama='$_POST[prnama]',pralamat='$_POST[pralamat]',prtelp='$_POST[prtelp]' WHERE prid='$_POST[prid]'");	
		$mssg='Perubahan disimpan! ';
	?>
		<script language="javascript">
 			TO_PRODUSEN_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan dibatalkan! ';
?>
		<script language="javascript">
 			TO_PRODUSEN_A();
		</script>
<?php
	}
?>
<form Aksi='?n=produsen_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Nama Pabrik</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="prnama" id="idprnama" size=35 maxlength=15 tabindex=1 value="<?php print ($q_epr['prnama']) ?>"></h3></td>
		<td width='520'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Alamat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="pralamat" id="idpralamat" size=35 maxlength=15 tabindex=2 value="<?php print($q_epr['pralamat']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Telp</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="prtelp" id="idprtelp" size=35 maxlength=15 tabindex=2 value="<?php print($q_epr['prtelp']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=5>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='prid' type='hidden' value="<?php print $prid ?>"></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$prid=$_GET['hapus'];
	$q_dsystem=mysql_query("delete from produsen where prid='$prid'");	
?>
		<script language="javascript">
 			TO_PRODUSEN_A();
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