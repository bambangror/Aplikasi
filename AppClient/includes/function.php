<?php 
//--Sistem awal--
function S_SYS($ip,$sapp){
	//--
	$q_ssave = mysql_query ("INSERT INTO system (sip,sapp)VALUES('$ip','$sapp');" );
}

function CK_MODAL(){
	global $sid,$moid,$modalS;
	//--
	$q_modal=mysql_query("SELECT * FROM modal where s_id='$sid' ORDER BY moid DESC");
	if (mysql_num_rows($q_modal)>0) {
		$q_modal=mysql_fetch_array($q_modal) ;
		$modalS  =($q_modal['momodal']);
		$c_mid	=substr($q_modal['moid'],0,4);
		$moid	=substr($q_modal['moid'],6);
	
		if ($c_mid==date("y").date("m")) {$moid=$moid+1;} 
		else{$moid='001';}
	
		if (strlen($moid)==1){$moid='00'.$moid;} 
		else if(strlen($moid)==2){$moid='0'.$moid;}
		else{$moid=$moid;}
		$moid=date("y").date("m").$sid.$moid;}
	else {
		$moid=date("y").date("m").$sid.'001';
	}
} 

function SAVE_MODAL($uid){
	global $moid,$sid,$momodal;
	$ymd	=date("Y")."-".date("m")."-".date("d");
	//--AWAL--
	$qry=mysql_query("SELECT * FROM modal where modate='$ymd' and s_id='$sid' ORDER BY moid DESC");
	if (mysql_num_rows($qry)>0) {
		$q_update = mysql_query("UPDATE modal SET momodal='$momodal' WHERE modate='$ymd' and s_id='$sid'");
	} else {	
		$q_modal= mysql_query ("INSERT INTO modal (moid,modate, momodal, uid, s_id) 
							VALUES ('$moid',now(),'$momodal','$uid','$sid');"
							);
	}
}

function CK_ORDER(){
	global $sid,$order,$orderSR,$orderST,$JumlahTR,$TBayar;
	$ymd	=date("Y")."-".date("m")."-".date("d");
	//--AWAL--
	$q_ordert=mysql_query("SELECT * FROM penjualan where pjtgl='$ymd' and s_id='$sid'ORDER BY pjid");
	if (mysql_num_rows($q_ordert)>0) {
		$q_ordert	= mysql_fetch_array($q_ordert) ;
		$orderSR=($q_ordert['pjid']);
	} 
	else{
		$orderSR=date("y").date("m").date("d").$sid.'0000';
	}
	//--AKHIR--
	$q_order=mysql_query("SELECT * FROM penjualan where pjtgl='$ymd' and s_id='$sid'ORDER BY pjid DESC");
	if (mysql_num_rows($q_order)>0) {
		$q_order	= mysql_fetch_array($q_order) ;
		$orderST=($q_order['pjid']);
		$order=substr($q_order['pjid'],8);
		$order=$order+1;
		
		if (strlen($order)==1){$order='000'.$order;} 
		else if(strlen($order)==2){$order='00'.$order;}
		else if(strlen($order)==3){$order='0'.$order;}
		else {$order=$order;}
		
		$order=date("y").date("m").date("d").$sid.$order;
	} 
	else{
		$order=date("y").date("m").date("d").$sid.'0001';
		$orderST=date("y").date("m").date("d").$sid.'0000';
	}
	//--Total Trnsaksi--
	$q_ttotal=mysql_query("SELECT sum(pjbayar) as pjbayar, count(pjid) as pjid FROM penjualan where pjtgl='$ymd' and s_id='$sid'ORDER BY pjid");
	if (mysql_num_rows($q_ttotal)>0) {
		$q_ttotal = mysql_fetch_array($q_ttotal) ;
		$JumlahTR =($q_ttotal['pjid']);
		$TBayar   =($q_ttotal['pjbayar']);
	}
	else {
		$JumlahTR=0;
	}
}

function TRANSAKSI($bid){
	global $sid,$order;
	//--NO Transaksi--
	$q_NOtr	= mysql_query("SELECT * FROM pjtransaksi where pjtaktif=1 and s_id='$sid' ORDER BY pjtno DESC") ;
	if (mysql_num_rows($q_NOtr)>0) {
		$qno	=mysql_fetch_array($q_NOtr) ;
		$pjtno	=$qno['pjtno']+1;
		if (strlen($pjtno)==1){
			$tno='0'.$pjtno;
		}
		else {$tno=$pjtno;}
	} else {$tno='01';$pjtno=1;}
	//--CEK HARAG JUAL--
	$q_bjual	= mysql_query("SELECT bjual,bstock FROM barang where bid='$bid'");
	$bjual		=mysql_fetch_array($q_bjual) ;
	$pjttotal	=$bjual['bjual'];
	
	if (($bjual['bstock'])<=0){	
?>
<script language="javascript">
			alert("Maaf Stock Barang Habis");
			TO_MAIN();
</script>

<?php
	} else {
	//--INPUT--
	$q_stock = mysql_query ("INSERT INTO pjtransaksi (pjtid,pjid, bid,pjtdiskon,pjttotal,pjtno,pjtaktif,s_id)
							VALUES('$order$tno','$order','$bid','0%','$pjttotal','$pjtno','1','$sid');"
							);
	//--UPStock--
	$bstock		=$bjual['bstock']-1 ;
	$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");
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
 			TO_MAIN();
		</script>
<?php
	}
	else {
?>
		<script language="javascript">
			alert("Barcode item kosong!");
 			TO_MAIN();
		</script>
<?php
	}
}

function UPDATE_TRANSAKSI($bcode){
	global $sid;
	$q_CekNOtr	= mysql_query("SELECT pjtransaksi.pjtid,pjtransaksi.pjtdiskon,pjtransaksi.pjtqty,barang.bid,barang.bjual,barang.bstock FROM pjtransaksi, barang 
				where pjtransaksi.bid=barang.bid and pjtaktif=1 and s_id='$sid' ORDER BY pjtno DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;
		//--UPDATE--
		$diskon	=$q_NOtr['pjtdiskon'];		
		$diskon =str_replace('%', '',$diskon);
		$pjttotal=(($q_NOtr['bjual'])-(($diskon/100)*($q_NOtr['bjual'])))*$bcode;
		$pjtrpdisk=(($diskon/100)*($q_NOtr['bjual']))*$bcode;
		
		if (($q_NOtr['bstock'])<=0){	
?>
<script language="javascript">
			alert("Maaf Stock Barang Habis123");
			TO_MAIN();
</script>
<?php
		}
		else {
		//--
		$q_update = mysql_query("UPDATE pjtransaksi SET pjtrpdisk='$pjtrpdisk',pjtqty='$bcode', pjttotal='$pjttotal' WHERE pjtaktif=1 and s_id='$sid' and pjtid='$q_NOtr[pjtid]'");
		//--UPStock--
		$bid		=$q_NOtr['bid'];
		$bstock		=$q_NOtr['bstock']-$bcode+$q_NOtr['pjtqty'];
		$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");
?>
		<script language="javascript">
 			TO_MAIN();
		</script>
<?php
		}
	}
}

function UPDATE_DIS($bcode){
	global $sid;
	$q_CekNOtr	= mysql_query("SELECT pjtransaksi.pjtid,pjtransaksi.pjtqty,barang.bjual FROM pjtransaksi,barang
				where pjtransaksi.bid=barang.bid and pjtaktif=1 and s_id='$sid' ORDER BY pjtno DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;
		
		//--UPDATE--
		$qty 	=$q_NOtr['pjtqty'];				
		$pjttotal=(($q_NOtr['bjual'])-(($bcode/100)*($q_NOtr['bjual'])))*$qty;
		$pjtrpdisk=(($bcode/100)*($q_NOtr['bjual']))*$qty;
		//--
		$q_update = mysql_query("UPDATE pjtransaksi SET pjtdiskon='$bcode%', pjtrpdisk='$pjtrpdisk',pjttotal='$pjttotal' WHERE pjtaktif=1 and s_id='$sid' and pjtid='$q_NOtr[pjtid]'");
?>
		<script language="javascript">
 			TO_MAIN();
		</script>
<?php
	}
}

function HAPUS_ITTRANSAKSI(){
	global $sid;
	$q_CekNOtr	= mysql_query("SELECT pjtransaksi.*,barang.bstock FROM pjtransaksi, barang where 
							pjtransaksi.bid=barang.bid and pjtaktif=1 and s_id='$sid' ORDER BY pjtno DESC");
	if (mysql_num_rows($q_CekNOtr)>0) {
		$q_NOtr = mysql_fetch_array($q_CekNOtr) ;	
	
		//--HAPUS--
		$q_hapus= mysql_query("DELETE FROM pjtransaksi where pjtaktif=1 and s_id='$sid' and pjtid='$q_NOtr[pjtid]'");
		//--UPStock--
		$bid		=$q_NOtr['bid'];
		$bstock		=$q_NOtr['bstock']+$q_NOtr['pjtqty'];
		$q_upstock  =mysql_query("UPDATE barang SET bstock='$bstock' WHERE bid='$bid'");

?>
		<script language="javascript">
 			TO_MAIN();
		</script>
<?php
	}
}

function TOTAL_TR(){
	global $sid,$item,$disc,$total;
	$q_total=mysql_query("SELECT sum(pjttotal) as pjttotal,sum(pjtrpdisk) as pjtrpdisk,count(pjtid) as pjtid 
						FROM pjtransaksi where pjtaktif=1 and s_id='$sid'") ;
	$q_total= mysql_fetch_array($q_total) ;
	$total=$q_total['pjttotal'];
	$disc=$q_total['pjtrpdisk'];
	$item=$q_total['pjtid'];
	if ($q_total['pjttotal']==0){$total=0;}
}

function SAVE_TR($uid){
	global $sid,$order,$disc,$total;
	//--
	$cid = isset($cid)?$cid:0;
	$q_save = mysql_query ("INSERT INTO penjualan (pjid,pjtgl,pjdiskon,cid,pjbayar,uid,s_id)
							VALUES('$order',now(),'$disc','$cid','$total','$uid','$sid');"
							);
	//--
	$q_upsave = mysql_query("UPDATE pjtransaksi SET pjtno='',pjtaktif='0' WHERE pjtaktif=1 and s_id='$sid'");
}

?>