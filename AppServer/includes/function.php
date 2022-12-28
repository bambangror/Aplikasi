<?php 
//--Sistem awal--
function S_SYS($ip,$sapp){
	//--
	$q_ssave = mysql_query ("INSERT INTO system (sip,sapp)VALUES('$ip','$sapp');" );
}

function CK_ORDER(){
	global $order;
	$ymd	=date("Y")."-".date("m")."-".date("d");
	//--AKHIR--
	$q_order=mysql_query("SELECT * FROM pembelian ORDER BY pbid DESC");
	if (mysql_num_rows($q_order)>0) {
		$q_order	= mysql_fetch_array($q_order) ;
		$order=substr($q_order['pbid'],8);
		$order=$order+1;
		
		if (strlen($order)==1){$order='000'.$order;} 
		else if(strlen($order)==2){$order='00'.$order;}
		else if(strlen($order)==3){$order='0'.$order;}
		else {$order=$order;}
		
		$order=date("y").date("m").date("d").$order;
	} 
	else{
		$order=date("y").date("m").date("d").'0001';
	}
}

function CEK_BTRANSAKSI($bcode){
	$q_bcode = mysql_query("SELECT * FROM barang where barcode='$bcode' ORDER BY barcode") ;
	if (mysql_num_rows($q_bcode)>0) {
		$q_bcode =mysql_fetch_array($q_bcode) ;
		$bid	 =$q_bcode['bid'];
		CK_ORDER();
		TRANSAKSI($bid);
?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
	else {
?>
		<script language="javascript">
			alert("Barcode item kosong!");
			TO_PEMBELIAN_A();
		</script>
<?php
	}
}

function TRANSAKSI($bid){
	global $order;
	//--NO Transaksi--
	$q_NOtr	= mysql_query("SELECT * FROM pbtransaksi where pbtaktif=1 ORDER BY pbtno DESC") ;
	if (mysql_num_rows($q_NOtr)>0) {
		$qno	=mysql_fetch_array($q_NOtr) ;
		$pbtno	=$qno['pbtno']+1;
		if (strlen($pbtno)==1){
			$tno='0'.$pbtno;
		}
		else {$tno=$pbtno;}
	} else {$tno='01';$pbtno=1;}
	//--CEK HARAG JUAL--
	$q_barang	= mysql_query("SELECT * FROM barang where bid='$bid'");
	$bbeli		=mysql_fetch_array($q_barang) ;
	$pbtbeli	=$bbeli['bbeli'];
	$isi		=$bbeli['bisi'];
	//--INPUT--
	$q_in= mysql_query ("INSERT INTO pbtransaksi (pbtid,pbid,bid,pbtbeli,pbtdiskon,pbtqty,pbtno)
							VALUES('$order$tno','$order','$bid','$pbtbeli','0%','1','$pbtno');"
							);
	//--Stock--
	$bstock=($bbeli['bstock']+(1*$isi));						
	$q_uptr=mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");	
}

function UPDATE_TRANSAKSI($bcode){
	$q_CekNOtr	= mysql_query("SELECT pbtransaksi.* ,barang.* FROM pbtransaksi,barang where pbtransaksi.bid=barang.bid and pbtaktif=1 ORDER BY pbtno DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;
		
		//--UPDATE--
		$diskon	=$q_NOtr['pbtdiskon'];		
		$diskon =str_replace('%', '',$diskon);
		$pbtbeli =(($q_NOtr['bbeli'])-(($diskon/100)*($q_NOtr['bbeli'])))*$bcode;
		$pbtrpdiskon=(($diskon/100)*($q_NOtr['bbeli']))*$bcode;
		//--
		$q_update = mysql_query("UPDATE pbtransaksi SET pbtrpdiskon='$pbtrpdiskon',pbtqty='$bcode', pbtbeli='$pbtbeli' WHERE pbtaktif=1 and pbtno='$q_NOtr[pbtno]'");
		//--UPStock--
		$bid		=$q_NOtr['bid'];
		$isi		=$q_NOtr['bisi'];
		$bstock		=($q_NOtr['bstock']+($bcode*$isi)-($q_NOtr['pbtqty']*$isi));
		$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");
		
?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
}

function UPDATE_DIS($bcode){
	global $sid;
	$q_CekNOtr	= mysql_query("SELECT pbtransaksi.*,barang.* FROM pbtransaksi,barang
				where pbtransaksi.bid=barang.bid and pbtaktif=1 ORDER BY pbtno DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;
		
		//--UPDATE--
		$qty 	=$q_NOtr['pbtqty'];				
		$pbtbeli=(($q_NOtr['bbeli'])-(($bcode/100)*($q_NOtr['bbeli'])))*$qty;
		$pbtrpdiskon=(($bcode/100)*($q_NOtr['bbeli']))*$qty;
		
		$q_update = mysql_query("UPDATE pbtransaksi SET pbtdiskon='$bcode%',pbtrpdiskon='$pbtrpdiskon',pbtbeli='$pbtbeli' WHERE pbtaktif=1 and pbtid='$q_NOtr[pbtid]'");
		?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
}

function HAPUS_ITTRANSAKSI(){
	$q_CekNOtr	= mysql_query("SELECT pbtransaksi.* ,barang.* FROM pbtransaksi,barang where pbtransaksi.bid=barang.bid and pbtaktif=1 ORDER BY pbtno DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;	
		//--HAPUS--
		$q_hapus= mysql_query("DELETE FROM pbtransaksi where pbtaktif=1 and pbtno='$q_NOtr[pbtno]'");
		
		//--UPStock--
		$bid		=$q_NOtr['bid'];
		$isi		=$q_NOtr['bisi'];
		$bstock		=($q_NOtr['bstock']-($q_NOtr['pbtqty']*$isi));
		$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");
?>
		<script language="javascript">
 			TO_PEMBELIAN_A();
		</script>
<?php
	}
}

function TOTAL_TR(){
	global $sid,$item,$disc,$total;
	$q_total=mysql_query("SELECT sum(pbtbeli) as pbtbeli,sum(pbtrpdiskon) as pbtrpdiskon FROM pbtransaksi where pbtaktif=1") ;
	$q_total= mysql_fetch_array($q_total) ;
	$total=$q_total['pbtbeli'];
	$disc=$q_total['pbtrpdiskon'];
	//$item=$q_total['pjtid'];
	if ($q_total['pbtbeli']==0){$total=0;}
}

function SAVE_TR(){
	$q_upsave = mysql_query("UPDATE pbtransaksi SET pbtno='',pbtaktif='0' WHERE pbtaktif =1");
}

function ID_SUPPLIER(){
	global $spid;
	$ymd	=date("Y")."-".date("m")."-".date("d");
	$qry=mysql_query("SELECT spid FROM supplier ORDER BY spid DESC");
	if (mysql_num_rows($qry)>0) {
		$row	= mysql_fetch_array($qry) ;
		$spid=substr($row['spid'],6);
		$spid=$spid+1;
		
		if (strlen($spid)==1){$spid='0'.$spid;} 
		else {$spid=$spid;}
		
		$spid=date("y").date("m").date("d").$spid;
	} 
	else{
		$spid=date("y").date("m").date("d").'01';
	}
}

function ID_CUSTOMOR(){
	global $cid;
	$ymd	=date("Y")."-".date("m")."-".date("d");
	$qry=mysql_query("SELECT cid FROM customer ORDER BY cid DESC");
	if (mysql_num_rows($qry)>0) {
		$row	= mysql_fetch_array($qry) ;
		$cid=substr($row['cid'],6);
		$cid=$cid+1;
		
		if (strlen($cid)==1){$cid='000'.$cid;} 
		else if(strlen($cid)==2){$cid='00'.$cid;}
		else if(strlen($cid)==3){$cid='0'.$cid;}
		else {$cid=$cid;}
		
		$cid=date("y").date("m").date("d").$cid;
	} 
	else{
		$cid=date("y").date("m").date("d").'0001';
	}
}

function CEK_BTRANSAKSI_R($bcode){
	$q_bcode = mysql_query("SELECT * FROM barang where barcode='$bcode' ORDER BY barcode") ;
	if (mysql_num_rows($q_bcode)>0) {
		$q_bcode =mysql_fetch_array($q_bcode) ;
		$bid	 =$q_bcode['bid'];
		TRANSAKSI_R($bid)
?>
		<script language="javascript">
 			TO_BARANGRUSAK_A();
		</script>
<?php
	}
	else {
?>
		<script language="javascript">
			alert("Barcode item kosong!");
			TO_BARANGRUSAK_A();
		</script>
<?php
	}
}

function TRANSAKSI_R($bid){
	$ymd	=date("Y")."-".date("m")."-".date("d");
	//--CEK HARAG JUAL--
	$q_barang	= mysql_query("SELECT * FROM barang where bid='$bid'");
	$bbeli		=mysql_fetch_array($q_barang) ;
	$pbtbeli	=$bbeli['bbeli'];
	$isi		=$bbeli['bisi'];
	//--INPUT--
	$q_in= mysql_query ("INSERT INTO barang_rusak (bid,brtgl_dicatat,brqty,brket)
							VALUES('$bid','$ymd','0','-');"
							);
}

function UPDATE_TRANSAKSI_R($bcode){
	$q_CekNOtr	= mysql_query("SELECT barang_rusak.*,barang.* FROM barang_rusak,barang where barang_rusak.bid=barang.bid and braktif=1 ORDER BY brid DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;
		
		//--UPDATE--
		$q_update = mysql_query("UPDATE barang_rusak SET brqty='$bcode' WHERE braktif=1 and brid='$q_NOtr[brid]'");
		//--UPStock--
		$bid		=$q_NOtr['bid'];
		$bstock		=$q_NOtr['bstock']-$bcode+$q_NOtr['brqty'];		
		$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");		
?>
		<script language="javascript">
 			TO_BARANGRUSAK_A();
		</script>
<?php
	}
}

function HAPUS_ITTRANSAKSI_R(){
	$q_CekNOtr	= mysql_query("SELECT barang_rusak.* ,barang.* FROM barang_rusak,barang where barang_rusak.bid=barang.bid and braktif=1 ORDER BY brid DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;	
		//--HAPUS--
		$q_hapus= mysql_query("DELETE FROM barang_rusak where braktif=1 and brid='$q_NOtr[brid]'");
		
		//--UPStock--
		$bid		=$q_NOtr['bid'];
		$bstock		=($q_NOtr['bstock']+$q_NOtr['brqty']);
		$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");
?>
		<script language="javascript">
 			TO_BARANGRUSAK_A();
		</script>
<?php
	}
}

function RESTORE_DB($fname){
	if (file_exists('./page/backoffice/restore/'.$fname)) {	
	$filename ='./page/backoffice/restore/'.$fname;
	$mysql_host = 'localhost';
	$mysql_username = 'root';
	$mysql_password = '';
	$mysql_database = 'dbapotik';

	mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
	mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
	$templine = '';
	$lines = file($filename);
	foreach ($lines as $line){
	if (substr($line, 0, 2) == '--' || $line == '')	continue;
	$templine .= $line;
		if (substr(trim($line), -1, 1) == ';'){
			mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			$templine = '';
		}
	}  
	$myFile ='./page/backoffice/restore/'.$fname;
	unlink($myFile);
?>
<script type="text/javascript">
        setTimeout('self.location.href ="index.php"',1000);
</script>
<?php	
	} else {
		echo "The file $filename does not exist";
	}
}

?>