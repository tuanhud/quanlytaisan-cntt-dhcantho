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
					$db->setQuery('SELECT b.MaTaiSan, b.TenTaiSan, a.SoLuongCuaDonVi, a.DonGiaTS  FROM taisanthuocdonvi a, taisan b  where a.MaTaiSan=b.MaTaiSan and MSDV="'.$_POST['madonvi'].'"');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							
							$xml.="<MA>";
								$xml.=$row['MaTaiSan'];							
							$xml.="</MA>";
							$xml.="<TEN>";
								$xml.=$row['TenTaiSan'];							
							$xml.="</TEN>";
							$xml.="<SOLUONG>";
								$xml.=$row['SoLuongCuaDonVi'];							
							$xml.="</SOLUONG>";
							$xml.="<DONGIA>";
								$xml.=$row['DonGiaTS'];							
							$xml.="</DONGIA>";
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
	//}
?>