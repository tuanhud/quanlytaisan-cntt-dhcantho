<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	if (session_is_registered('maquyen') && ($_SESSION['maquyen']=="AD" || $_SESSION['maquyen']=="BCHHSVT"))
	{
			include_once('database.php');
			$db=new database();		
			$sql = "SELECT NAMHOC_ID, HOCKI_TEN FROM `hocki`
					WHERE HOCKI_ID = 
					(SELECT MAX(HOCKI_ID) FROM hocki)";						
			$db->setQuery($sql);
			$result=$db->fetchAll();
			$row = mysql_fetch_array($result);		
			$nh = $row[0];
			$hkht = $row[1];
			if($hkht==3){
					$nhtt = $nh+1;
					$sql = "SELECT MAX(NAMHOC_ID) FROM namhoc";
					$db->setQuery($sql);
					$result = $db->fetchAll();
					$row = mysql_fetch_array($result);
					if($nhtt>$row[0])
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="<![CDATA[Năm học tiếp theo chưa được tạo.]]>";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;						
						exit;
						}
					else 
					{
						$nh+=1;
						}
				} 				
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="<![CDATA[".$nh."]]>";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					mysql_free_result($result);
					echo $xml;
					exit;
	}
?>