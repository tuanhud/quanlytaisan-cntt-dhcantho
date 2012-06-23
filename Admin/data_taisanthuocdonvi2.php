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
			if (isset($_POST['insert']))
			{
				// INSERT COMMAND 
				$insert_query = "insert into `taisanthuocdonvi`(MSDV, MaTaiSan) values('".$_POST['MaDonvi']."','".$_POST['MaTaiSan']."')";
					$db->setQuery($insert_query);
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
				}
	//}
?>