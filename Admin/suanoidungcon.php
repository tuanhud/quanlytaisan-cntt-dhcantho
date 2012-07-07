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
			$isExist=0;	
		$sql2="SELECT MaND FROM noidung WHERE TenND='".$_POST['tennoidungcon']."'";
			$db->setQuery($sql2);
			$result2=$db->fetchAll();
			$row2=mysql_fetch_array($result2,MYSQL_NUM);
			$mandcon=$row2[0];
			$sql = "Select * from noidungcon";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
				{
				$manoidungcon=$row[0];
				$manoidunglon=$row[1];
				if($manoidunglon==$_GET['manoidunglon'] && $manoidungcon==$mandcon)
						$isExist = 1;
				}
			if($isExist!=1)
			{
				 $update_query = "UPDATE `noidungcon` SET `noi_mand`='".$mandcon."' WHERE `mand`='".$_POST['manoidunglon']."'";
				 $db->setQuery($update_query);
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
				 			 }
					
	
	}
?>