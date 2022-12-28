<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_POST['save'])){
		if ((empty($_POST['upasswd'])) && (empty($_POST['passnew']))) {	
		$mssg='Password baru masih kosong!';
?>
		<script language="javascript">
 			setTimeout('self.location.href ="?n=passwd",1000);
		</script>
<?php
		}
	else if ((($_POST['upasswd']))==(($_POST['passnew']))) {
		$passwd=MD5($_POST['upasswd']);
		$q_upsystem=mysql_query("UPDATE users SET upasswd='$passwd' WHERE uid='$_SESSION[uid]'");	
		$mssg='Perubahan disimpan! ';;
	?>
		<script language="javascript">
 			TO_INDEX();
		</script>
<?php
	} 
	else {
		$mssg='Password baru tidak sama!';
?>
		<script language="javascript">
 			setTimeout('self.location.href ="?n=passwd",1000);
		</script>
<?php
}		
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan dibatalkan! ';
?>
		<script language="javascript">
 			TO_INDEX();
		</script>
<?php
	}
?>
<form Aksi='?n=passwd' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='160'><h3>Password Baru</h3></td>
		<td width='3'>:</td>
		<td width='510'><input type="password" 	 name="passnew" id="idip" size=25 maxlength=25 tabindex=1 value=''></h3></td>
		<td width='195'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr  bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Konfirmasi Password</h3></td>
		<td>:</td>
		<td><input type="password" 	 name="upasswd" id="idkassa" size=25 maxlength=25 tabindex=2 value=''></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
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