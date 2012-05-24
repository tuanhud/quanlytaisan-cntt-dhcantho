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
			$sql = "SELECT HOCKI_TEN FROM `hocki`
					WHERE HOCKI_ID = 
					(SELECT MAX(HOCKI_ID) FROM hocki)";						
			$db->setQuery($sql);
			$result=$db->fetchAll();
			$row = mysql_fetch_array($result);			
			$temp = $row[0];
			if($temp == 3) $temp=1;
			else $temp+=1;						
					$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="<![CDATA[".$temp."]]>";
						$xml.="</RESULT>";
						$xml.="</INFO>";																		
					mysql_free_result($result);
					echo $xml;
	}
?>