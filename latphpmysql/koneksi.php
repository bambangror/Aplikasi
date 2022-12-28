<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dblatihan";
$koneksi = mysql_connect($host,$user,$pass) or die("Gagal konek");
$pilih_db = mysql_select_db($db) or die("Database tidak ada");
?>