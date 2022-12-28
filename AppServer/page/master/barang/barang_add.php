<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_POST['save'])){
		if (empty($_POST['bcode'])) {		
		$mssg='Kode barang harus diisi!';
?>
		<script language="javascript">
 			TO_BARANG_A();
		</script>
<?php
	}
	else {
		$q_cek = mysql_query ("SELECT bcode FROM barang WHERE (bcode='$_POST[bcode]')");
		$totcek = mysql_num_rows($q_cek);
		if($totcek>=1){
		   echo "<div align='center'><b>Kode Barang sudah digunakan, silakan gunakan kode yang lain!</b></div>";
		   exit;
		}
		$q_bsave = mysql_query ("INSERT INTO barang (bcode,bnama,prid,kid,pjsid,bjual,barcode)
								VALUES('$_POST[bcode]','$_POST[bnama]','$_POST[prid]','$_POST[kid]','$_POST[pjsid]','$_POST[bjual]','$_POST[barcode]');");
		$mssg='Data barang baru disimpan! ';
	?>
		<script language="javascript">
 			TO_BARANG_A();
		</script>
<?php
	}
	} else if (isset($_POST['cancel']))	{
		$mssg='Tambah barang dibatalkan! ';
?>
		<script language="javascript">
 			TO_BARANG_A();
		</script>
<?php
	}
?>
<form Aksi='?n=barang_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kode Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bcode" id="idbcode" size=15 maxlength=6 tabindex=1 value=""></h3></td>
		<td width='560'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Barcode</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="barcode" id="idinfo" size=30 maxlength=128 tabindex=2 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Nama Obat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" id="idkbnama" size=30 maxlength=35 tabindex=3 value=""></h3></td>
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
				<option selected value=""> - </option>
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
				<option selected value=""> - </option>
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
				<option selected value=""> - </option>
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
		<td><input type="text" 	 name="bjual" id="idinfo" size=15 maxlength=15 tabindex=7 value=""></h3></td>
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
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
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