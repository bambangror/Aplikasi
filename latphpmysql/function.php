<?php
	include 'koneksi.php';
	
	//--SAVE DATA--
	function FUNCTIONS_SAVE($bkode,$bnama,$bharga){
	$qry= mysql_query ("INSERT INTO barang (bkode,bnama,bharga)
							VALUES('$bkode','$bnama','$bharga');"
							);
	}
	
	//--SAVE UPDATE--
	function FUNCTIONS_UPDATE($bkode,$bnama,$bharga){	
		$qry = mysql_query("UPDATE barang SET bnama='$bnama',bharga='$bharga' WHERE bkode='$bkode'");
	}
	
	//--SAVE HAPUS--
	function FUNCTIONS_HAPUS($bkode){	
		$qry = mysql_query("delete from barang where bkode='$bkode'");
	}
?>