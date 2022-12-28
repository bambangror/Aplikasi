<?php
    $x = isset($_GET['n']) ? $_GET['n'] : '';
	$title = '';
	switch(strtolower($x))  {
	case 'out'	: 		$title='Logout'; 			$page='./page/master/user/logout.php';break;
	case 'passwd' :		$title='Edit Passwd';		$page='./page/master/user/pass_edit.php';break;
	case 'user_a' :		$title='User'; 				$page='./page/master/user/user_admin.php';break;
	case 'user_add' : 	$title='User';				$page='./page/master/user/user_add.php';break;
	case 'user_e' :		$title='User';				$page='./page/master/user/user_edit.php';break;
	
	case 'role' :		$title='Role';				$page='./page/master/role/role.php';break;
	case 'role_add' :	$title='Role';				$page='./page/master/role/role_add.php';break;
	case 'role_e' :		$title='Role';				$page='./page/master/role/role_edit.php';break;
	
	case 'kassa_a' : 	$title='Edit Kassa';		$page='./page/master/kassa/kassa_admin.php';break;
	case 'kassa_e' : 	$title='Edit Kassa';		$page='./page/master/kassa/kassa_edit.php';break;

	case 'barang' :		$title='Stock Barang';		$page='./page/master/barang/barang.php';break;
	case 'barang_add' :	$title='Stock Barang';		$page='./page/master/barang/barang_add.php';break;
	case 'barang_e' :	$title='Stock Barang';		$page='./page/master/barang/barang_edit.php';break;
	
	case 'produsen' :	$title='Data Produsen';		$page='./page/master/produsen/produsen.php';break;
	case 'produsen_add' : $title='Data Produsen';	$page='./page/master/produsen/produsen_add.php';break;
	case 'produsen_e' :	$title='Data Produsen';		$page='./page/master/produsen/produsen_edit.php';break;
	
	case 'supplier' :	$title='Data Supplier';		$page='./page/master/supplier/supplier.php';break;
	case 'supplier_add' : $title='Data Supplier';	$page='./page/master/supplier/supplier_add.php';break;
	case 'supplier_e' :	$title='Data Supplier';		$page='./page/master/supplier/supplier_edit.php';break;
	
	case 'customer' :	$title='Data Customer';		$page='./page/master/customer/customer.php';break;
	case 'customer_add' : $title='Data Customer';	$page='./page/master/customer/customer_add.php';break;
	case 'customer_e' :	$title='Data Customer';		$page='./page/master/customer/customer_edit.php';break;
		
	case 'umum' :		$title='Data Umum';			$page='./page/master/umum/umum.php';break;
	case 'kategori_add' : $title='Katagori';		$page='./page/master/umum/kategori_add.php';break;
	case 'kategori_e' : $title='Katagori';			$page='./page/master/umum/kategori_edit.php';break;
	
	case 'satuanb_add' : $title='Satuan';			$page='./page/master/umum/satuanb_add.php';break;
	case 'satuanb_e' : 	$title='Satuan';			$page='./page/master/umum/satuanb_edit.php';break;
	
	case 'satuanj_add' : $title='Satuan';			$page='./page/master/umum/satuanj_add.php';break;
	case 'satuanj_e' : 	$title='Satuan';			$page='./page/master/umum/satuanj_edit.php';break;
	
	case 'pembelian' :	$title='Pembelian';			$page='./page/transaksi/pembelian/pembelian.php';break;
	case 'pembelian_add' :	$title='Pembelian';		$page='./page/transaksi/pembelian/pembelian_add.php';break;	
	case 'pembelian_e' :	$title='Pembelian';		$page='./page/transaksi/pembelian/pembelian_edit.php';break;
	
	case 'lookup' :		$title='Pembelian Lookup';	$page='./page/transaksi/lookup/lookup.php';break;
	
	case 'stock' :	$title='Stock Barang';			$page='./page/transaksi/stock/stock.php';break;
	case 'stock_e' :	$title='Stock Barang';		$page='./page/transaksi/stock/stock_edit.php';break;
	
	case 'modalawal' :	$title='Data Modal Awal';	$page='./page/backoffice/modalawal/modalawal.php';break;
	case 'modalawal_e' :$title='Data Modal Awal';	$page='./page/backoffice/modalawal/modalawal_edit.php';break;
	
	case 'barangrusak' :	$title='Barang Rusak';	$page='./page/backoffice/barangrusak/barangrusak.php';break;
	case 'barangrusak_e' :	$title='Barang Rusak';	$page='./page/backoffice/barangrusak/barangrusak_edit.php';break;
	case 'barangrusak_add' :	$title='Barang Rusak';	$page='./page/backoffice/barangrusak/barangrusak_add.php';break;
	
	case 'barcode' :	$title='Cetak Barcode';	$page='./page/backoffice/barcode/barcode.php';break;
	case 'barcode_e' :	$title='Cetak Barcode';	$page='./page/backoffice/barcode/barcode_edit.php';break;
	
	case 'backupdb' :	$title='backupdb';	$page='./page/backoffice/backupdb/backupdb.php';break;
	case 'pengosongandb' :	$title='pengosongandb';	$page='./page/backoffice/pengosongandb/pengosongandb.php';break;
	case 'pengosongandbok' :	$title='pengosongandb';	$page='./page/backoffice/pengosongandb/pengosongandbok.php';break;
	
	case 'restore' :	$title='Restore Database';	$page='./page/backoffice/restore/restore.php';break;
	case 'uploader' :	$title='Restore Database';	$page='./page/backoffice/restore/uploader.php';break;
	
	case 'lapkasa' :	$title='Laporan Kassa';			$page='./page/laporan/lapkasa/lapkasa.php';break;
	case 'lapkasir' :	$title='Laporan Kasir';			$page='./page/laporan/lapkasir/lapkasir.php';break;
	case 'lappembelian' :	$title='Laporan Pembelian';			$page='./page/laporan/lappembelian/lappembelian.php';break;
	case 'lapkoreksistock' :	$title='Laporan Koreksi Stock';			$page='./page/laporan/lapkoreksistock/lapkoreksistock.php';break;
	case 'laplabapenjulan' :	$title='Laporan Laba Penjualan';			$page='./page/laporan/laplabapenjualan/laplabapenjualan.php';break;
	
	default 		: 	$page =$page_default;break;
	}
	
	$default=' :: Sistem Informasi Apotek';
	$head_title = isset($_GET['n']) ? $title=' :: Kasir '.ucwords($title) : $default;
?>
