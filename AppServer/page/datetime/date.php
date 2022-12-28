<?PHP
$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $array_hari[date("N")];
$tanggal = date ("j");
$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $array_bulan[date("n")];
$tahun = date("Y");
$date=("$tanggal $bulan $tahun");
$time=date("H").":".date("i").":".date("s");
?>