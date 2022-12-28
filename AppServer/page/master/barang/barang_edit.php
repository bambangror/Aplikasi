<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$bid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_ebarang=mysql_query("select b.*, pr.*,k.*,pjsa.* from barang b,produsen pr, kategori k,pjsatuan pjsa where
						b.prid=pr.prid and b.kid=k.kid and b.pjsid=pjsa.pjsid and b.bid='$bid'");						
	$q_eb=mysql_fetch_array($q_ebarang);
	
	if (isset($_POST['save'])){
		
		$q_upbarang=mysql_query("UPDATE barang SET bnama='$_POST[bnama]',prid='$_POST[prid]',kid='$_POST[kid]',
								pjsid='$_POST[pjsid]',barcode='$_POST[barcode]',bjual='$_POST[bjual]' WHERE bid='$_POST[bid]'");	
		$mssg='Perubahan barang disimpan! ';;
	?>
		<script language="javascript">
 			TO_BARANG_A();
		</script>
<?php
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan barang dibatalkan! ';
?>
		<script language="javascript">
 			TO_BARANG_A();
		</script>
<?php
	}
?>
<form Aksi='?n=barang_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kode Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bcode" id="idbcode" disabled='disabled' size=15 maxlength=6 tabindex=1 value="<?php print ($q_eb['bcode']) ?>"></h3></td>
		<td width='560'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Barcode</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="barcode" id="idinfo" size=30 maxlength=128 tabindex=2 value="<?php print $q_eb['barcode'] ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Nama Obat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" id="idkbnama" size=30 maxlength=35 tabindex=3 value="<?php print($q_eb['bnama']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Produsen</h3></td>
		<td>:</td>
		<td><h3><select name="prid" tabindex=4>
				<option selected value="<?php print($q_eb['prid']) ?>"><?php print($q_eb['prnama']) ?></option>
<?php
				$q_produ=mysql_query("select * from produsen order by prid");		  
				if (mysql_num_rows($q_produ)>0) {
					while ($row=mysql_fetch_array($q_produ)){
						print '<option value="'.$row['prid'].'">'.$row['prnama'].'</option>';
					}
				}
?>
		</select></h3>
		</td>
		<td></td>
	</tr>
		<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Kategori</h3></td>
		<td>:</td>
		<td><h3><select name="kid" tabindex=5>
				<option selected value="<?php print($q_eb['kid']) ?>"><?php print($q_eb['knama']) ?></option>
<?php
				$q_satuan=mysql_query("select * from kategori order by kid");		  
				if (mysql_num_rows($q_satuan)>0) {
					while ($row=mysql_fetch_array($q_satuan)){
						print '<option value="'.$row['kid'].'">'.$row['knama'].'</option>';
					}
				}
?>
		</select></h3>
		</td><td></td>
	</tr>
	<tr>
		<td colspan='5' height='5'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Satuan Jual</h3></td>
		<td>:</td>
		<td><h3><select name="pjsid" tabindex=6>
				<option selected value="<?php print($q_eb['pjsid']) ?>"><?php print($q_eb['pjsnama']) ?></option>
<?php
				$q_produ=mysql_query("select * from pjsatuan order by pjsid");		  
				if (mysql_num_rows($q_produ)>0) {
					while ($row=mysql_fetch_array($q_produ)){
						print '<option value="'.$row['pjsid'].'">'.$row['pjsnama'].'</option>';
					}
				}
?>
		</select></h3>
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='5'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Harga Jual</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bjual" id="idinfo" size=15 maxlength=15 tabindex=7 value="<?php print $q_eb['bjual'] ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=8>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=9>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='bid' type='hidden' value="<?php print $bid ?>"></td>
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
 			TO_BARANG_A();
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