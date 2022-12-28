<?php
session_start();
    $kiri =$_SESSION['kiri'];
    $atas =$_SESSION['atas'];
    $kanan =$_SESSION['kanan'];
    $bawah =$_SESSION['bawah'];
	$fontname=isset($_SESSION['jenisf'])?$_SESSION['jenisf']:'arial';
	$fontsize=isset($_SESSION['ukurf'])?$_SESSION['ukurf']:8;

    $file_print =$_SESSION['cetak'];
	$namafile =$_SESSION['jeneng'];
	$formatpage =$_SESSION['formatpg'];
    
	//--Data--
	ob_start();
    include(dirname(__FILE__).'/'.$file_print);
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
		$html2pdf = new HTML2PDF($formatpage, 'Folio', 'en', true, 'UTF-8', array($kiri, $atas, $kanan, $bawah));
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->setDefaultFont($fontname, $fontsize);
		//$html2pdf->drawImage($src, false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($namafile);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>