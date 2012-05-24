<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
//	kiem tra đã đăng nhập
//	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
//	{			
			include_once('database.php');
			$db=new database();			
			$db->setQuery("INSERT INTO `qlhsv1`.`hoivien_kyluat` (`CAPHOI_ID`, `HOCKI_ID`, `KYLUAT_ID`, `HOIVIEN_ID`,`KYLUAT_THOIGIAN`, `KYLUAT_QUYETDINH`, `KYLUAT_DONVI`) VALUES(1, '".$_POST['hocki_id']."', '".$_POST['kyluat_id']."', '".$_POST['hoivien_id']."','".date( 'y-m-d', strtotime($_POST['thang']."/".$_POST['ngay']."/".$_POST['nam']))."','".$_POST['quyetdinh']."', 0)");
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: ".mysql_error();
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thành công.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
//	}
?>