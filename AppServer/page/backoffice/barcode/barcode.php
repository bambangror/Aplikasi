<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && ($_SESSION['rid']==1)){
	$_SESSION['barcode']=1;	
	if (isset($_POST['insert'])){
	if (empty($_POST['qty'])) {	
	
	} else {
		$q_in= mysql_query ("INSERT INTO temp_barcode(bid,tbqty) VALUES('$_POST[bid]','$_POST[qty]');");
	}
	}
?>
	<form name='barang' Aksi='?n=barcode' method='POST'>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' width='720' ><div align='center'><h3>Cetak Barcode</h3></div></td>
		<td><a href="?n=barcode_cetak" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='10'></td>
	</tr>
	<tr>
		<td colspan='12' height='4'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kategori</h3></td>
		<td width='3'>:</td>
		<td width='260'>
		<h3><select name="knama">
				<option selected value="<?php print isset($_POST['knama'])?$_POST['knama']:null; ?>"><?php print isset($_POST['knama'])?$_POST['knama']:null; ?></option>
<?php
				$q_stock=mysql_query("select * from kategori order by kid");		  
				if (mysql_num_rows($q_stock)>0) {
					while ($row=mysql_fetch_array($q_stock)){
						print '<option value="'.$row['knama'].'">'.$row['knama'].'</option>';
					}
				}
?>
		</select>
		<input type="submit" name="submit" value="Kategori"></h3>
		</td>
		<td width='100'></td>
		<td width='80'><h3>Qty Cetak</h3></td>
		<td width='3'>:</td>
		<td width='260'><h3><input type="text" 	 name="qty" size=10 maxlength=10 tabindex=2 value="<?php print isset($bid)?$bid:null; ?>"></h3>
		</td>
		<td colspan='4' width='15'></td>
	</tr>
	<tr>
		<td colspan='12' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Obat</h3></td>
		<?php isset($_POST['knama']) ? $activasi = '' : $activasi = 'disabled'; ?>
		<td>:</td>
		<td><h3><select name="bid" <?php echo $activasi ?>>
				<option selected value=""></option>
<?php
				$q_stock=mysql_query("select barang.*,kategori.* from barang,kategori where barang.kid=kategori.kid
					and kategori.knama LIKE '$_POST[knama]' order by bid");		  
				if (mysql_num_rows($q_stock)>0) {
					while ($row=mysql_fetch_array($q_stock)){
						print '<option value="'.$row['bid'].'">'.$row['bnama'].'</option>';
					}
				}
?>
		</select></h3>
		</td>
		<td></td>
		<td width='80'></td>
		<td width='3'></td>
		<td width='260'><h3>
		<input type="submit" name="insert" value="Insert">
		</h3>
		</td>
		<td colspan='4' width='15'></td>
	</tr>
	<tr>
		<td colspan='12'height='10'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
    	<td width='60'><div align='center'><h3>Kode Obat</h3></div></td>
		<td width='215'><div align='center'><h3>Nama Obat</h3></div></td>
		<td width='210'><div align='center'><h3>Kategori</h3></div></td>
		<td width='60'><div align='center'><h3>Harga @</h3></div></td>
		<td width='70'><div align='center'><h3>Qty Cetak</h3></div></td>
		<td width='40'><div align='center'><h3>Edit</h3></div></td>
		<td width='15'></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("select temp_barcode.*,barang.*,kategori.* from temp_barcode,barang,kategori where
						temp_barcode.bid=barang.bid and barang.kid=kategori.kid order by tbid");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
    	<td width='30'><div align='right'>	<?php print $no ?></div></td>
		<td width='60'><div align='right'>	<?php print $row['bcode']?></div></td>
		<td width='215'><div align='left'>	<?php print $row['bnama']?></div></td>
		<td width='210'><div align='center'><?php print $row['knama']?></div></td>
		<td width='60'> <div align='center'><?php print $row['bjual']?></div></td>
		<td width='70'> <div align='center'><?php print $row['tbqty']?></div></td>
<?php
		print "<td width='16' align='center'><a href='./?n=barcode_e&&edit=$row[tbid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[bnama] ?'); if (ok) return true; else return false\" href=./?n=barcode_e&&hapus=$row[tbid]><img src='./misc/delete.gif'></a></td>";
?>
			
		</tr>
<?php
		}
?>
		
		</table>
		<input name='pbbayarn2' type='hidden' value="<?php print $total ?>">
		</div>
	</form>
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