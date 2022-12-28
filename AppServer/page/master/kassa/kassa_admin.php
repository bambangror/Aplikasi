<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td height='10' width='790' ><div align='center'><h3>Kassa</h3></div></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
	</tr>
	<tr>
		<td height='4'></td>
	</tr>
	</table>
<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
    	<td width='75'><div align='center'><h3>IP Address</h3></div></td>
		<td width='115'><div align='center'><h3>Kassa</h3></div></td>
		<td width='50'><div align='center'><h3>Status</h3></div></td>
		<td width='380'><div align='center'><h3>Alamat</h3></div></td>
		<td width='42'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$q_ssystem=mysql_query("SELECT * FROM system");		
		print "<table class='main' cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($q_ss=mysql_fetch_array($q_ssystem)){
		$no++
		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
    	<td width='75'align='right'>	<?php print $q_ss['sip']?></td>
		<td width='115' align='left'>	<?php print $q_ss['sapp'].' '.$q_ss['sno']?></td>
		<?php 
		print "<td width='50' align='center'>";
		if ($q_ss['sok']==0) {print 'OFF';} else print 'ON';
		print "</td>";
		print "<td width='380' align='left'> $q_ss[salamat] </td>";
		print "<td width='16' align='center'><a href='./?n=kassa_e&&edit=$q_ss[s_id]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $q_ss[sip] ?'); if (ok) return true; else return false\" href=./?n=kassa_e&&hapus=$q_ss[s_id]><img src='./misc/delete.gif'></a></td>"; ?>
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