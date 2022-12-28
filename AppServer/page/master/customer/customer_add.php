<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	ID_CUSTOMOR();
	if (isset($_POST['save'])){
		if (empty($_POST['cid'])) {		
		$mssg='Customer gagal ditamba!';
?>
		<script language="javascript">
 			TO_CUSTOMER_A();
		</script>
<?php
	}
	else{
		$q_cusave = mysql_query("INSERT INTO customer (cid,cnama,calamat,ctelp,cket)VALUES('$_POST[cid]','$_POST[cnama]','$_POST[calamat]','$_POST[ctelp]','$_POST[cket]');");	
		$mssg='Customer baru disimpan! ';;
	?>
		<script language="javascript">
 			TO_CUSTOMER_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Tambah customer dibatalkan! ';
?>
		<script language="javascript">
 			TO_CUSTOMER_A();
		</script>
<?php
	}
?>
<form Aksi='?n=customer_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='120'><h3>ID Customer</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="cid" disabled='disabled' size=35 maxlength=15 tabindex=1 value="<?php print $cid ?>"></h3></td>
		<td width='500'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Customer</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="cnama" size=35 maxlength=25 tabindex=2 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr  bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Alamat Customer</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="calamat" size=35 maxlength=64 tabindex=3 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>No. Telpon</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="ctelp" size=35 maxlength=25 tabindex=4 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Keterangan</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="cket" size=35 maxlength=65 tabindex=5 value=""></h3></td>
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