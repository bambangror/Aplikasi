<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
	if (isset($_POST['save'])){
		if ((empty($_POST['uname'])) || (empty($_POST['rid']))) {		
		$mssg='User gagal ditamba!';
?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
	}
	else{
		$upasswd=MD5($_POST['uname']);
		$q_usave = mysql_query("INSERT INTO users (uname,name,rid,upasswd)VALUES('$_POST[uname]','$_POST[name]','$_POST[rid]','$upasswd');");	
		$mssg='User baru disimpan! ';;
	?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
		}
	} else if (isset($_POST['cancel']))	{
		$mssg='Tambah user dibatalkan! ';
?>
		<script language="javascript">
 			TO_USER_A();
		</script>
<?php
	}
?>
<form Aksi='?n=user_add' method=POST>
<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
	<tr>
		<td colspan='5' height='20'><div align='center'><h3><?php print isset($mssg) ? $mssg : null ?></h3></div></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td width='10'></td>
		<td width='90'><h3>Username</h3></td>
		<td width='3'>:</td>
		<td width='160'><input type="text" 	 name="uname" id="iduname" size=35 maxlength=15 tabindex=1 value=""></h3></td>
		<td width='520'></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr>
		<td></td>
		<td><h3>Nama</h3></td>
		<td>:</td>
		<td><input type="text" 	 name="name" id="idname" size=35 maxlength=15 tabindex=2 value=""></h3></td>
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='2'></td>
	</tr>
	<tr bgcolor="#F8F8F8">
		<td></td>
		<td><h3>Status User</h3></td>
		<td>:</td>
	<td><h3><select name="rid" tabindex=3>
				<option selected value=""> - </option>
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
		<td></td>
	</tr>
	<tr>
		<td colspan='5' height='10'></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=4>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=5>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
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