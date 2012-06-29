<?php
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();			
					
					$db->setQuery('SELECT DISTINCT d.MaThuocTinh, d.TenThuocTinh from taisanthuocdonvi a, taisan b, cothuoctinh c, thuoctinh d where a.MaTaiSan=b.MaTaiSan and b.MaTaiSan=c.MaTaiSan and c.MaThuocTinh=d.MaThuocTinh and MSDV="'.$_POST['madonvi'].'"');
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