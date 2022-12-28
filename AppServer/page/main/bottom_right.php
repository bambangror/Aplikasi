<marquee behaviour="scroll" direction="left" loop="infinite"><h3><?php print $q_system['sinfo'] ?></h3></marquee>
<?php
//--Cek Session--
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1){
		if (isset($_GET['n']) && $_GET['n']=='pembelian') {
?>
<div class="b1Pan">
		[ENTER]=Input barang || [...+]=Input QTY || [0+]=Hapus item terakhir || [../]=Diskon<br />
		<br/>
		F4=Look Up Item
</div>
<?php
		}
		else if (isset($_GET['n']) && $_GET['n']=='lookup'){
?>
<div class="b1Pan">
		[ENTER]=Input barang
</div>
<?php				
		}
		else if (isset($_GET['n']) && $_GET['n']=='barangrusak'){
?>
<div class="b1Pan">
		[ENTER]=Input barang || [...+]=Selisih || [0+]=Hapus item terakhir<br />
		<br/>
		F4=Look Up Item
</div>
<?php
		
		}
	}
?>
