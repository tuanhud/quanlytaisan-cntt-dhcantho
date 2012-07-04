<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	

					$sql="update phieukiemke ";
					$sql.="set `Nam` = '".$_POST['Nam']."',";
					$sql.="`MaLoaiKK` = '".$_POST['MaLoaiKK']."',";
					$sql.="`DienGiaiKiemKe` = '".$_POST['DienGiaiKiemKe']."',";
					$sql.="`NgayKiemKe` = '".$_POST['NgayKiemKe']."',";
					$sql.="`NgayKetThucKiemKe` = '".$_POST['NgayKetThucKiemKe']."'";
					$sql.="where `MaPhieuKiemKe` = '".$_POST['MaPhieu']."'";
					$db->setQuery($sql);
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
	}
?>