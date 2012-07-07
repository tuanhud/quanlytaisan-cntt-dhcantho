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
			$sql = "Select max(MaKHMS) from kehoachmuasam";
					$db->setQuery($sql);
					$result = $db->fetchAll();
					$row = mysql_fetch_array($result,MYSQL_NUM);
					$ma = $row[0]+1;
					
					$sql= "insert into `nammuasam` values('".$ma."','".$now["year"]."')";
					$db->Execute($sql);
					
					$sql2= "insert into `thuocdonvimuasam` values('".$_SESSION['msdv']."','".$ma."')";
					$db->Execute($sql2);
					
					$insert_query = "insert into `kehoachmuasam`(MaKHMS, MSCB, DuyetBM, DuyetKhoa) values('".$ma."','".$_SESSION['msclb']."',0,0)";
					$db->setQuery($insert_query);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.=$ma;
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.=$ma;
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					
					echo $xml;
					exit;
		
	//}
?>