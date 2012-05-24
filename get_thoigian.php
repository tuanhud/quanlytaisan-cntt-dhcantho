<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();			
					
					$db->setQuery('select THOI_GIAN_BAT_DAU, THOI_GIAN_KET_THUC from quan_li_thoi_gian_dg');
					if($db->numRecord()!=1)
					{
						$db->setQuery('delete FROM quan_li_thoi_gian_dg');
						$db->executeQuery();
						$db->setQuery('insert into quan_li_thoi_gian_dg(THOI_GIAN_BAT_DAU,THOI_GIAN_KET_THUC) values(CURDATE(),ADDDATE(CURDATE(),INTERVAL 7 DAY))');
						$db->executeQuery();
					}
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					while($row=mysql_fetch_array($result,MYSQL_NUM))
					{
						$xml.="<row>";
						for($i = 0; $i < count($row); $i++) {
							$xml.="<column>";
							$xml.="<![CDATA[".$row[$i]."]]>";							
							$xml.="</column>";
						}
						$xml.="</row>";
					}
					$xml.="</table>";
					mysql_free_result($result);
					echo $xml;
	}
?>