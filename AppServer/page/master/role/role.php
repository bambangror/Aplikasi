<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
?>
	<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td height='10' width='720' ><div align='center'><h3>Role Admin</h3></div></td>
		<td><a href="?n=role_add" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Tambah&nbsp;&nbsp;&nbsp;</button></a></td>
		<td width='4'></td>
		<td><a href="index.php" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;&nbsp;Close&nbsp;&nbsp;&nbsp;</button></a></td>
	</tr>
	<tr>
		<td colspan='8' height='4'></td>
	</tr>
	</table>
<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='115'><div align='center'><h3>Role</h3></div></td>
		<td width='42'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$q_user=mysql_query("SELECT roles.* FROM roles order by rid");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($q_us=mysql_fetch_array($q_user)){
		$no++		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#F8F8F8';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='115'><div align='left'>	<?php print $q_us['rname']?></div></td>
		<?php
		print "<td width='16' align='center'><a href='./?n=role_e&&edit=$q_us[rid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $q_us[rname] ?'); if (ok) return true; else return false\" href=./?n=role_e&&hapus=$q_us[rid]><img src='./misc/delete.gif'></a></td>"; ?>
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