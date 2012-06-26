<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();	
			$query ='select MaKHMS from kehoachmuasam where MSCB = "'.$_SESSION['msclb'].'"';
				$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
				$row = mysql_fetch_row($result);
				$ma = $row[0];
				
				
				$sql = "UPDATE `thuockhms` SET
					`SoLuong`='".$_POST['SoLuong']."',
					`DonGiaMuaSam`='".$_POST['DonGia']."',
					`ThuyetMinhSuDung`='".$_POST['ThuyetMinh']."' WHERE `MaTaiSan`='".$_POST['MaTaiSan']."' and `MaKHMS`='".$ma."'";
				$db->setQuery($sql);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thất bại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thành công";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					
					echo $xml;
					exit;

	//}
?>