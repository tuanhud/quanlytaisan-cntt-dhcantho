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
			
			$chitiet='';
			if($_POST['ChiTietND']=='0')
			{
				$chitiet='false';
			}
			if($_POST['ChiTietND']=='1')
			{
				$chitiet='true';
			}
			else 
			{
				$chitiet=$_POST['ChiTietND'];
			}
					$sql="update conoidung set `ChiTietND` = '".$chitiet."' where `MaPhieuKiemKe` = '".$_POST['MaPhieuKiemKe']."' and `MaTaiSan` = '".$_POST['MaTaiSan']."' and `MaND` = '".$_POST['MaND']."'";
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