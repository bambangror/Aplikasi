<div class="space"></div>
<div id="fUser">
<?php
if(isset($_POST['submit'])){
	if (empty($_POST['username']) || empty($_POST['password'])){
		$message="Nama Pengguna atau Password Kosong!";
	?>
	<script type="text/javascript">
		TO_INDEX();
	</script>
	<?php
	}
	else {
	$passwd=MD5($_POST['password']);
	$q_user=mysql_query("SELECT uid,rid,uname FROM users WHERE uname='$_POST[username]' and upasswd='$passwd'");	
	if (mysql_num_rows($q_user)==1) {
		$q_user=mysql_fetch_array($q_user);
		if ((($_POST['username']) 	==$q_user['uname']) && ($q_user['rid']==1)){
			$uid					=$q_user['uid'];
			//--
			$_SESSION['uid'] 		=$q_user['uid'];
			$_SESSION['rid'] 		=$q_user['rid'];
			$_SESSION['uname'] 		=$_POST['username'];
			$_SESSION['loggedin'] 	=1;
			//--
			$momodal				=isset($_POST['modal'])?$_POST['modal']:null;
			//CK_MODAL();
			//SAVE_MODAL($uid);
			$message="Login Sukses!";
			?>
			<script type="text/javascript">
				TO_INDEX();
			</script>
			<?php
		} else {
			$message="Login Gagal!";
		?>
		<script type="text/javascript">
			TO_INDEX();
		</script>
		<?php		
		}
	} else {
		$message="Login Gagal!";
	?>
	<script type="text/javascript">
		TO_INDEX();
	</script>
	<?php
	}
	}
}
?>
<form Aksi='index.php' method=POST>
<table width="340" border="0" cellpadding="0" cellspacing="0">
	<tr><td rowspan="9"><img src="misc/uLog.png" width="136" height="130" /></td></tr>
	<tr><td colspan='2' class="top"><center><b><h3>	
		<?php
		if(isset($message)){ print $message;}else { print "Admin Login";}
	?></h3></b></center></td>
	</tr>
	<tr><td colspan='2' height='4'></td></tr>
	<tr>
		<td colspan="1">&nbsp;User name&nbsp;</td>
		<td><input type="text" name="username" id="idusername" tabindex=1 size=12 maxlength=20 ></td>
	</tr>
	<tr>
		<td colspan="1">&nbsp;Password </td>
		<td><input type="password" name="password" id="idpassword" tabindex=2 size=12 maxlength=20 ></td>
	</tr>
	<tr><td colspan='2'height='4'></td></tr>
	<tr>
		<td colspan='1'height="20"></td>
		<td><button name="submit" style="border: 1px solid #666; background-color:#fff">&nbsp;&nbsp;Login&nbsp;&nbsp;</button></td>
	</tr>
	<tr><td colspan='2'height='10'></td></tr>
</table>
</form>
</div>
<script type="text/javascript">
	setUR_focus();
	IN_INT();
</script>