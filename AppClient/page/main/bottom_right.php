<marquee behaviour="scroll" direction="left" loop="infinite"><h3><?php print $q_system['sinfo'] ?></h3></marquee>
<?php
//--Cek Session--
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1){
		if (!isset($_GET['n']) || $_GET['n']==''){
?>
<div class="b1Pan">
		[ENTER]=Input barang || [..+]=Input QTY <br />
		[0+]=Hapus item terakhir || [../]=Diskon || [F10]=Bayar<br />
		<br />
		F2=Reset/Ulangi || F4=Look Up Item || F7=Rekap || ESC=Keluar
</div>
<?php
		}
		else if (isset($_GET['n']) && $_GET['n']=='stock'){
?>
<div class="b1Pan">
		[ESC]=Kembali || [ENTER]=Input barang
</div>
<?php				
		}
	}
?>
