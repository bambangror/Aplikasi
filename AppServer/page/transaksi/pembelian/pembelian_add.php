<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	CK_ORDER();
	TOTAL_TR();
	if (isset($_POST['save'])){
		if ($_POST['pbbayarn']==0) {		
		$mssg='Tidak ada transaksi!';
?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
	else{
		$pbtgl=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgl'];
		$q_cusave = mysql_query("INSERT INTO pembelian (pbid,pbnota,pbtgl,spid,pbdiskon,pbbayar)
					VALUES('$_POST[pbidn]','$_POST[pbnota]','$pbtgl','$_POST[spid]','$_POST[discn]','$_POST[pbbayarn]');");	
		//--
		SAVE_TR();
		$mssg='Pembelian baru disimpan! ';
	?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Penyimpanan data pembelian dibatalkan! ';
?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
?>
<form Aksi='?n=pembelian_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='80'><h3>No. Bukti</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="pbid" disabled='disabled' size=20 maxlength=15 tabindex=1 value="<?php print $order ?>"></h3></td>
		<td width='600'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Tanggal</h3></td>
		<td>:</td>
		<td><select name="tgl">
				<option selected value="<?php print date('d') ?>"><?php print date('d') ?></option>
					<?php for($i=1;$i<=31;$i++) {
						print "<option value='".$i."'>".$i."</option>";
						}
						?>
				</select>
				<select name="bulan">
				<option selected value="<?php print date('m') ?>"><?php print date('m') ?></option>
					<?php for($b=1;$b<=12;$b++) {
						print "<option value='".$b."'>".$b."</option>";
						}
					?>
				</select>
				<select name="tahun">
				<option selected value="<?php print date('Y') ?>"><?php print date('Y') ?></option>
					<?php for($t=2010;$t<=2030;$t++) {
						print "<option value='".$t."'>".$t."</option>";
						}
					?>
				</select>
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr  bgcolor="#F8F8F8">
		<td></td>
		<td><h3>No. Nota</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="pbnota" size=20 maxlength=12 tabindex=3 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Supplier</h3></td>
		<td>:</td>
		<td><select name="spid" tabindex=4>
				<option selected value=""> - </option>
<?php
				$q_pupp=mysql_query("select * from supplier order by spid");		  
				if (mysql_num_rows($q_pupp)>0) {
					while ($row=mysql_fetch_array($q_pupp)){
						print '<option value="'.$row['spid'].'">'.$row['spnama'].'</option>';
					}
				}
?>
		</select>		
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Disc.</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="disc" size=20 maxlength=15 tabindex=5 disabled='disabled' value="<?php print number_format($disc)?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Total</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="pbbayar" size=20 maxlength=15 tabindex=6 disabled='disabled' value="<?php print number_format($total)?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=7>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=8>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='cid' type='hidden' value="<?php print $cid ?>"></td></tr>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
		<input name='pbidn' type='hidden' value="<?php print $order ?>">
		<input name='discn' type='hidden' value="<?php print $disc ?>">
		<input name='pbbayarn' type='hidden' value="<?php print $total ?>">
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