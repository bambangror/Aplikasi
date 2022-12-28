<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
	if (isset($_POST['jmlstock'])){
		$keywords1	=isset($_POST['stock'])?$_POST['stock']:null;
		$keywords2	=isset($_POST['jmlstock'])?$_POST['jmlstock']:null;		
		$keywords='bstock'.$keywords1.$keywords2;
	} else {$keywords='bstock>=0';}
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='8' height='10'><div align='center'><h3>Data Stock</h3></div></td>
		<td></td>
		<td width='70'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='10'></td>
	</tr>
	<tr>
		<td colspan='12' height='4'></td>
	</tr>
	<form name='stock' Aksi='?n=stock' method='POST'>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Stock</h3></td>
		<td width='3'>:</td>
		<td width='260'><h3>
			<select name="stock">
							<option name="=" selected>=</option>
							<option name=">">></option>
							<option name="<"><</option>
			</select><input type="text" name="jmlstock"></h3>
		</td>
		<td width='100'><input type="submit" name="tombol" value="Cari"></td>
		<td width='80'></td>
		<td width='3'></td>
		<td width='260'></td>
		<td colspan='4' width='140'></td>
	</tr>
	</form>
	<tr>
		<td colspan='12'height='10'></td>
	</tr>
	</table>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
    	<td width='80' align='center'><h3>Kode Obat</h3></td>
		<td width='170' align='center'><h3>Nama Obat</h3></td>
		<td width='70' align='center'><h3>Produsen</h3></td>
		<td width='160' align='center'><h3>Kategori</h3></td>
		<td width='60' align='center'><h3>Stock</h3></td>
		<td width='60'><div align='center'><h3>Satuan</h3></div></td>
		<td width='16'><div align='center'><h3>Edit</h3></div></td>
		<td width='15'></td>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$q_barang=mysql_query("select b.*, pr.*,pbsa.*,pjsa.*,k.* from barang b,produsen pr, pbsatuan pbsa,pjsatuan pjsa, 
							kategori k where b.prid=pr.prid and b.pbsid=pbsa.pbsid and b.pjsid=pjsa.pjsid and $keywords and  
							b.kid=k.kid order by b.bid");		  
		print "<table class='main' cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($q_br=mysql_fetch_array($q_barang)){
		$no++
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
    	<td width='80' align='right'>	<?php print $q_br['bcode']?></td>
		<td width='170' align='left'>	<?php print $q_br['bnama']?></td>
		<td width='70' align='center'> 	<?php print $q_br['prnama']?></td>
		<td width='160' align='center'><?php print $q_br['knama']?></td>
		<td width='60' align='center'><?php print $q_br['bstock']?></td>
		<td width='60' align='center'>	<?php print $q_br['pjsnama']?> </td>
<?php
		print "<td width='16' align='center'><a href='./?n=stock_e&&edit=$q_br[bid]'><img src='./misc/edit.gif'></a></td>";
?>
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