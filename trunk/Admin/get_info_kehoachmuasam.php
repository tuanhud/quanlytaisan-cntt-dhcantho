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
			        $sql="Select MaTaiSan,TenTaiSan,TenDonViTinh,GiaTriThuocTinh from taisan a, cothuoctinh b where a.MaTaiSan= b.MaTaiSan ";
					$db->setQuery($sql);
					$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							$xml.="<MA>";
								$xml.=$row['TenTaiSan'];							
							$xml.="</MA>";
							$xml.="<TEN>";
								$xml.=$row['TenTaiSan'];							
							$xml.="</TEN>";
							$xml.="<DVT>";
								$xml.=$row['TenDonViTinh'];							
							$xml.="</DVT>";
							$xml.="<dongia>";
								$xml.=$row['GiaTriThuocTinh'];							
							$xml.="</dongia>";
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
	//}
?>