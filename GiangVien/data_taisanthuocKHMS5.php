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
			$now = getdate();
					
			$sql= "delete from `thuockhms` where MaKHMS='".$_POST['makhms']."'";
			$db->Execute($sql);
					
			$sql2= "delete from `kehoachmuasam` where MaKHMS='".$_POST['makhms']."'";
			$db->Execute($sql2);
					
			$sql3 = "delete from `nammuasam` where MaKHMS='".$_POST['makhms']."'";
			$db->Execute($sql3);
			
			$sql4 = "delete from `thuocdonvimuasam` where MaKHMS='".$_POST['makhms']."'";			
			$db->setQuery($sql4);
			if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thất bại";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thành công.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					
					echo $xml;
					exit;
		
	//}
?>