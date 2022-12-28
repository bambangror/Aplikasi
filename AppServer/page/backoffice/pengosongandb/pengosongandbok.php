<?php
$dbname = 'dbapotik';

if (!mysql_connect('localhost', 'root', '')) {
 echo 'Tidak dapat terhubung ke MySQL';
 exit;
}

$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

if (!$result) {
 echo "Database Rusak, tidak dapat menampilkan daftar tabel.\n";
 echo 'Jenis Kerusakan: ' . mysql_error();
 exit;
}

while ($row = mysql_fetch_row($result)) {
 if (!($row[0]=="system") && !($row[0]=="users")) {
$sql1 = "TRUNCATE TABLE ".$row[0];
$hasil = mysql_query($sql1);
}
}
?>

<script language="javascript">
 setTimeout('self.location.href ="index.php"',1000);
</script>