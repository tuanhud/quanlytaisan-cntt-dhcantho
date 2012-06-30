<?php
	//khoi dong sesion
    //session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();			
					$db->setQuery('Select a.MaTaiSan,TenTaiSan,TenDonViTinh,Soluong,DonGiaMuaSam,ThuyetMinhSuDung,DuyetBM,DuyetKhoa from thuockhms a, taisan b, kehoachmuasam c, thuocdonvimuasam d, nammuasam e where a.MaTaiSan= b.MaTaiSan and c.MaKHMS=d.MaKHMS and c.MaKHMS=e.MaKHMS and c.MaKHMS="'.$_POST['id'].'"');
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