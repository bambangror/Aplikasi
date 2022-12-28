<?php 
function tgl_indo($tgl){
   $tanggal = substr($tgl,8,2);
   $bulan = getBulan(substr($tgl,5,2));
   $tahun = substr($tgl,0,4);
   return $tanggal.' '.$bulan.' '.$tahun;		 
}

function getBulan($bln){
   if ($bln==1) { $blnindo = "Januari"; }
   elseif($bln==2) { $blnindo = "Februari"; }
   elseif($bln==3) { $blnindo = "Maret"; }
   elseif($bln==4) { $blnindo = "April"; }
   elseif($bln==5) { $blnindo = "Mei"; }
   elseif($bln==6) { $blnindo = "Juni"; }
   elseif($bln==7) { $blnindo = "Juli"; }
   elseif($bln==8) { $blnindo = "Agustus"; }
   elseif($bln==9) { $blnindo = "September"; }
   elseif($bln==10) { $blnindo = "Oktober"; }
   elseif($bln==11) { $blnindo = "Nopember"; }
   elseif($bln==12) { $blnindo = "Desember"; }
   return $blnindo;
} 
?>
