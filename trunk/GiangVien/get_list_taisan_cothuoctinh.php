<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();		
			$db->setQuery('CREATE VIEW dongia2 AS SELECT a.GiaTriThuocTinh, b.MaTaiSan from cothuoctinh a, taisan b where a.MaTaiSan=b.MaTaiSan and a.MaThuocTinh=7 and a.MaTaiSan="'.$_POST['MaTaiSan'].'"');
			$result=$db->fetchAll();
					
			$db->setQuery('CREATE VIEW tinhnang2 AS SELECT a.GiaTriThuocTinh, b.MaTaiSan, b.TenDonViTinh  from cothuoctinh a, taisan b where a.MaTaiSan=b.MaTaiSan and a.MaThuocTinh=8 and a.MaTaiSan="'.$_POST['MaTaiSan'].'"');
			$result2=$db->fetchAll();
				
			$db->setQuery('SELECT a.GiaTriThuocTinh as dongia, b.GiaTriThuocTinh as tinhnang, b.TenDonViTinh  from dongia2 a, tinhnang2 b where a.MaTaiSan=b.MaTaiSan');
			$result3=$db->fetchAll();
					
					$xml="";
					$xml.="<table>";
					while($row=mysql_fetch_array($result3,MYSQL_NUM))
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
				$db->setQuery('DROP VIEW dongia2');
				$result4=$db->fetchAll();
				$db->setQuery('DROP VIEW tinhnang2');
				$result8=$db->fetchAll();
	//}
?>