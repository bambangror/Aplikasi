<?php	
$dbconf = array (
	'host' => 'localhost',
	'dbuser' => 'root',
	'dbpass' => '',
	'dbname' => 'dbapotik'
	);
	$koneksi = new mysqli($dbconf['host'],$dbconf['dbuser'],$dbconf['dbpass'],$dbconf['dbname']); 
	
	$cnx = mysql_connect($dbconf['host'], $dbconf['dbuser'], $dbconf['dbpass']) or die(mysql_error());
	mysql_select_db($dbconf['dbname'], $cnx) or die(mysql_error());
	$tables = mysql_list_tables($dbconf['dbname']) or die(mysql_error());

	$table_list = array();
	while($t = mysql_fetch_array($tables))
	{
		array_push($table_list, $t[0]);
	}
	foreach ($table_list as $key => $value) {
		if ($value !== 'system') {
			$sql = "TRUNCATE TABLE ".$value;
			$query = $koneksi->query($sql);
		}
	}
?>
<script language="javascript">
	 setTimeout('self.location.href ="index.php"',1000);
</script>