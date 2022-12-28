<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<title>Belajar PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
#pagecell {
	position: relative;
	margin: 0 10%;      
  	width: 600px;
	min-width:600px;
}
a:link, a:visited, a:active, a.active {
	color: #8fd600;
  	text-decoration: none;
}
a:hover {
  	color: #4e8c1f;
  	text-decoration: underline;
}
#content{
	border:solid 1px #CCC;
}
#body-bottom{
	float:right;
}
</style>
<?php
	include 'function.php';
	include 'loader.php';
?>
</head>
<body>
<div id="pagecell">
	<div id="Menu">
	<a href='index.php'>Home</a> | <a href='?n=tambah'>Tambah Data</a> | 
	<a href='?n=edit'>Edit Data</a> | <a href="?n=hapus">Hapus Data</a>
	</div>
	<hr>
	<div id="content">
		<?php include ($page) ?>
	</div>
	<hr>
	<div id="body-bottom">
   		&copy;2015 by <i>Riyanto, S. Kom.</i>
    </div>
</div>
</body>
</html>
