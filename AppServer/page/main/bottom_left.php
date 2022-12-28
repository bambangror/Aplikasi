<div id="MidBotPan">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){

	$bcode=isset($_POST['barcode'])?$_POST['barcode']:null;
	if (isset($bcode)) {
		if(isset($_POST['mOK'])){
			if (isset($_GET['n']) && $_GET['n']=='pembelian') {
				CEK_BTRANSAKSI($bcode);
			} else if (isset($_GET['n']) && $_GET['n']=='barangrusak'){
				CEK_BTRANSAKSI_R($bcode);
			}
		}
		else if(isset($_POST['mUP'])){
			if ($bcode=='0') {
				if (isset($_GET['n']) && $_GET['n']=='pembelian') {
					HAPUS_ITTRANSAKSI();
				}else if (isset($_GET['n']) && $_GET['n']=='barangrusak'){
					HAPUS_ITTRANSAKSI_R();
				}
			}
			else {
				if (isset($_GET['n']) && $_GET['n']=='pembelian') {
					UPDATE_TRANSAKSI($bcode);
				} else if (isset($_GET['n']) && $_GET['n']=='barangrusak'){
					UPDATE_TRANSAKSI_R($bcode);
				}
			}
		}
		else if(isset($_POST['mDS'])){
				UPDATE_DIS($bcode);
		}
	}
	print " <h3>Barcode :</h3>";
	if (isset($_GET['n']) && $_GET['n']=='pembelian') {
	print "<form Aksi='?n=pembelian' method='POST'>";
	} else {print "<form Aksi='?n=barangrusak' method='POST'>";} 
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='3' width='200'><input type="text" 	 name="barcode" id="idbarcode" size=25 maxlength=25 tabindex=2 value="<?php print isset($bid)?$bid:null; ?>"></td>
	</tr>
	<tr>
		<td width='1' height='1'><input type="submit" name="mOK" id="idmOK" value="" style="border: 1px; background-color:transparent" tabindex=1></td>
		<td width='1' height='1'><input type="submit" name="mUP" id="idmUP" value="" style="border: 1px; background-color:transparent" tabindex=1></td>
		<td width='1' height='1'><input type="submit" name="mDS" id="idmDS" value="" style="border: 1px; background-color:transparent" tabindex=1></td>
	</tr>
	</table>
	</form>
	<div class="b1Pan">
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr bgcolor="#F8F8F8">
			<td>&nbsp;Server</td>
			<td>&nbsp;:&nbsp;</td>
			<td width='60'><?php print $sid ?></td>
			<td>User</td>
			<td>&nbsp;:&nbsp;</td>
			<td width='60'><?php print $_SESSION['uname']; ?></td>
		</tr>
	</table>
	</div>
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
<script type="text/javascript">
	IN_BINT();
	setBR_focus();
	actionM();
</script>
