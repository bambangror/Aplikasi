<div id="MidBotPan">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']<=2){

	$bcode	=isset($_POST['barcode'])?$_POST['barcode']:null;
	if ($bcode<>'') {
		if(isset($_POST['mOK'])){
			CEK_BTRANSAKSI($bcode);
		}
		else if(isset($_POST['mUP'])){
			if ($bcode=='0') {
				HAPUS_ITTRANSAKSI();
			}
			else {
				UPDATE_TRANSAKSI($bcode);
			}
		}
		else if(isset($_POST['mDS'])){
				UPDATE_DIS($bcode);
		}
	}
	print " <h3>Barcode :</h3>";
	?>
	<form action='index.php' method='POST'>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='3' width='200'><input type="text" 	 name="barcode" id="idbarcode" size=25 maxlength=25 tabindex=2 value="<?php print isset($bid)?$bid:null; ?>"></td>
	</tr>
	<tr>
		<td width='1'><input type="submit" name="mOK" id="idmOK" value="" style="border: 1px; background-color:transparent" tabindex=1></td>
		<td width='1'><input type="submit" name="mUP" id="idmUP" value="" style="border: 1px; background-color:transparent" tabindex=1></td>
		<td width='1'><input type="submit" name="mDS" id="idmDS" value="" style="border: 1px; background-color:transparent" tabindex=1></td>
	</tr>
	</table>
	</form>
	<div class="b1Pan">
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td height='20'></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td>&nbsp;Kassa</td>
			<td>&nbsp;:&nbsp;</td>
			<td width='60'><?php print $sno ?></td>
			<td>Kasir</td>
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
