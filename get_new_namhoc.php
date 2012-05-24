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
			$sql = "SELECT NAMHOC_TEN FROM namhoc WHERE NAMHOC_ID = (
SELECT max(NAMHOC_ID) FROM namhoc)";						
			$db->setQuery($sql);
			$result=$db->fetchAll();
			$row = mysql_fetch_array($result);
			$temp = substr($row[0],5);
			$row = $temp."-".($temp + 1);					
					$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="<![CDATA[".$row."]]>";
						$xml.="</RESULT>";
						$xml.="</INFO>";																		
					mysql_free_result($result);
					echo $xml;
	}
?>