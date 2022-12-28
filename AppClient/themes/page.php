<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel='shortcut icon' href='themes/favicon.ico' />
    <title><?php print $head_title ?></title>
    <link rel='stylesheet' href='themes/style.css' type='text/css' />
</head>
<body>
<?php
	if (isset($_GET['n']) && $_GET['n']=='struk'){
		require_once('./page/hitung/struk.php'); 
	}
	else if (isset($_GET['n']) && $_GET['n']=='print'){
		require_once('./page/rekap/print.php'); 
	} else {
?>
<div id="body-head">	
	<?php if (!empty($header)) {require_once($header);}?>
</div>
<div id="body-pagecell">
	<div id="body-main">
		<?php if (!empty($page)) { require_once($page);}?>
	</div>
</div>
<div id="body-bottom">
	<?php if (!empty($bottom_left)) { ?><div id="bottom-left"><?php require_once($bottom_left) ?></div><?php } ?>
	<div class="<?php print(!empty($bottom_left)) ? 'main-bottom' : 'main-bottom-wide';?>">
		<div class="m-bottom">
			<?php if (!empty($m_bottom)) {require_once($m_bottom);}?>
		</div>		
	</div>
</div>
<?php
	}
?>
</body>
</html>
