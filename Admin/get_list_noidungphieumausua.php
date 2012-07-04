<?php
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();			
					$db->setQuery('SELECT d.MaND, d.TenND FROM cophieumau a, phieumau b, thuocphieumau c, noidung d where a.MaPhieu=b.MaPhieu and b.MaPhieu = c.MaPhieu and c.MaND = d.MaND and a.MaPhieuKiemKe="'.$_POST['MaPhieuKiemKe'].'"');			
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
					echo $xml;
			
					
	//}
?>