<div class="s-info"><h1><?php print strtoupper($q_system['snama']) ?></h1></div>
<div class='s-ket'><h3><?php print $q_system['salamat'] ?><h3></div>
<?php
if (isset($_SESSION['loggedin']) && isset($_SESSION['rid']) && $_SESSION['rid']==1){	
?>
<div id="head-menu">
	<ul id="menu" class="dropdown">
		<li><a href=''><?php print $_SESSION['uname']; ?></a>
			<ul class="sub_menu">
				<li><a href='?n=passwd'>Edit Password</a></li>
				<li><a href='?n=role'>Role</a></li>
				<li><a href='?n=out'>Logout</a></li>
			</ul>
		</li>
		<li><a href=''>Master</a>
			<ul class="sub_menu">
				<li><a href='?n=kassa_a'>Data Kassa</a></li>
				<li><a href='?n=user_a'>Data Pengguna</a></li>
				<li><a href='?n=barang'>Data Obat</a></li>
				<li><a href="?n=produsen">Data Produsen</a></li>
				<li><a href="?n=supplier">Data Supplier</a></li>				
				<li><a href="?n=customer">Data Customer</a></li>
				<li><a href="?n=umum">Data Umum</a></li>				
			</ul>
		</li>
		<li><a href="#">Transaksi</a>
			<ul class="sub_menu">
				<li><a href="?n=pembelian">Pembelian</a></li>
				<li><a href="?n=stock">Stock</a></li>							
			</ul>
		</li>	
		<li><a href="#">Back Office</a>
			<ul class="sub_menu">
				<li><a href="?n=modalawal">Modal Awal</a></li>
				<li><a href="?n=barangrusak">Koreksi Stock</a></li>			
				<li><a href="?n=barcode">Cetak Barcode</a></li>		
				<li><a href="?n=backupdb">Backup Database</a></li>	
				<li><a href="?n=restore">Restore Database</a></li>
				<li><a href="?n=pengosongandb">Pengosongan Database</a></li>						
			</ul>
		</li>	
		<li><a href="#">Laporan</a>
			<ul class="sub_menu">
				<li><a href="?n=lapkasa">Laporan Tiap Kasa</a></li>
				<li><a href="?n=lapkasir">Laporan Tiap Kasir</a></li>			
				<li><a href="?n=lappembelian">Laporan Pembelian</a></li>	
				<li><a href="?n=lapkoreksistock">Laporan Koreksi Stock</a></li>		
				<li><a href="?n=laplabapenjulan">Laporan Laba Penjualan</a></li>							
			</ul>
		</li>			
	</ul>
</div>
<?php

}?>

