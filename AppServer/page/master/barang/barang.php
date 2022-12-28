<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
	if ((isset($_POST['knama'])) || (isset($_POST['bnama'])) || (isset($_POST['bcode']))){
		$keywords	=$_POST['knama'];
		$keywords2	=$_POST['bnama'];
		$keywords3	=$_POST['bcode'];
	} 
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10' width='720' ><div align='center'><h3>Data Obat</h3></div></td>
		<td><a href="?n=barang_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Tambah&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='10'></td>
	</tr>
	<tr>
		<td colspan='12' height='4'></td>
	</tr>
	<form name='barang' Aksi='?n=barang' method='POST'>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Kode Obat</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="bcode" size=25 maxlength=25 tabindex=2 value="<?php print isset($bid)?$bid:null; ?>"></h3></td>
		<td width='100'></td>
		<td width='80'><h3>Kategori</h3></td>
		<td width='3'>:</td>
		<td width='260'><h3><select name="knama">
				<option selected value=""></option>
<?php
				$q_stock=mysql_query("select * from kategori order by kid");		  
				if (mysql_num_rows($q_stock)>0) {
					while ($row=mysql_fetch_array($q_stock)){
						print '<option value="'.$row['knama'].'">'.$row['knama'].'</option>';
					}
				}
?>
		</select></h3>
		</td>
		<td colspan='4' width='15'></td>
	</tr>
	<tr>
		<td colspan='12' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama Obat</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="bnama" size=25 maxlength=25 tabindex=2 value="<?php print isset($bid)?$bid:null; ?>"></h3></td>
		<td></td>
		<td width='80'></td>
		<td width='3'></td>
		<td width='260'><h3>
		<input type="submit" name="tombol" value="Cari">
		</h3>
		</td>
		<td colspan='4' width='15'></td>
	</tr>
	</form>
	<tr>
		<td colspan='12' height='2'></td>
	</tr>
	<tr>
		<td colspan='12'height='10'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td rowspan=2 width='30'><div align='center'><h3>NO.</h3></div></td>
    	<td rowspan=2 width='60' align='center'><h3>Kode Obat</h3></td>
		<td rowspan=2 width='170' align='center'><h3>Nama Obat</h3></td>
		<td rowspan=2 width='70'align='center'><h3>Produsen</h3></td>
		<td colspan=3 align='center'><h3>Satuan</h3></td>
		<td rowspan=2 width='140' align='center'><h3>Kategori</h3></td>
		<td colspan=2 align='center'><h3>Harga @</h3></td>
		<td rowspan=2 width='70'><div align='center'><h3>Barcode</h3></div></td>
		<td rowspan=2 width='32'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		<tr height="25px" bgcolor="#000">
		<td width='50'><div align='center'><h3>Beli</h3></div></td>
		<td width='30'><div align='center'><h3>Isi</h3></div></td>
		<td width='50'><div align='center'><h3>Jual</h3></div></td>
		<td width='45'><div align='center'><h3>Beli</h3></div></td>
		<td width='45'><div align='center'><h3>Jual</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
        $keywords = isset($keywords)?$keywords:null;
		$keywords2 = isset($keywords2)?$keywords2:null;
		$keywords3 = isset($keywords3)?$keywords3:null;
		
		$q_barang=mysql_query("select b.*, pr.*,pbsa.*,pjsa.*,k.* from barang b,produsen pr, pbsatuan pbsa,pjsatuan pjsa, 
							kategori k where b.prid=pr.prid and b.pbsid=pbsa.pbsid and b.pjsid=pjsa.pjsid and 
							b.kid=k.kid and k.knama LIKE '%$keywords%' and b.bnama LIKE '%$keywords2%' 
							and b.bcode LIKE '%$keywords3%' order by b.bid");		  
		print "<table class='main' cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($q_br=mysql_fetch_array($q_barang)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
    	<td width='60'><div align='right'>	<?php print $q_br['bcode']?></div></td>
		<td width='170'><div align='left'>	<?php print $q_br['bnama']?></div></td>
		<td width='70'><div align='left'> 	<?php print $q_br['prnama']?></div></td>
		<td width='50'><div align='center'><?php print $q_br['pbsnama']?></div></td>
		<td width='30'><div align='center'><?php print $q_br['bisi']?></div></td>
		<td width='50'> <div align='center'>	<?php print $q_br['pjsnama']?></div></td>
		<td width='140'> <div align='center'><?php print $q_br['knama']?></div></td>
		<td width='45'><div align='center'><?php print number_format($q_br['bbeli'])?></div></td>
		<td width='45'> <div align='center'>	<?php print number_format($q_br['bjual'])?></div></td>
		<td width='70' align='right'>	<?php print $q_br['barcode']?> </td>
		<?php
		print "<td width='16' align='center'><a href='./?n=barang_e&&edit=$q_br[bid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $q_br[bnama] ?'); if (ok) return true; else return false\" href=./?n=barang_e&&hapus=$q_br[bid]><img src='./misc/delete.gif'></a></td>"; ?>
		</tr>
<?php
		}
?>
		</table>
		</div>
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