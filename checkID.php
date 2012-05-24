<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập		
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('database.php');
			$db=new database();	
			$isExist = 0;
			$sql = "Select HOIVIEN_ID from hoivien";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[0]==$_POST['id']) $isExist = 1;
			}					
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
							$xml.=$isExist;
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
	//}
?>