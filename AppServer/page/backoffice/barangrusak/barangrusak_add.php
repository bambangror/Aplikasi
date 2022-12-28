<div id="main-content">
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){

	$q_save = mysql_query("UPDATE barang_rusak SET braktif='0' WHERE braktif=1");
?>
		<script language="javascript">
 			setTimeout('self.location.href ="?n=barangrusak"',1);
		</script>
<?php
	}
?>
</div>