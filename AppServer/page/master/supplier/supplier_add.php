<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	ID_SUPPLIER();
	if (isset($_POST['save'])){
		if (empty($_POST['spnama'])) {		
		$mssg='Supplier gagal ditamba!';
?>
		<script language="javascript">
 			TO_SUPPLIER_A();
		</script>
<?php
	}
	else{
		$q_spsave = mysql_query("INSERT INTO supplier (spid,spnama,spalamat,sptelp,spfax) VALUES ('$_POST[spid]','$_POST[spnama]','$_POST[spalamat]','$_POST[sptelp]','$_POST[spfax]');");	
		$mssg='Supplier baru disimpan! ';
	?>
		<script language="javascript">
 			TO_SUPPLIER_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Tambah supplier dibatalkan! ';
?>
		<script language="javascript">
 			TO_SUPPLIER_A();
		</script>
<?php
	}
?>
<form Aksi='?n=supplier_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='110'><h3>ID Supplier</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="spid" disabled='disabled' size=15 maxlength=8 tabindex=1 value="<?php print $spid ;?>"></h3></td>
		<td width='500'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Supplier</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="spnama" size=35 maxlength=35 tabindex=2 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Alamat Supplier</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="spalamat" size=35 maxlength=85 tabindex=3 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Telp.</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="sptelp" size=15 maxlength=25 tabindex=4 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Fax.</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="spfax" size=15 maxlength=25 tabindex=5 value=""></h3></td>
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
		<td><input name='spid' type='hidden' value="<?php print $spid ?>"></td></tr>
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