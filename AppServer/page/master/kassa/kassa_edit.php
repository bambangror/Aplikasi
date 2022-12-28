<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$sid=isset($_GET['edit']) ? $_GET['edit'] : null;
	$q_esystem=mysql_query("select system.* from system where s_id='$sid'");	
	$q_es=mysql_fetch_array($q_esystem);
	
	if (isset($_POST['save'])){
		if (!isset($_POST['nokassa'])) {		
		$mssg='Kassa harus diisi!';
?>
		<script language="javascript">
 			TO_KASSA_A();
		</script>
<?php
	}
	else {
		$q_upsystem=mysql_query("UPDATE system SET sno='$_POST[nokassa]',snama='$_POST[snama]',salamat='$_POST[alamat]',sinfo='$_POST[info]',sok='$_POST[sok]' WHERE s_id='$_POST[sid]'");	
		$mssg='Perubahan disimpan! ';;
	?>
		<script language="javascript">
 			TO_KASSA_A();
		</script>
<?php
	}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan dibatalkan! ';
?>
		<script language="javascript">
 			TO_KASSA_A();
		</script>
<?php
	}
?>
<form Aksi='?n=kassa_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20' width='860' ><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>IP</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="ip" id="idip" disabled='disabled' size=15 maxlength=15 tabindex=1 value="<?php print ($q_es['sip']) ?>"></h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td width='10'></td>
		<td width='90'><h3>Kassa</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="nokassa" id="idkassa" size=15 maxlength=15 tabindex=1 value="<?php print($q_es['sno']) ?>"></h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Sistem</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="snama" id="idsistem" size=35 maxlength=64 tabindex=2 value="<?php print strtoupper($q_es['snama']) ?>"></h3></td>
		<td width='15'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td height='10'><h3>Alamat</h3></td>
		<td>:</td>
		<td rowspan="2"><textarea rows='5' name='alamat' cols='50' tabindex=3><?php print $q_es['salamat'] ?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td height='70'></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Informasi</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="info" id="idinfo" size=35 maxlength=128 tabindex=4 value="<?php print $q_es['sinfo'] ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Status</h3></td>
		<td>:</td>
	<td width='160'><h3><select name="sok">
				<option selected value="<?php print $q_es['sok'] ?>"><?php if ($q_es['sok']==0) {print 'OFF';} else print 'ON'; ?></option>
				<option value='0'>OFF</option>
				<option value='1'>ON</option>
		</select></h3></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='sid' type='hidden' value="<?php print $sid ?>"></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$sid=isset($_GET['hapus']) ? $_GET['hapus'] : null;
	$q_dsystem=mysql_query("delete from system where s_id='$sid'");		
	print "Sistem telah dihapus!";
?>
		<script language="javascript">
 			TO_KASSA_A();
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