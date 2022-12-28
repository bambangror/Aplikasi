<style type="text/css">
#main-contentc td{
font: 10px/0% tahoma;
}
</style>
<div id="main-contentc">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
?>
<script type="text/javascript">
if (window.print) {
document.write();
}
function Move() {
 setTimeout('self.location.href ="?n=laplabapenjualan"',1);
 }
</script>
<?php
if ($_SESSION['tglakhir']<>''){ ?>
<script type="text/javascript">
setTimeout('window.print()', 1000);
setTimeout('Move()', 1000);
</script>
<?php
$tglawal =$_SESSION['tglawal'];
$tglakhir =$_SESSION['tglakhir'];

?>
<div align="center">
 <h2>Laporan Laba Penjualan<br><h3>Periode : <?php echo tgl_indo($tglawal); ?> s.d <?php echo tgl_indo($tglakhir); ?></h3></h2><br>
<table cellpadding=0 cellspacing=0>
<tr height="15px">
<td width='25' align='center' style="border:solid 1px #999;color:#000"><h3>No.</h3></td>
<td width='120' align='center' style="border:solid 1px #999;color:#000"><h3>Tanggal</h3></td>
 <td width='100' align='center' style="border:solid 1px #999;color:#000"><h3>No. Nota</h3></td>
<td width='35' align='center' style="border:solid 1px #999;color:#000"><h3>Qty</h3></td>
<td width='100'align='center' style="border:solid 1px #999;color:#000"><h3>H-Beli</h3></td>
<td width='100' align='center' style="border:solid 1px #999;color:#000"><h3>H-Jual</h3></td>
<td width='100' align='center' style="border:solid 1px #999;color:#000"><h3>Laba</h3></td>
</tr>
<?php
$qry=mysql_query("select pjtransaksi.*,penjualan.pjtgl,barang.* from pjtransaksi,penjualan,barang WHERE 
pjtransaksi.pjid=penjualan.pjid AND pjtransaksi.bid=barang.bid AND 
penjualan.pjtgl>='$tglawal' and penjualan.pjtgl<='$tglakhir'
ORDER BY penjualan.pjtgl");
$no=0;
$totlaba = 0;
   while ($row=mysql_fetch_array($qry)){
     $no++
?>
	<tr height="15px">
	<td width='25' style="border:solid 1px #999;color:#000" align='left'><?php print $no ?></td>
	<td width='120' style="border:solid 1px #999;color:#000" align='left'><?php print tgl_indo($row['pjtgl']); ?></td>
	 <td width='100' style="border:solid 1px #999;color:#000" align='center'><?php print $row['pjid']?></td>
	<td width='35' style="border:solid 1px #999;color:#000" align='right'><?php print $row['pjtqty']?></td>
	<td width='100' style="border:solid 1px #999;color:#000" align='right'> <?php print number_format($row['bbeli']*$row['pjtqty'])?></td>
	<td width='100' style="border:solid 1px #999;color:#000" align='right'><?php print number_format($row['bjual']*$row['pjtqty'])?></td>
	<td width='100' style="border:solid 1px #999;color:#000" align='right'> <?php print number_format(($row['bjual']*$row['pjtqty'])-($row['bbeli']*$row['pjtqty']))?></td>
	</tr>
<?php
    $totlaba += (($row['bjual']*$row['pjtqty'])-($row['bbeli']*$row['pjtqty']));
   }
?>
   <tr height="15px">
      <td width='480' style="border:solid 1px #999;color:#000" align='right' colspan='6'>Total : </td>
	  <td width='100' style="border:solid 1px #999;color:#000" align='right'><?php print number_format($totlaba); ?></td>
   </tr>
</table>
</div>
<?php
unset($_SESSION['tglawal']);
unset($_SESSION['tglakhir']);
}
else { ?>
<script type="text/javascript">
setTimeout('self.location.href ="?n=laplabapenjualan"',1);
</script>
<?php }
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