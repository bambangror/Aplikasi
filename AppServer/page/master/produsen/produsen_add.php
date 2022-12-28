<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_POST['save'])){
		if (empty($_POST['prnama'])) {		
		$mssg='Produsen gagal ditamba!';
?>
		<script language="javascript">
 			TO_PRODUSEN_A();
		</script>
<?php
	}
	else{
		$q_prsave = mysql_query("INSERT INTO produsen (prnama,pralamat,prtelp)VALUES('$_POST[prnama]','$_POST[pralamat]','$_POST[prtelp]');");	
		$mssg='Produsen baru disimpan! ';;
	?>
		<script language="javascript">
 			TO_PRODUSEN_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Tambah produsen dibatalkan! ';
?>
		<script language="javascript">
 			TO_PRODUSEN_A();
		</script>
<?php
	}
?>
<form Aksi='?n=produsen_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Nama Pabrik</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="prnama" id="idprnama" size=35 maxlength=15 tabindex=1 value=""></h3></td>
		<td width='520'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Alamat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="pralamat" id="idpralamat" size=35 maxlength=15 tabindex=2 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Telp.</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="prtelp" id="idprtelp" size=35 maxlength=15 tabindex=3 value=""></h3></td>
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