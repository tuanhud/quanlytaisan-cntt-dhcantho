<?php
	//khoi dong session
	session_start();
	require 'pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd("namlun12", "667843ef1bcc42c5edba43a4217526c8");

    // convert a web page and store the generated PDF into a $pdf variable
	$pdf = $client->convertFile("baocaoDSHV_LCHSV_CHSV_NHHK_UI.php");	

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: no-cache");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"report.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $e)
{
    echo "Pdfcrowd Error: " . $e->getMessage();
}		
	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen"))
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	if($_SESSION['maquyen']!="AD")
	echo "<script language=javascript>window.location = './Admin/loginUI.php';</script>"; 
	if($_SESSION['maquyen']!="BCHHSVT")
	echo "<script language=javascript>window.location = './HSVT/loginUI.php';</script>";
	exit;
	}*/
?>