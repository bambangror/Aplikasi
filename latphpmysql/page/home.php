		<table class='main' cellpadding=0 cellspacing=0 border=1 style="color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='100' align='center'><b>Kode</b></td>
		<td width='300' align='center'><b>Nama</b></td>
    	<td width='100' align='center'><b>Harga</b></td>
		</tr>
		</table>
<?php
		$qry=mysql_query("select * from barang");			
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		while ($row=mysql_fetch_array($qry)){
?>
		<tr height="25px" cellpadding=0 cellspacing=0 bgcolor="#F8F8F8" border="1px" style="border:solid 1PX #000">
		<td width='100' align='right'>	<?php print $row['bkode']?></td>
    	<td width='300' align='left'>	<?php print $row['bnama']?></td>
		<td width='100' align='center'>	<?php print number_format($row['bharga'])?></td>
		</tr>
<?php
		}
?>
		</table>