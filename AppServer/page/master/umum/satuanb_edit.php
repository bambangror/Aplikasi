<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$pbsid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_esatuan=mysql_query("SELECT * FROM pbsatuan WHERE pbsid='$pbsid'");	
	$q_esa=mysql_fetch_array($q_esatuan);
	
	if (isset($_POST['save'])){
		if (empty($_POST['sanama'])) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			TO_UMUM_A();
		</script>
<?php
	}
	else{
		$q_upusers=mysql_query("UPDATE pbsatuan SET pbsnama='$_POST[sanama]' WHERE pbsid='$_POST[pbsid]'");	
		$mssg='Perubahan disimpan! ';
	?>
		<script language="javascript">
 			TO_UMUM_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan dibatalkan! ';
?>
		<script language="javascript">
 			TO_UMUM_A();
		</script>
<?php
	}
?>

<form Aksi='?n=satuanb_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Satuan Beli</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="sanama" size=35 maxlength=20 tabindex=1 value="<?php print($q_esa['pbsnama']) ?>"></h3></td>
		<td width='520'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=7>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='pbsid' type='hidden' value="<?php print $pbsid ?>"></td></tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$said=$_GET['hapus'];
	$q_dsystem=mysql_query("delete from pbsatuan where pbsid='$said'");	
	$mssg='Satuan dihapus! ';
?>
		<script language="javascript">
 			TO_UMUM_A();
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