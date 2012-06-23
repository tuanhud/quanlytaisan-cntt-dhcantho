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
					$db->setQuery('SELECT c.MSDV, c.TenDV, a.MaTaiSan, a.TenTaiSan, b.SoLuongCuaDonVi, b.DonGiaTS  FROM taisan a, taisanthuocdonvi b, donvi c where a.MaTaiSan=b.MaTaiSan and b.MSDV=c.MSDV');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					while($row=mysql_fetch_array($result,MYSQL_NUM))
					{
						$xml.="<INFO>";
						for($i = 0; $i < count($row); $i++) 
						{
							$xml.="<RESULT>";
							$xml.="<![CDATA[".$row[$i]."]]>";
							$xml.="</RESULT>";
						}
						$xml.="</INFO>";
					}
					$xml.="</table>";
					mysql_free_result($result);
					echo $xml;
	//}
?>