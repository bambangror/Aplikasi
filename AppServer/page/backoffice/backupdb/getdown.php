<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$root = 'http://localhost/appserver/'; 
$dbconf = array (
	'host' => 'localhost',
	'dbuser' => 'root',
	'dbpass' => '',
	'dbname' => 'dbapotik'
	);
	$cnx = mysql_connect($dbconf['host'], $dbconf['dbuser'], $dbconf['dbpass']) or die(mysql_error());
	mysql_select_db($dbconf['dbname'], $cnx) or die(mysql_error());
	$tables = mysql_list_tables($dbconf['dbname']) or die(mysql_error());

	$table_list = array();
	while($t = mysql_fetch_array($tables))
	{
		array_push($table_list, $t[0]);
	}

	require($path."/appserver/includes/SQL_Export.php");
	$e = new SQL_Export($dbconf['host'],$dbconf['dbuser'],$dbconf['dbpass'],$dbconf['dbname'], $table_list);
	echo $e->export();

	mysql_close($cnx);                                       
?>
#<meta http-equiv='refresh' content='0; url=../../../index.php'>
