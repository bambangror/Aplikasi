<?php
if (isset($_POST['save'])){
	if (empty($_POST['bkode'])) {
?>
		<script language="javascript">
			alert("Kode Barang kosong!");
		</script>
<?php
	}
	else if (empty($_POST['bnama'])) {
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
		FUNCTIONS_SAVE($_POST['bkode'],$_POST['bnama'],$_POST['bharga']);
	}
}
else if(isset($_POST['cancel'])){
?>
<script type="text/javascript">
        self.location.href ="index.php";
</script>
<?php
}
?>
<form action="?n=tambah" method=POST> 
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
	<tr>
		<td width='10'></td>
		<td width='90'><b>Kode </b></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bkode" size=15 maxlength=6 tabindex=1 value=""></h3></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><b>Nama </b></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" size=30 maxlength=128 tabindex=2 value=""></h3></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><b>Harga</b></td>
		<td>:</td>
		<td><input type="text" 	 name="bharga" size=30 maxlength=35 tabindex=3 value=""></h3></td>
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
		</td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>