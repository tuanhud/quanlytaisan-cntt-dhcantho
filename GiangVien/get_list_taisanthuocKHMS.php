<?php
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();			
					$db->setQuery('CREATE VIEW taisanmuasam AS SELECT a.MaTaiSan, a.TenTaiSan, a.TenDonViTinh, b.SoLuong, b.DonGiaMuaSam, b.ThuyetMinhSuDung FROM taisan a, thuockhms b, kehoachmuasam c where b.MaKHMS=c.MaKHMS and a.MaTaiSan=b.MaTaiSan and c.MSCB="'.$_SESSION['msclb'].'"');			
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW dongia AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=7');
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW tinhnang AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=8');
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW taisanthuockehoachmuasam AS SELECT taisanmuasam.MaTaiSan, taisanmuasam.TenTaiSan, taisanmuasam.TenDonViTinh, taisanmuasam.SoLuong, dongia.GiaTriThuocTinh, taisanmuasam.ThuyetMinhSuDung from taisanmuasam LEFT JOIN dongia
ON taisanmuasam.MaTaiSan=dongia.MaTaiSan');
					$result=$db->fetchAll();
					
					$db->setQuery('SELECT taisanthuockehoachmuasam.MaTaiSan, taisanthuockehoachmuasam.TenTaiSan, tinhnang.GiaTriThuocTinh, taisanthuockehoachmuasam.TenDonViTinh, taisanthuockehoachmuasam.SoLuong, taisanthuockehoachmuasam.GiaTriThuocTinh, taisanthuockehoachmuasam.ThuyetMinhSuDung from taisanthuockehoachmuasam LEFT JOIN tinhnang
ON taisanthuockehoachmuasam.MaTaiSan=tinhnang.MaTaiSan');
					$result2=$db->fetchAll();
					
					$xml="";
					$xml.="<table>";
					while($row=mysql_fetch_array($result2,MYSQL_NUM))
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
					$db->setQuery('DROP VIEW taisanmuasam');
					$result=$db->fetchAll();
					$db->setQuery('DROP VIEW dongia');
					$result=$db->fetchAll();
					$db->setQuery('DROP VIEW tinhnang');
					$result=$db->fetchAll();
					$db->setQuery('DROP VIEW taisanthuockehoachmuasam');
					$result=$db->fetchAll();
					
	//}
?>