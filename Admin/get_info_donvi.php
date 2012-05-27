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
			if($_POST['madonvisua']=='')	
			{
				$xml="";
				$xml.="<INFO>";
				$xml.="<RESULT>";
				$xml.="";
				$xml.="</RESULT>";
				$xml.="</INFO>";
				echo $xml;
			}
			$db->setQuery('SELECT `TenDV` FROM donvi where MSDV =\''.$_POST['madonvisua'].'\'');					
			$result=$db->fetchAll();					
			$row=mysql_fetch_array($result,MYSQL_NUM);					
			$xml="";
			$xml.="<INFO>";
			$xml.="<RESULT>";
			$xml.= $row[0];
			$xml.="</RESULT>";
			$xml.="</INFO>";
			mysql_free_result($result);
			echo $xml;
	}
?>