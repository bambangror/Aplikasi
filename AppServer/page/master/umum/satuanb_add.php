<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_POST['save'])){
		if (empty($_POST['sanama'])) {		
		$mssg='Satuan gagal ditamba!';
?>
		<script language="javascript">
 			TO_UMUM_A();
		</script>
<?php
	}
	else{
		$q_kasave = mysql_query("INSERT INTO pbsatuan (pbsnama) VALUES ('$_POST[sanama]');");	
		$mssg='Satuan baru disimpan! ';
	?>
		<script language="javascript">
 			TO_UMUM_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Tambah Satuan dibatalkan! ';
?>
		<script language="javascript">
 			TO_UMUM_A();
		</script>
<?php
	}
?>
<form Aksi='?n=satuanb_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Nama Satuan</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="sanama" size=35 maxlength=20 tabindex=1 value=""></h3></td>
		<td width='520'></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=2>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=3>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
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