<?php
if (isset($_POST['save'])){
	if (empty($_POST['bnama'])) {
?>
		<script language="javascript">
			alert("Nama Barang kosong!");
		</script>
<?php	
	}
	else if (empty($_POST['bharga'])) {
?>
		<script language="javascript">
			alert("Harga Barang kosong!");
		</script>
<?php	
	}
	else {
		FUNCTIONS_UPDATE($_POST['bid'],$_POST['bnama'],$_POST['bharga']);
?>
<script type="text/javascript">
        self.location.href ="index.php";
</script>
<?php
	}
}
else if(isset($_POST['cancel'])){
?>
<script type="text/javascript">
        self.location.href ="?n=edit";
</script>
<?php
}
else {
	$bid=isset($_GET['edit'])?$_GET['edit']:null;
	$qry=mysql_query("select * from barang where bkode='$bid'");
	$row=mysql_fetch_array($qry);	
}
?>
<form action="?n=edit_s" method=POST> 
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
	<tr>
		<td width='10'></td>
		<td width='90'><b>Kode </b></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bkode" disabled='disabled' size=15 maxlength=6 tabindex=1 value="<?php print $bid ?>"></h3></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><b>Nama </b></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" size=30 maxlength=128 tabindex=2 value="<?php print $row['bnama'] ?>"></h3></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><b>Harga</b></td>
		<td>:</td>
		<td><input type="text" 	 name="bharga" size=30 maxlength=35 tabindex=3 value="<?php print $row['bharga'] ?>"></h3></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>
		<button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=8>&nbsp;Save&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=9>&nbsp;Cancel&nbsp;</button>
		<input name='bid' type='hidden' value="<?php print $bid ?>">
		</td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>