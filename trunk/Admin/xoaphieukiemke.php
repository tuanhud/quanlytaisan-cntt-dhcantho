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
					
			$sql="delete from `cophieumau` where MaPhieuKiemKe='".$_POST['MaPhieu']."'";
			$db->Execute($sql);
			
			$sql2="delete from `taisankiemke` where MaPhieuKiemKe='".$_POST['MaPhieu']."'";
			$db->Execute($sql2);
			
			$sql3="delete from `conoidung` where MaPhieuKiemKe='".$_POST['MaPhieu']."'";
			$db->Execute($sql4);
			
			$db->setQuery("delete from `phieukiemke` where MaPhieuKiemKe='".$_POST['MaPhieu']."'");
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