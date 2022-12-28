<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$id=isset($_GET['edit'])?$_GET['edit']:null;
	$qry=mysql_query("select modal.* from modal where moid='$id'");					
	$row=mysql_fetch_array($qry);
	
	if (isset($_POST['save'])){
		
		$q_upbarang=mysql_query("UPDATE modal SET momodal='$_POST[momodal]' WHERE moid='$_POST[moid]'");	
		$mssg='Perubahan barang disimpan! ';;
	?>
		<script language="javascript">
 			TO_MODAL_A();
		</script>
<?php
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan barang dibatalkan! ';
?>
		<script language="javascript">
 			TO_MODAL_A();
		</script>
<?php
	}
?>
<form Aksi='?n=modalawal_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>ID Modal</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="id" disabled='disabled' size=15 maxlength=6 tabindex=1 value="<?php print ($row[moid]) ?>"></h3></td>
		<td width='560'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Modal Awal</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="momodal" size=30 maxlength=128 tabindex=2 value="<?php print $row['momodal'] ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=3>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=4>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='moid' type='hidden' value="<?php print $id ?>"></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
<?php
}
else if (isset($_GET['hapus'])) {
	$bid=isset($_GET['hapus'])?$_GET['hapus']:null;
	$q_dbarang=mysql_query("delete from barang where bid='$bid'");	
?>
		<script language="javascript">
 			TO_MODAL_A();
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