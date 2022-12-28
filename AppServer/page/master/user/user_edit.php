<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_GET['edit']) || (isset($_POST['save'])) || (isset($_POST['cancel'])) || (isset($_POST['preset']))){
	$uid=isset($_GET['edit'])?$_GET['edit']:null;
	$q_euser=mysql_query("SELECT users.*,roles.rid,roles.rname FROM users, roles WHERE users.rid=roles.rid and users.uid='$uid'");	
	$q_eu=mysql_fetch_array($q_euser);
	
	if (isset($_POST['save'])){
		if ((!isset($_POST['uname'])) || (!isset($_POST['rid']))) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
	}
	else{
		$q_upusers=mysql_query("UPDATE users SET uname='$_POST[uname]',name='$_POST[name]',rid='$_POST[rid]' WHERE uid='$_POST[uid]'");	
		$mssg='Perubahan disimpan! ';;
	?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Perubahan dibatalkan! ';
?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
	} else if (isset($_POST['preset']))	{
		$upasswd=MD5($_POST['uname']);
		$q_upusers=mysql_query("UPDATE users SET upasswd='$upasswd' WHERE uid='$_POST[uid]'");	
		$mssg='Password sama dengan username! ';
?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
	}
?>
<form Aksi='?n=user_e' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Username</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="uname" id="iduname" size=35 maxlength=15 tabindex=1 value="<?php print ($q_eu['uname']) ?>"></h3></td>
		<td width='510'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="name" id="idname" size=35 maxlength=15 tabindex=2 value="<?php print($q_eu['name']) ?>"></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Password</h3></td>
		<td>:</td>
		<td><button name="preset" style="border: 1px solid #666; background-color:#fff" tabindex=3 >&nbsp;Reset&nbsp;</button></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Status User</h3></td>
		<td>:</td>
	<td><h3><select name="rid" tabindex=4>
				<option selected value="<?php print $q_eu['rid'] ?>"><?php print $q_eu['rname'] ?></option>
<?php
				$q_role=mysql_query("select * from roles order by rid");		  
				if (mysql_num_rows($q_role)>0) {
					while ($row=mysql_fetch_array($q_role)){
						print '<option value="'.$row['rid'].'">'.$row['rname'].'</option>';
					}
				}
?>
		</select></h3>
		</td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=5>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
		<td><input name='uid' type='hidden' value="<?php print $uid ?>"></td>
	</tr>
	<tr>
		<td colspan='5'height='10'></td>
	</tr>
</table>
</form>
<?php
} else if (isset($_GET['hapus'])) {
	$uid=isset($_GET['hapus'])?$_GET['hapus']:null;
	$q_dsystem=mysql_query("delete from users where uid='$uid'");	
	$mssg='Hapus data berhasil! ';
	echo "<div align='center'><b>";
	print isset($mssg) ? $mssg : null;
	echo "</b></div>";
?>
		<script language="javascript">
 			TO_USER_A();
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