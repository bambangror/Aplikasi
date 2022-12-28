<style type="text/css">
.m-content {
	float:none;
	padding:5px;
	height:80px;
}
.barcode{
	float:left;
	width:94px;
	height:110px;
	margin:5px 5px 0 5px;
}
</style>
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){
?>
<script type="text/javascript">
	if (window.print) {
		document.write();
	}
	function Move()  {
        setTimeout('self.location.href ="?n=barcode"',1);
    }
</script>
<div class="m-content">
	<?php
	if ($_SESSION['barcode']==1){ ?>
		<script type="text/javascript">
			setTimeout('window.print()', 1000);
			setTimeout('Move()', 1000);
		</script>
	<?php
		require_once 'bar128.php';	
		$qry=mysql_query("select temp_barcode.*,barang.*,kategori.* from temp_barcode,barang,kategori where
						temp_barcode.bid=barang.bid and barang.kid=kategori.kid order by tbqty desc");					
		while ($row=mysql_fetch_array($qry)){	
			$i=1;		
			while($i<=($row['tbqty'])){ ?>
				<div class="barcode">
         		<?php print bar128(stripslashes($row['bcode']),number_format($row['bjual'])); ?>
				</div>
				<?php
			$i++;
			}
			print "</br>";	
			$q_upbarang=mysql_query("UPDATE barang SET barcode='$row[bcode]' WHERE bid='$row[bid]'");
			$q_dbarang=mysql_query("delete from temp_barcode WHERE tbid='$row[tbid]'");				
		}
		unset($_SESSION['barcode']);
		}
		else { ?>
		<script type="text/javascript">
			setTimeout('self.location.href ="?n=barcode"',1);
		</script>	
	<?php }?>
</div>
<?php
} else {
?>
<script language="javascript">
	TO_OUT();
</script>	
<?php
}
?>
