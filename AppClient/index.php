<?php 
	try {
		require_once './includes/session.php';
	}
	catch(Exception $error) {
		print $error->getMessage();
	}
	require_once('themes/page.php');
?>