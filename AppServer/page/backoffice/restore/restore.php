<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	

	if (isset($_POST['uploade'])) {
	$target_path = "page/backoffice/restore/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		$fname= basename( $_FILES['uploadedfile']['name']);
		RESTORE_DB($fname);
		} else{
		echo "Belum ada file yang harus diuplude!";
		}	
	} 
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' width='720' ><div align='center'><h3>Restore Database</h3></div></td>
		<td></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='10'></td>
	</tr>
	<tr>
		<td colspan='12' height='4'></td>
	</tr>
	<form enctype="multipart/form-data" Aksi="?n=restore" method="POST">
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>File Restore</h3></td>
		<td width='3'>:</td>
		<td width='160'><input name="uploadedfile" type="file" /></td>
		<td width='100'></td>
		<td width='80'></td>
		<td width='3'></td>
		<td width='260'></td>
		<td colspan='4' width='15'></td>
	</tr>
	<tr>
		<td colspan='12' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><input type="submit" name="uploade" value="Restore" /></td>
		<td></td>
		<td width='80'></td>
		<td width='3'></td>
		<td width='260'></td>
		<td colspan='4' width='15'></td>
	</tr>
	</form>
	<tr>
		<td colspan='12'height='10'></td>
	</tr>
	</table>
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