<div id="main-con-hitung">

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['rid']<=2){
	//--Total--
		TOTAL_TR();
	//--
	if(isset($_POST['hok'])){
		$bayar	=$_POST['ttnama'];
		if (($total<>0)&&($bayar<>0)){
			$kembali=$bayar-$total;
			$_SESSION['bayar']	=$bayar;
			$_SESSION['kembali']=$kembali;
			//--
			CK_ORDER();
			TOTAL_TR();
?>
			<script type="text/javascript">
				S_PRINT();
			</script>
<?php
		}
		else {
			$total=0;
			$bayar=0;
			$kembali=0;
		}
	} else {
		$kembali = 0;
	}
?>
	<form name='hitung' action='?n=hitung' method='POST'>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='6' height='40' class="top"></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td width='10' height='40'></td>
			<td width='80'><h3>Total</h3></td>
			<td width='3'>:</td>
			<td width="3" rowspan="1"><div align='Left'><h2>&nbsp;Rp.</h2></td>
			<td width="200" rowspan="1" bgcolor="#000" style="color:#fff"><div align='right'><h2><?php print number_format($total)?>&nbsp;</h2></div></td>
			<td width='15'></td>
		</tr>
		<tr>
			<td colspan='6'height='10'></td>
		</tr>
		<tr>
			<td></td>
			<td><h3>Bayar</h3></td>
			<td>:</td>
			<td><div align='Left'><h2>&nbsp;Rp.</h2></td>
			<td><input type="text" 	 name="ttnama" id="idttnama" size=20 maxlength=25 tabindex=1 style="height: 30px; font-size: 20pt;"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='6'height='10'></td>
		</tr>
		<tr>
			<td height='40'></td>
			<td><h3>Kembali</h3></td>
			<td>:</td>
			<td width="3" rowspan="1"><div align='Left'><h2>&nbsp;Rp.</h2></td>
			<td width="200" rowspan="1" bgcolor="#000" style="color:#fff"><div align='right'><h2><?php print number_format($kembali)?>&nbsp;</h2></div></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='6'height='10'></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='5' width='130'><input type="submit" name="hok" value="" style="border: 0px; background-color:transparent" tabindex=2></td>
		</tr>
		</table>
		<!-- -->
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
<script type="text/javascript">
	setHT_focus();
	IN_TINT();
	actionHT();
</script>