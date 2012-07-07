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
			// INSERT COMMAND 
							 
				 $query = "SELECT max(MaPhieuKiemKe) FROM phieukiemke";
				 $db->setQuery($query);
				 $result = $db->fetchAll();
				 $row = mysql_fetch_array($result,MYSQL_NUM);
				 $maphieu = $row[0]+1;
				
				$sql= "insert into `phieukiemke` values('".$maphieu."','".$_POST['MSDV']."','".$_POST['TenPhieuKiemKe']."','".$_POST['Nam']."','".$_POST['MaLoaiKK']."','".$_POST['DienGiaiKiemKe']."','".$_POST['NgayKiemKe']."','".$_POST['NgayKetThucKiemKe']."')";
				$db->Execute($sql);
				
				$sql2= "insert into `lapkiemke` values('".$_SESSION['msclb']."', '".$maphieu."')";
				$db->Execute($sql2);
				
				$sql2 = "insert into `cophieumau` values('".$maphieu."','".$_POST['MaPhieu']."')";
				$db->setQuery($sql2);
				if($db->executeQuery()!=1)
				{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="<![CDATA[".$maphieu."]]>";
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
						$xml.="<![CDATA[".$maphieu."]]>";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
					

	//}
?>