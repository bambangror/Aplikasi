<?php
	$n=isset($_GET['n'])?$_GET['n']:null;
	if($n=='tambah')		{$page ='page/tambah.php';}
	else if($n=='edit')	{$page ='page/edit.php';}
	else if($n=='edit_s')	{$page ='page/edit_simpan.php';}
	else if($n=='hapus')	{$page ='page/hapus.php';}	
	else					{$page ='page/home.php';}

?> 