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
					
					$db->setQuery('SELECT THOI_GIAN_BAT_DAU,THOI_GIAN_KET_THUC
					FROM quan_li_thoi_gian a, nguoi_dung b, quyen_nguoidung c, quyen d WHERE a.ID_THOI_GIAN = b.ID_THOI_GIAN AND b.MA_NGUOI_DUNG = c.MA_NGUOI_DUNG AND c.MA_QUYEN = d.MA_QUYEN AND d.TEN_QUYEN = "can bo" AND b.MA_NGUOI_DUNG =\''.$_SESSION['mssv'].'\'');
					if($db->numRecord()!=1)
					{
						$db->setQuery('delete FROM thoigian_bcs');
						$db->executeQuery();
						$db->setQuery('insert into thoigian_bcs(batdau_bcs,ketthuc_bcs) values(CURDATE(),ADDDATE(CURDATE(),INTERVAL 7 DAY))');
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
							$xml.=$row[$i];							
							$xml.="</column>";
						}
						$xml.="</row>";
					}
					$xml.="</table>";
					mysql_free_result($result);
					echo $xml;
	}
?>