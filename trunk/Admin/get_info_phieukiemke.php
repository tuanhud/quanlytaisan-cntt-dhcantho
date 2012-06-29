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
			$db->setQuery('SELECT GhiChuPhieu, NgayLap, CapNhatMoiNhat FROM phieumau where MaPhieu =1');					
			$result=$db->fetchAll();	
			$xml="";
			$xml.="<INFO>";				
			while($row=mysql_fetch_array($result,MYSQL_NUM))
			{					
					for($i=0;$i<count($row);$i++)
					{	
						$xml.="<RESULT>";
						$xml.= $row[$i];
						$xml.="</RESULT>";
					}
			}
			$xml.="</INFO>";
			mysql_free_result($result);
			echo $xml;
	}
?>