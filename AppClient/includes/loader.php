<?php
    //$x = isset($_GET['n']) ? $_GET['n'] : null;
	switch(strtolower(isset($_GET['n']) ? $_GET['n'] : ''))  {
	case 'out'	:
		$title='Logout';
		$page ='./page/user/logout.php';break;
	case 'stock' :
		$title='Stock';
		$page='./page/stock/stock.php';break;
	case 'hitung' :
		$title='Bayar';
		$page='./page/hitung/hitung.php';break;
	case 'rekap' :
		$title='Rekap';
		$page='./page/rekap/rekap.php';break;
	case 'clr' :
		$title='Wait..';
		$page='./page/main/clrtransaksi.php';break;
	default 		: 
	    $title='-';
		$page =$page_default;break;
	}
	
	$default=' :: Sistem Informasi Apotek';
	$head_title = isset($_GET['n']) ? (' :: Kasir '.ucwords($title)) : $default;
?>
