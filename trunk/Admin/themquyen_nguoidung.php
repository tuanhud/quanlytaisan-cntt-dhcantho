<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="HSVT")
	{			
			include_once('../database.php');
			$db=new database();			
			$db->setQuery("INSERT INTO `coquyen` VALUES('".$_POST['macanbo']."', '".$_POST['maquyen']."')");
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